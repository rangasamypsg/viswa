<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Helpers\Helper;
use App\Sale;
use Config;
use Auth;
use DB;


class SaleController extends Controller
{	
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
        $perPage = Config::get('settings.pagination.perPage');
        if (!empty($keyword)) {
            $sales = Sale::where('sale_name', 'LIKE', "%$keyword%")
				->orderBy('id', 'desc')
                ->get();
        } else {
            $sales = DB::table('sales')
                           ->orderBy('id', 'desc')
                           ->get(); 
        }
        return view('Sale.index',compact('sales')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('Sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
	
        $input = $request->all();
        /* echo "<pre>";
        print_r($input);
        exit; */
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'purchase_id' => 'required',
            //'sales_id' => 'required',
            //'mobile_number' => 'required|unique:sales',
            'sale_image' =>  'image|mimes:jpeg,jpg,png',
            'mobile_number' => 'required',
            'date_of_service' => 'required',
            'return_of_service' => 'required',
            'username' => 'required'                          			 		
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
            
            if ($request->hasFile('sale_image')) {
                $image = $request->file('sale_image');
                $input['sale_image'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/services');
                $image->move($destinationPath, $input['sale_image']);
            }		 
            $sale = new Sale();
            $sale->purchase_id = $request->purchase_id;
            //$sale->sales_id = $request->sales_id;
            if ($request->hasFile('sale_image')) {
                $sale->sale_image = $input['sale_image'];
            }
            $sale->sales_id = Helper::__codeGeneration(Config::get('constant.VISWA.SALE'),Config::get('constant.FORMAT-CODE.SALE_CODE'));
            $sale->mobile_number = $request->mobile_number;
            $sale->date_of_service = date("Y-m-d", strtotime($request->date_of_service));
            $sale->return_of_service = date("Y-m-d", strtotime($request->return_of_service));
            $sale->username = $request->username;
            $sale->description = $request->description;
            $sale->status = 'Pending';
            $sale->save();

            if(isset($sale->id) && !empty($sale->id)) {                
                $senderId = Config::get('constant.VISWA.SMS.CONTENT');
                $content = "Service created successfully ";
                Helper::sendSmsService( $senderId, $request->mobile_number, $content );
            } 
				
			return redirect()->route('Sale.index')
                        ->with('success','Service created successfully');		
		 }
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        return view('Sale.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$sale = Sale::find($id);
        return view('Sale.edit',compact('sale'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        /*echo "<pre>";
        print_r($input);
        exit;*/
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array( 
            'purchase_id' => 'required',
            //'sales_id' => 'required',
            //'mobile_number' => 'required|unique:sales,mobile_number,'.$id,
            'sale_image' =>  'image|mimes:jpeg,jpg,png',
            'mobile_number' => 'required',
            'date_of_service' => 'required',
            'return_of_service' => 'required',
            'username' => 'required' 
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
            if ($request->hasFile('sale_image')) {
                $image = $request->file('sale_image');
                $input['sale_image'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/services');
                $image->move($destinationPath, $input['sale_image']);
            }
            $sale = Sale::find($id);
            $sale->purchase_id = $request->purchase_id;
            //$sale->sales_id = $request->sales_id;
            if ($request->hasFile('sale_image')) {
                $sale->sale_image = $input['sale_image'];
            }
            $sale->mobile_number = $request->mobile_number;
            $sale->date_of_service = date("Y-m-d", strtotime($request->date_of_service));
            $sale->return_of_service = date("Y-m-d", strtotime($request->return_of_service));
            $sale->username = $request->username;
            $sale->description = $request->description;
            $sale->status =  ( isset( $request->status ) && $request->status == 'Completed' ? $request->status : 'Pending' );
            $sale->save();
           
            if(isset( $request->status ) &&  $request->status == 'Completed' ) {                
                $senderId = Config::get('constant.VISWA.SMS.CONTENT');
                $content = "Service completed successfully ";
                Helper::sendSmsService( $senderId, $request->mobile_number, $content );
            }
            
			return redirect()->route('Sale.index')
                        ->with('success','Record updated successfully');	
		 }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        return redirect()->route('Sale.index')
                        ->with('success','Record deleted successfully');
    }
    
}
