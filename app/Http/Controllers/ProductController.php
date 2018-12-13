<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\City;
use Config;
use Auth;
use DB;
use Excel;
use File;

class ProductController extends Controller
{
    public $perPage = 12;
     
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {		
		$keyword = $request->get('search');
        $perPage = 5;
        if (!empty($keyword)) {
            $products = Product::where('product_name', 'LIKE', "%$keyword%")
                        //->where('status', '=','1')
                        ->orderBy('id', 'desc')
                        ->paginate($perPage);
        } else {
            
            $products = DB::table('categories as c')
                    ->select("c.category_name","p.id","p.product_name","p.product_code","p.city_id","p.product_ios_img_small","p.slug","p.category_id","p.description","p.carat","p.kt","p.weight","p.status")
                    ->join('products as p', 'p.category_id', '=', 'c.id')
                    ->orderBy('p.created_at', 'desc')
                    ->get();          
        }
        
        return view('Product.index',compact('products')); 
		
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cities = City::get()->pluck('city_name', 'id')->prepend(trans('Select City'), '');
        $categorys = Category::orderBy('category_name','ASC')->get();
        return view('Product.create',compact('categorys','cities'));
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request){
	
		$input = $request->all();
       
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'product_name' => 'required|unique:products',
            'product_code' => 'required|unique:products',
            'category_id' => 'required',
            'city_id' => 'required',
            //'product_ios_img_small' => 'required|image|mimes:jpeg,jpg,png|dimensions:width=768,height=310',
            //'product_ios_img_large' => 'required|image|mimes:jpeg,jpg,png|dimensions:width=768,height=1024',
			'description' => 'required',
			//'price' => 'required|numeric',
			//'status' => 'required',
		);
		
         // run the validation rules on the inputs from the form
         $validator = Validator::make($input, $rules);
         // if the validator fails, redirect back to the form
         if ($validator->fails()) {
            // If validation falis redirect back to login.
            return redirect()->back()
                              ->withInput()
                              ->with('errors',$validator->errors()); 
		 } else {

            if ($request->hasFile('product_ios_img_small')) {
                $image = $request->file('product_ios_img_small');
                $prdSmImg = time().'.'.$image->getClientOriginalExtension();
                $input['product_ios_img_small'] = "sm_".$prdSmImg;
                $destinationPath = public_path('/images/products/sm');
                $image->move($destinationPath, $input['product_ios_img_small']);
            }

            if ($request->hasFile('product_ios_img_large')) {
                $image = $request->file('product_ios_img_large');
                $prdLgImg = time().'.'.$image->getClientOriginalExtension();
                $input['product_ios_img_large'] = "lg_".$prdLgImg;
                $destinationPath = public_path('/images/products/lg');
                $image->move($destinationPath, $input['product_ios_img_large']);
            }

			$product = new Product();
			$product->product_name = $input['product_name'];
			$product->product_code = $input['product_code'];
            $product->category_id = $input['category_id'];
            $product->city_id = $input['city_id'];
           
            if ($request->hasFile('product_ios_img_large')) {
                $product->product_ios_img_large = $input['product_ios_img_large'];
            }
            if ($request->hasFile('product_ios_img_small')) {
                $product->product_ios_img_small = $input['product_ios_img_small'];
            }
            $product->slug = str_slug($input['product_name'],'-');
            $product->description = $input['description'];
            $product->carat = (($input['carat']) ? $input['carat'] : '');
            $product->kt = (($input['kt']) ? $input['kt'] : '');
            $product->weight = (($input['weight']) ? $input['weight'] : '');
            $product->status = $input['status'];
            $product->save();
				
			return redirect()->route('Product.index')
                        ->with('success','Product created successfully');		
		 }
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::find($id);
        return view('Product.show',compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
         
        $product = Product::find($id);
        $cities = City::get()->pluck('city_name', 'id')->prepend(trans('Select City'), '');
        $categorys = Category::orderBy('category_name','ASC')->get();
	    return view('Product.edit',compact('product','categorys','cities'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
   
		$input = $request->all();
    
    	// validate
        $rules = array(
            'product_name' => 'required|unique:products,product_name,'.$id,
            'product_code' => 'required|unique:products,product_code,'.$id,
            'category_id' => 'required',
            'city_id' => 'required',
            //'product_ios_img_small' => 'sometimes|required|image|mimes:jpeg,jpg,png|dimensions:width=768,height=310',
            //'product_ios_img_large' => 'sometimes|required|image|mimes:jpeg,jpg,png|dimensions:width=768,height=1024',
			'description' => 'required',
		);
		
         // run the validation rules on the inputs from the form
         $validator = Validator::make($input, $rules);
         // if the validator fails, redirect back to the form
         if ($validator->fails()) {
             // If validation falis redirect back to login.
              return redirect()->back()
                              ->withInput()
                              ->with('errors',$validator->errors()); 
		 } else {
           
            if ($request->hasFile('product_ios_img_small')) {
                $image = $request->file('product_ios_img_small');
                $prdSmImg = time().'.'.$image->getClientOriginalExtension();
                $input['product_ios_img_small'] = "sm_".$prdSmImg;
                $destinationPath = public_path('/images/products/sm');
                $image->move($destinationPath, $input['product_ios_img_small']);
            }

            if ($request->hasFile('product_ios_img_large')) {
                $image = $request->file('product_ios_img_large');
                $prdLgImg = time().'.'.$image->getClientOriginalExtension();
                $input['product_ios_img_large'] = "lg_".$prdLgImg;
                $destinationPath = public_path('/images/products/lg');
                $image->move($destinationPath, $input['product_ios_img_large']);
            }

            $product = Product::find($id);
            $product->product_name = $input['product_name'];
            $product->product_code = $input['product_code'];
            $product->category_id = $input['category_id'];
            $product->city_id = $input['city_id'];
            if ($request->hasFile('product_ios_img_small')) {
                $product->product_ios_img_small = $input['product_ios_img_small'];
            }
            if ($request->hasFile('product_ios_img_large')) {
                $product->product_ios_img_large = $input['product_ios_img_large'];
            }            
            $product->slug = str_slug($input['product_name'],'-');
            $product->description = $input['description'];
            $product->carat = (($input['carat']) ? $input['carat'] : '');
            $product->kt = (($input['kt']) ? $input['kt'] : '');
            $product->weight = (($input['weight']) ? $input['weight'] : '');
            $product->status = $input['status'];
            $product->save();
				
			return redirect()->route('Product.index')
                        ->with('success','Record updated successfully');
				
         }
             
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $product = Product::find($id);
        if($product->product_ios_img_small || $product->product_ios_img_large){             
            unlink(public_path() .'/images/products/sm/'. $product->product_ios_img_small); 
            unlink(public_path() .'/images/products/lg/'. $product->product_ios_img_large); 
        }
        $product->delete();
        return redirect()->route('Product.index')
                        ->with('success','Record deleted successfully');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function productimage()
     {	
        $products = DB::table('categories as c')
            ->select("c.id","c.category_name","p.product_name","p.product_image")
            ->leftjoin('products as p', 'p.category_id', '=', 'c.id')
            ->orderBy('p.created_at', 'desc')	
            ->get();
       
        return view('Product.index',compact('products'));          
     }
        
     
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showProducts()
     {	
        $products = DB::table('categories as c')
                    ->select("c.id","c.category_name","c.category_image",
                    "p.id as product_id","p.product_name","p.product_code","p.city_id","p.slug","p.category_id","p.product_ios_img_small","p.product_ios_img_large","p.description","p.carat","p.kt","p.weight","p.status")
                    ->join('products as p', 'p.category_id', '=', 'c.id')
                    //->where('p.status', '=','1')
                    ->orderBy('p.id', 'Asc')
                    ->get();
                    

        $categorys = array();
        foreach($products as $key=>$product){
           // $data = array(); 
            $data['id'] = $product->id;
            $data['category_name'] = $product->category_name;
            $data['product_name'] = $product->product_name;
            $data['product_code'] = $product->product_code;
            $data['description'] = $product->description;
            $data['product_image'] = $product->category_image;
            
            $categorys[$product->category_name] = array();
            array_push($categorys[$product->category_name],$data);
        }
 
        /* echo "<pre>";
        print_r($categorys);
        exit; */
        return view('Product.showProducts',compact('categorys')); 
     }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showProductCategory($id)
     {	
        $products = DB::table('categories as c')
            ->select("c.category_name","p.id","p.product_name","p.product_code","p.city_id","p.slug","p.category_id","p.product_ios_img_small","p.product_ios_img_large","p.description","p.carat","p.kt","p.weight","p.status")
            ->leftjoin('products as p', 'p.category_id', '=', 'c.id')
            ->orderBy('p.created_at', 'desc')
            ->where('p.category_id', '=',$id)
            ->where('p.status', '=', 1)	
            //->get();
            ->paginate($this->perPage);
            
         
        return view('Product.showProductCategory',compact('products')); 
         
     }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showProductDetails($id,$name)
     {	
          $product = Product::orderBy('id', 'desc')
                      ->where('id', '=',$id)
                      ->where('slug', '=',$name)
                      ->first();

        return view('Product.showProductDetails',compact('product')); 
     }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getProductSoldout(Request $request){
        
        if($request->ajax()) {
			$input = $request->all();
			$productId = $input['product_id'];
			$status = $input['status'];
            $statusVal = (($status == 1) ? 0 : 1);
            $data = (($status == 1) ? 'sold-product' :  'sold-out');

            $UpdateDetails = Product::where('id', '=',  $productId)->first();
            $UpdateDetails->status = $statusVal;
            $UpdateDetails->save();
            
            $return = array('status'=>'success', 'msg'=> $data); 
    		return json_encode($return);
        }
    }
    
    public function importExport()
    {
        return view('Product.importExport');
    }

    public function downloadExcel($type)
    {
        $data = Product::get()->toArray();
        return Excel::create('laravelcode', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $request)
    {
        $input = $request->all();
        /* echo "<pre>";
        print_r($input);
        exit; */ 
        // validate
        $rules = array(
            'file' => 'required',             		 		
        );
		
         // run the validation rules on the inputs from the form
         $validator = Validator::make($input, $rules);
         // if the validator fails, redirect back to the form
         if ($validator->fails()) {
		  
             // If validation falis redirect back to login.
              return redirect()->back()
                              ->withInput()
                              ->with('errors',$validator->errors()); 
			 
        } else {
            
            if($request->hasFile('file')){
                $extension = File::extension($request->file->getClientOriginalName());
                if ( $extension == "xlsx" || $extension == "xls" ) {
         
                    $path = $request->file->getRealPath();
                    $data = Excel::load($path, function($reader) {
                    })->get();
                    if(!empty($data) && $data->count()){
                        
                        /* echo "<pre>";
                        print_r($data);
                        exit; */  

                        foreach ($data as $key => $row) {
                            $dataArray[] = [
                                'product_name' => (($row['product_name']) ? $row['product_name'] : ''),
                                'product_code' => (($row['product_code']) ? $row['product_code'] : ''),
                                'category_id' => (($row['category_id']) ? $row['category_id'] : ''),
                                'city_id' => (($row['city_id']) ? $row['city_id'] : ''),
                                'description' => (($row['description']) ? $row['description'] : ''),
                                'product_ios_img_small' => (($row['product_ios_img_small']) ? $row['product_ios_img_small'] : ''),
                                'product_ios_img_large' => (($row['product_ios_img_large']) ? $row['product_ios_img_large'] : ''),
                                'carat' => (($row['carat']) ? $row['carat'] : ''),
                                'kt' => (($row['kt']) ? $row['kt'] : ''),
                                'weight' => (($row['weight']) ? $row['weight'] : ''),
                                'slug' => (($row['slug']) ? $row['slug'] : ''),
                                'status' => (($row['status']) ? $row['status'] : ''),
                                'created_at' =>  date("Y-m-d H:i:s"),
                                'updated_at' =>  date("Y-m-d H:i:s"),
                            ];
                        }
         
                        if(!empty($dataArray)){
                            //dd($dataArray);
                            $insertData = DB::table('products')->insert($dataArray);
                            if ($insertData) {
                                Session::flash('success', 'Your Data has successfully imported');
                            }else {                        
                                Session::flash('error', 'Error inserting the data..');
                                return back();
                            }
                        }
                    }
         
                    return back();
         
                }else {
                    Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/xslx file..!!');
                    return back();
                }
            }

        } // else statement
    }

}