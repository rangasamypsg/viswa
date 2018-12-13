<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Traits\CustomMessage;
use App\Http\Requests;
use App\Helpers\Helper;
use App\StaffQuestion;
use App\StaffAnswer;
use App\StaffOption;
use App\FeedbackRating;
use App\StaffRating;
use App\ExpoCustomer;
use App\User;
use App\Category;
use App\Product;
use App\Customer;
use App\Question;
use App\Answer;
use App\Vendor;
use App\Staff;
use Config;
use DB;
use Auth;

class ApiController extends Controller
{
    use CustomMessage;
    public $successCode = 200; ////Success status code
    public $failureCode = 400; //failure status code
    public $successStatus = 'true'; //success
    public $failureStatus = 'false'; //failure

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function registration(Request $request)
     {
         
        $input = $request->all();
	
        // run the validation rules on the inputs from the form
        $validator = Validator::make($input, Customer::$regisCustomerRules);
     
         // if the validator fails, redirect back to the form
         if ($validator->fails()) {
		 
            $errors = $validator->messages()->toArray();
            $message = Helper::checkEmailMobileNoExists($errors);
		 
            // If validation falis redirect back to login.
            return response()->json(['success' => $this->failureStatus, 'message' => $message], $this->failureCode );
			 
         } else {

            $customerDetailSave = new Customer();
            $CustomerId = $customerDetailSave->saveCustomers( $input );
 
            if( isset( $CustomerId ) && !empty( $CustomerId ) ) {  
              
                // If Merchant save Success.
                return response()->json(['success' => $this->successStatus, 'message' => $this->printRegisterSuccess() ], $this->successCode );	    

            } else {

                // If Merchant save falis.
                return response()->json(['success' => $this->failureStatus, 'message' => $this->printRegisterFalse() ], $this->failureCode );

            } 

         }

    }


     public function doLogin(Request $request) {      
                
        $input = $request->all();
        
        $customerDetail = new Customer();
        $emailIdExists = $customerDetail->checkemailIdExists( Input::get('email_id') );

        if(empty( $emailIdExists) ) {
 
             return response()->json(['success' => $this->failureStatus, 'message' => $this->printInvalidEmailId() ], $this->failureCode );
 
        } else {
 
             if ( Hash::check( Input::get('password'), $emailIdExists->password ) ) {

                // If Merchant save Success.
                return response()->json(['success' => $this->successStatus, 'message' => "Success" ], $this->successCode );	    
 
             
            } else {
 
                 return response()->json(['success' => $this->failureStatus, 'message' => $this->printInvalidEmailIdAndPassword() ], $this->failureCode );
            }
        } 
         
    }
    
     public function updatePassword(Request $request) {

        $input = $request->all();

        $emailId = $input['email_id'];
        $newPassword = $input['new_password'];
        $confirmPassword = $input['confirm_password'];

        if( isset( $emailId ) && !empty( $emailId ) ) {

            $customerDetail = new Customer();
            $emailIdExists = $customerDetail->checkemailIdExists( Input::get('email_id') );
       
            if( isset( $emailIdExists ) && !empty( $emailIdExists ) ) {

                if( $newPassword != $confirmPassword ) {
                    
                    return response()->json(['success' => $this->failureStatus, 'message' => $this->printPasswordDoesnotMatch() ], $this->failureCode );
                
                } else {
                
                    $updatePassword =  Customer::where( [ 'email_id' => $emailId ] )->update( [ 'password' => Hash::make( $input['new_password'] )] );

                    if (! $updatePassword ) {
                        
                        return response()->json(['success' => $this->failureStatus, 'message' => $this->printPasswordFailure() ], $this->failureCode );

                    } else {

                        return response()->json(['success' => $this->successStatus, 'message' => $this->printPasswordSuccess() ], $this->successCode );
                    }
                    
                }
                    
            }else {     

                return response()->json(['success' => $this->failureStatus, 'message' => $this->printCorrectEmailIdNumber() ], $this->failureCode );
            }

        } else {

            return response()->json(['success' => $this->failureStatus, 'message' => $this->printEmailIdMissing() ], $this->failureCode );
        }            
    
    }

     /**
     * Categories a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function categories(){
        
        $categorys = DB::table('categories')
                    ->orderBy('id', 'desc')
                    ->get();
        
        if(!empty($categorys)) { 
            
            $response = array();
            foreach($categorys as $key=>$category){
                 $data = array(); 
                 $data['id'] = $category->id;
                 $data['categoryName'] = $category->category_name;
                 $data['description'] = $category->description;
                 $data['status'] = (!empty($category->status == 1) ? 'Active' : 'DeActive');
                 $data['category_image'] = public_path('/images/')."pro-empty.png";
                 //$data['created_at'] = $category->created_at;
                 //$data['updated_at'] = $category->updated_at;
                 array_push($response,$data);
            }

            /*echo "<pre>";
            print_r($response);
            exit; */
            return response()->json(['success' => true, 'data' => $response], 200);            
        }else {
            $response = "no Record Found";
            return response()->json(['success' => false, 'data' => $response ], 200);    
        }            
     }

    /**
     * Product Categories a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	function curPageURL() {
		 $pageURL = 'http';
		 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 return $pageURL;
	}

	public function productSubCategories($categoryId){
        
        $products = DB::table('categories as c')
                ->select("c.id as cid","c.category_name","p.id","p.product_name","p.product_code","p.category_id","p.product_ios_img_small","p.product_ios_img_large","p.description","p.status","p.created_at","p.updated_at")
                ->leftjoin('products as p', 'p.category_id', '=', 'c.id')
                ->orderBy('p.product_name', 'ASC')
                ->where('p.category_id', '=',$categoryId)
			    ->where('p.status', '=',1)				
                ->get();
    
        return  ( isset( $products ) && !empty( $products ) ? $products : '');        
    }

    public function productSubSubCategories($productId){
        
        $productData = DB::table('products')
            ->orderBy('id', 'ASC')
            ->where('id', '=', $productId)	
            ->get();
        
        return  ( isset( $productData ) && !empty( $productData ) ? $productData : '');      
    }

    public function productCategories(){
       
       $categorys = DB::table('categories')
					->orderBy('id', 'ASC')
					//->where('id', '=',11)	
					//->whereIn('id', '=',array(1, 2))
					->get();
		
		/* echo "<pre>";
		print_r($categorys);
		exit; */
			
		if(!empty($categorys)) { 
				
				$i = 0;
				$response = array();
				foreach($categorys as $key=>$category){
					  
					 $response[$i]['id'] = $category->id;
					 $response[$i]['categoryName'] = $category->category_name;
					 $response[$i]['category_image'] = $category->category_image ? url('/')."/images/category/".$category->category_image : '--';
					 $products = $this->productSubCategories($category->id);
					 $j = 0;
					 foreach($products as $key=>$product){						
							
							$response[$i]['ornaments'][$j] = array(
                                                        'product_name'=> $product->product_name,
                                                        'product_img_small'=> $product->product_ios_img_small ? url('/')."/images/products/sm/".$product->product_ios_img_small : '--',
                                                        );
						    $productImages = $this->productSubSubCategories($product->id);
							$k = 0; 	
							foreach($productImages as $key=>$productImg){
									
									$response[$i]['ornaments'][$j]['large'] = array(
                                                'product_img_large'=> $productImg->product_ios_img_large ? url('/')."/images/products/lg/".$productImg->product_ios_img_large : '--',
                                                'product_code' => ( isset( $productImg->product_code ) && !empty( $productImg->product_code ) ? $productImg->product_code : 'nil'),
                                                'product_carat' => ( isset( $productImg->carat ) && !empty( $productImg->carat ) ? $productImg->carat : 'nil'),
                                                'product_kt' => ( isset( $productImg->kt ) && !empty( $productImg->kt ) ? $productImg->kt : 'nil'),
                                                'product_weight' => ( isset( $productImg->weight ) && !empty( $productImg->weight ) ? $productImg->weight : 'nil'),
                                            );
								$k++;		
							 }								 
						$j++;	
					 }
					 $i++;
				}			
				
				 /* echo "<pre>";
								print_r($response);
								exit; */
				
			return response()->json(['success' => true, 'data' => $response], 200);            
		}else {
			$response = "no Record Found";
			return response()->json(['success' => false, 'data' => $response ], 200);    
		}          
       
    }
    /*
    * Rangasamy.M
    *
    */
    public function Category(){
       
        $categorys = DB::table('categories')
                     ->orderBy('id', 'ASC')
                     //->where('id', '=',11)	
                     //->whereIn('id', '=',array(1, 2))
                     ->get();
             
         if(!empty($categorys)) { 
                 
            $response = array();
            foreach($categorys as $key=>$category){
                
                $data = array(); 
                $data['id'] = $category->id;
                $data['categoryName'] = $category->category_name;
                $data['description'] = $category->description;
                $data['status'] = (!empty($category->status == 1) ? 'Active' : 'DeActive');
                $data['category_image'] = $category->category_image ? url('/')."/images/category/".$category->category_image : '--';
                array_push($response,$data);
 
            }
            return response()->json(['success' => true, 'data' => $response], 200);
        } else {
			$response = "no Record Found";
			return response()->json(['success' => false, 'data' => $response ], 200);    
		}      

    }
    /*
    * Rangasamy.M
    *
    */
    public function categoryProducts(Request $request){
       
        $input = $request->all();

        $categoryId = $input['category_id'];
        
        if( isset( $categoryId ) && !empty( $categoryId ) ) {
        
            $products = DB::table('categories as c')
                    ->select("c.id as cid","c.category_name","p.id","p.product_name",
                    "p.product_code","p.carat","p.kt","p.weight","p.city_id","p.description",
                    "p.category_id","p.product_ios_img_small","p.product_ios_img_large","p.description","p.status","p.created_at","p.updated_at")
                    ->leftjoin('products as p', 'p.category_id', '=', 'c.id')
                    ->orderBy('p.product_name', 'ASC')
                    ->where('p.category_id', '=',$categoryId)
                    ->where('p.status', '=',1)				
                    ->get();   
            
            if( !$products->isEmpty() ) { 
                
                $response = array();
                foreach($products as $key=>$product){
                    
                    $data = array(); 
                    $data['id'] = $product->id;
                    $data['productName'] = $product->product_name;
                    //$data['description'] = ( isset( $product->description ) && !empty( $product->description ) ? $product->description : '--');
                    $data['product_ios_img_small'] = $product->product_ios_img_small ? url('/')."/images/products/sm/".$product->product_ios_img_small : '--';
                    $data['product_img_large'] = $product->product_ios_img_large ? url('/')."/images/products/lg/".$product->product_ios_img_large : '--';
                    $data['product_code'] = ( isset( $product->product_code ) && !empty( $product->product_code ) ? $product->product_code : '--');
                    $data['product_carat'] = ( isset( $product->carat ) && !empty( $product->carat ) ? $product->carat : '--');
                    $data['product_kt'] = ( isset( $product->kt ) && !empty( $product->kt ) ? $product->kt : '--');
                    $data['product_weight'] = ( isset( $product->weight ) && !empty( $product->weight ) ? $product->weight : '--');
                    //$data['product_ratings'] = ( isset( $product->ratings ) && !empty( $product->ratings ) ? $product->ratings : '--');
                    $data['city'] = (( $product->city_id == 1 ) ? "Coimbatore" : "Chennai");
                  
                    array_push($response,$data);
    
                }
                
                return response()->json(['success' => true, 'data' => $response], 200);
                
            } else {
                $response = "no Record Found";
			    return response()->json(['success' => false, 'data' => $response ], 200); 
            }        

        } else {
            $response = "Category id is Missing";
			return response()->json(['success' => false, 'data' => $response ], 200); 
        }
    }



   /* public function userRegistration(Request $request)
    {
           
           $input = array();
           $input['name'] = "vimal";
           $input['password'] = "vimal";
           $input['mobile_number'] = "963852741";
           $input['email_id'] = "vimal@gmail.com";
        
           $customerDetailSave = new Customer();
           $CustomerId = $customerDetailSave->saveCustomers( $input );

           if( isset( $CustomerId ) && !empty( $CustomerId ) ) {  
             
               // If Merchant save Success.
               return response()->json(['success' => $this->successStatus, 'message' => $this->printRegisterSuccess() ], $this->successCode );	    

           } else {

               // If Merchant save falis.
               return response()->json(['success' => $this->failureStatus, 'message' => $this->printRegisterFalse() ], $this->failureCode );

           } 
 
   } */


   public function VendorRegistration(Request $request)
   {
         
        $input = $request->all();

        //dd($input);
	
        // run the validation rules on the inputs from the form
        $validator = Validator::make($input, Vendor::$regisVendorRules);
     
         // if the validator fails, redirect back to the form
         if ($validator->fails()) {
		 
            $errors = $validator->messages()->toArray();
            $message = Helper::checkEmailMobileNumberExists($errors);
		 
            // If validation falis redirect back to login.
            return response()->json(['success' => $this->failureStatus, 'message' => $message], $this->failureCode );
			 
         } else {

            $vendorDetailSave = new Vendor();
            $VendorId = $vendorDetailSave->saveVendors( $input );
 
            if( isset( $VendorId ) && !empty( $VendorId ) ) {  
              
                // If Merchant save Success.
                return response()->json(['success' => $this->successStatus, 'message' => $this->printRegisterSuccess() ], $this->successCode );	    

            } else {

                // If Merchant save falis.
                return response()->json(['success' => $this->failureStatus, 'message' => $this->printRegisterFalse() ], $this->failureCode );

            } 

         }

    }

    public function doMobileLogin(Request $request) {
        
        $input = $request->all();         
        $mobileNumber = $input['mobile_number'];
    
        if( isset( $mobileNumber ) && !empty( $mobileNumber ) ) {
             
            $vendorDetail = new Vendor();
            $mobileNoExists = $vendorDetail->checkMobileNoExists( $mobileNumber );
            
            if(!empty( $mobileNoExists) ) {

                return response()->json(['success' => $this->successStatus, 'key' => Config::get('constant.TEXT.TWO'), 'message' => $this->printLoginSuccess() ], $this->successCode );

            } else {
                
                return response()->json(['success' => $this->successStatus, 'key' => Config::get('constant.TEXT.ONE'), 'message' => $this->printNewUser() ], $this->successCode );
            } // Mobile no exists

        } else {
            
            return response()->json(['success' => $this->failureStatus, 'message' => $this->printMobileNoMissing() ], $this->failureCode );
        }  
           
    }

    public function getFeedback(){
       
        $questions = DB::table('questions')
                     ->orderBy('id', 'ASC')
                     ->get();
             
         if(!empty($questions)) { 
                 
            $response = array();
            $i = 1;
            foreach($questions as $key=>$question){
                
                $data = array(); 
                $data['id'] = $question->id;
                $data['text'] = ( isset( $question->text ) && !empty( $question->text ) ? $question->text : '--');
                $options = Helper::getOptions($question->id);
                if(!empty($options)){
                    foreach($options as $key => $option) {
                        $data['opt'.++$key] = $option['option']; 
                        $i++;
                    }
                }    
                array_push($response,$data);
            }
            return response()->json(['success' => true, 'data' => $response], 200);
        } else {
			$response = "no Record Found";
			return response()->json(['success' => false, 'data' => $response ], 200);    
		}      

    }

    public function experienceFeedback(Request $request) {
        
        $input = $request->all();         
        $mobileNumber = $input['mobile_number'];
        
        /* echo "<pre>";
        print_r($input);
        exit; */

        if( isset( $mobileNumber ) && !empty( $mobileNumber ) ) {
             
            $vendorDetail = new Vendor();
            $mobileNoExists = $vendorDetail->checkMobileNoExists( $mobileNumber );
            
            if(!empty( $mobileNoExists) ) {

                $answerDetail = new Answer();
                $answerId = $answerDetail->saveCustomerFeedback( $input ); 
                
                $feedback = new FeedbackRating();
                $feedback->answer_id = $answerId;
                $feedback->customer_name = ( isset( $input['customer_name'] ) && !empty( $input['customer_name'] ) ? $input['customer_name'] : ' '); 
                $feedback->mobile_number = ( isset( $mobileNumber ) && !empty( $mobileNumber ) ? $mobileNumber : ' '); 
                $feedback->staff_name = ( isset( $input['staff_name'] ) && !empty( $input['staff_name'] ) ? $input['staff_name'] : ' '); 
                $feedback->city_id = ( isset( $input['city_id'] ) && !empty( $input['city_id'] ) ? $input['city_id'] : ' '); 
                $feedback->ratings = ( isset( $input['ratings'] ) && !empty( $input['ratings'] ) ? $input['ratings'] : ' '); 
                $feedback->save();

                return response()->json(['success' => $this->successStatus,  'message' => $this->printExperienceFeedback() ], $this->successCode );

            } else {
                
                return response()->json(['success' => $this->failureStatus,  'message' => $this->printCorrectMobileNumber() ], $this->failureCode );
            } // Mobile no exists

        } else {
            
            return response()->json(['success' => $this->failureStatus, 'message' => $this->printMobileNoMissing() ], $this->failureCode );
        }  
           
    }


    public function getCustomerFeedbacks(){
       
        $questions = DB::table('staff_questions')
                     ->orderBy('id', 'ASC')
                     ->get();
             
         if(!empty($questions)) { 
                 
            $response = array();
            $i = 1;
            foreach($questions as $key=>$question){
                
                $data = array(); 
                $data['id'] = $question->id;
                $data['text'] = ( isset( $question->text ) && !empty( $question->text ) ? $question->text : '--');
                $options = Helper::getStaffOptions($question->id);
                if(!empty($options)){
                    foreach($options as $key => $option) {
                        $data['opt'.++$key] = $option['option']; 
                        $i++;
                    }
                }    
                array_push($response,$data);
            }
            return response()->json(['success' => true, 'data' => $response], 200);
        } else {
			$response = "no Record Found";
			return response()->json(['success' => false, 'data' => $response ], 200);    
		}      

    }

    public function customerFeedback(Request $request) {
        
        $input = $request->all();         
        $mobileNumber = $input['mobile_number'];
        
        /* echo "<pre>";
        print_r($input);
        exit; */

        if( isset( $mobileNumber ) && !empty( $mobileNumber ) ) {
             
            $vendorDetail = new Vendor();
            $mobileNoExists = $vendorDetail->checkMobileNoExists( $mobileNumber );
            
            if(!empty( $mobileNoExists) ) {

                $answerDetail = new StaffAnswer();
                $answerId = $answerDetail->saveCustomerStaffFeedback( $input ); 
                
                $staff = new StaffRating();
                $staff->answer_id = $answerId;
                $staff->customer_name = ( isset( $input['customer_name'] ) && !empty( $input['customer_name'] ) ? $input['customer_name'] : ' '); 
                $staff->mobile_number = ( isset( $mobileNumber ) && !empty( $mobileNumber ) ? $mobileNumber : ' '); 
                $staff->staff_name = ( isset( $input['staff_name'] ) && !empty( $input['staff_name'] ) ? $input['staff_name'] : ' '); 
                $staff->city_id = ( isset( $input['city_id'] ) && !empty( $input['city_id'] ) ? $input['city_id'] : ' '); 
                $staff->ratings = ( isset( $input['ratings'] ) && !empty( $input['ratings'] ) ? $input['ratings'] : ' '); 
                $staff->save();

                return response()->json(['success' => $this->successStatus,  'message' => $this->printCustomerFeedback() ], $this->successCode );

            } else {
                
                return response()->json(['success' => $this->failureStatus,  'message' => $this->printCorrectMobileNumber() ], $this->failureCode );
            } // Mobile no exists

        } else {
            
            return response()->json(['success' => $this->failureStatus, 'message' => $this->printMobileNoMissing() ], $this->failureCode );
        }  
           
    }

    public function getCityNames(){
       
        $cities = DB::table('cities')
                     ->orderBy('id', 'ASC')
                     ->get();
             
         if(!empty($cities)) { 
                 
            $response = array();
            foreach($cities as $key=>$city){
                
                $data = array(); 
                $data['id'] = $city->id;
                $data['city_name'] = $city->city_name;
                array_push($response,$data);
            }
            $response[2]['city_name'] = "Expo";
            $response[2]['id'] = "3";
            return response()->json(['success' => true, 'data' => $response], 200);
        } else {
			$response = "no Record Found";
			return response()->json(['success' => false, 'data' => $response ], 200);    
		}      

    }


    public function getSelectedStaff(Request $request) {
        
        $input = $request->all();         
        $placeId = $input['place_id'];
        
        /* echo "<pre>";
        print_r($input);
        exit; */

        if( isset( $placeId ) && !empty( $placeId ) ) {
             
            $staffs = DB::table('staffs')
                        ->orderBy('id', 'ASC')
                        ->where('city_id', '=', $placeId)	
                        ->get();
            
            $response = array();
            foreach($staffs as $key=>$staff){
                
                $data = array(); 
                $data['id'] = $staff->id;
                $data['staff_name'] = $staff->staff_name;
                $data['position'] = $staff->position;
                $data['staff_image'] = $staff->profile_image ? url('/')."/images/staff_images/".$staff->profile_image : '--';
                array_push($response,$data);
            }

            return response()->json(['success' => $this->successStatus,  'message' => $response ], $this->successCode );


        } else {
            
            return response()->json(['success' => $this->failureStatus, 'message' => $this->printPlaceIdMissing() ], $this->failureCode );
        }  
           
    }

    public function expoCustomer(Request $request) {
        
        $input = $request->all();         
        $customer_name = $input['customer_name'];
        $mobile_number = $input['mobile_number'];
        $email_id = $input['email_id'];
        $city = $input['city'];
        $comments = $input['comments'];
        $know_about = $input['know_about'];
        $status = $input['status'];
        
        /* echo "<pre>";
        print_r($input);
        exit; */

        // run the validation rules on the inputs from the form
        $validator = Validator::make($input, ExpoCustomer::$expoCustomerRules);
        
         // if the validator fails, redirect back to the form
         if ($validator->fails()) {
		 
            $errors = $validator->messages()->toArray();
            $message = Helper::checkExpoMobileNoExists($errors);
		 
            // If validation falis redirect back to login.
            return response()->json(['success' => $this->failureStatus, 'message' => $message], $this->failureCode );
			 
         } else {

            if( isset( $mobile_number ) && !empty( $mobile_number ) ) {
                
                $expoCustomer = new ExpoCustomer();
                $expoCustomer->customer_name = ( isset( $input['customer_name'] ) && !empty( $input['customer_name'] ) ? $input['customer_name'] : ' '); 
                $expoCustomer->email_id = ( isset( $input['email_id'] ) && !empty( $input['email_id'] ) ? $input['email_id'] : ' '); 
                $expoCustomer->city = ( isset( $input['city'] ) && !empty( $input['city'] ) ? $input['city'] : ' '); 
                $expoCustomer->mobile_number = ( isset( $mobile_number ) && !empty( $mobile_number ) ? $mobile_number : ' '); 
                $expoCustomer->know_about = ( isset( $know_about ) && !empty( $know_about ) ? $know_about : ' '); 
                $expoCustomer->comments = ( isset( $input['comments'] ) && !empty( $input['comments'] ) ? $input['comments'] : ' '); 
                $expoCustomer->status = ( isset( $input['status'] ) && !empty( $input['status'] ) ? $input['status'] : ' '); 
                $expoCustomer->save();          

                return response()->json(['success' => $this->successStatus,  'message' => $this->printFeedBack() ], $this->successCode );


            } else {
                
                return response()->json(['success' => $this->failureStatus, 'message' => $this->printMobileNoMissing() ], $this->failureCode );
            }  
       
        }
           
    }


}
