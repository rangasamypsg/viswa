<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests;
use App\Vendor;
use App\City;
use Config;
use Auth;
use DB;


class VendorController extends Controller
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
            $vendors = Vendor::where('vendor_name', 'LIKE', "%$keyword%")
				->orderBy('id', 'desc')
                ->get();
        } else {
             $vendors = DB::table('vendors')
                           ->orderBy('id', 'desc')
                           ->get(); 
        }
        return view('Vendor.index',compact('vendors')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get()->pluck('city_name', 'id')->prepend(trans('Select City'), '');
		return view('Vendor.create',compact('cities'));
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
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|unique:vendors',
            'email' => 'required|string|email|max:255|unique:vendors',
            'address' => 'required',
            'city_id' => 'required',
            'state' => 'required',
            'dob' => 'required',
            //'wedding' => 'required',
            //'preference' => 'required' 			 		
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
            
            $customer = new Vendor();
            $customer->name = $request->name;
            $customer->mobile_number = $request->mobile_number;
            $customer->address = $request->address;
            $customer->city_id = $request->city_id;
            $customer->state = $request->state;
            $customer->email = $request->email;
            $customer->dob = date("Y-m-d", strtotime($request->dob));
            //$customer->wedding = date("Y-m-d", strtotime($request->wedding));
            $customer->wedding = ( isset( $request->wedding ) && !empty( $request->wedding ) ? date("Y-m-d", strtotime($request->wedding)) : '--' );
            /* $customer->ring = ( isset( $request->preference['ring'] ) && !empty( $request->preference['ring'] ) ? $request->preference['ring'] : '' );
            $customer->bracelet = ( isset( $request->preference['bracelet'] ) && !empty( $request->preference['bracelet'] ) ? $request->preference['bracelet'] : '' );
            $customer->chain = ( isset( $request->preference['chain'] ) && !empty( $request->preference['chain'] ) ? $request->preference['chain'] : '' ); */
            $customer->save();

            if(isset($customer->id) && !empty($customer->id)) {                
                $senderId = Config::get('constant.VISWA.SMS.CONTENT');
                $content = "Customer Register successfully ";
                Helper::sendSmsService( $senderId, $request->mobile_number, $content );
            }
				
			return redirect()->route('Vendor.index')
                        ->with('success','Customer created successfully');		
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
        $vendor = Vendor::find($id);
        return view('Vendor.show',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::get()->pluck('city_name', 'id')->prepend(trans('Select City'), '');
		$vendor = Vendor::find($id);
        return view('Vendor.edit',compact('vendor','cities'));        
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
	 
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array( 
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|unique:vendors,mobile_number,'.$id,
            'email'  => 'required|email|unique:vendors,email,'.$id,
            'address' => 'required',
            'city_id' => 'required',
            'state' => 'required',
            'dob' => 'required',
            //'wedding' => 'required',
            //'preference' => 'required' 	
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
            
            $customer = Vendor::find($id);
            $customer->name = $request->name;
            $customer->mobile_number = $request->mobile_number;
            $customer->address = $request->address;
            $customer->city_id = $request->city_id;
            $customer->state = $request->state;
            $customer->email = $request->email;
            $customer->dob = date("Y-m-d", strtotime($request->dob));
            //$customer->wedding = date("Y-m-d", strtotime($request->wedding));
            $customer->wedding = ( ($request->wedding != '--' ) ? date("Y-m-d", strtotime($request->wedding)) : '--' );
            /* $customer->ring = ( isset( $request->preference['ring'] ) && !empty( $request->preference['ring'] ) ? $request->preference['ring'] : '' );
            $customer->bracelet = ( isset( $request->preference['bracelet'] ) && !empty( $request->preference['bracelet'] ) ? $request->preference['bracelet'] : '' );
            $customer->chain = ( isset( $request->preference['chain'] ) && !empty( $request->preference['chain'] ) ? $request->preference['chain'] : '' ); */
            $customer->save();
            	
			return redirect()->route('Vendor.index')
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
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->route('Vendor.index')
                        ->with('success','Record deleted successfully');
    }
    
}
