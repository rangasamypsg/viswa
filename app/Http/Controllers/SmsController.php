<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests;
use App\Vendor;
use Config;
use Auth;
use DB;

class SmsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $customers = Vendor::orderBy('name','ASC')->select('mobile_number')->get();
        $data = array(); 
        foreach($customers as $customer){
            $data[] = $customer->mobile_number;
        }
        /* echo "<pre>";
        print_r($data);
        exit; */
        $mobileNumber = '';
        if(!empty($data)) {
            $mobileNumber = implode(",",$data);
        }
        //$mobileNumber = "9566309844,9789108964";
        //$mobileNumber.= "9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321,9894460030,9894567890,9789108965,9987654321";
        return view('SMS.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        /* echo "<pre>";
        print_r($input);
        exit; */

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'sender_id' => 'required|string|max:6',
            //'mobile_number' => 'required',
            'campaign' => 'required',
            'content' => 'required'
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
            if(!empty($request->sender_id) && !empty($request->mobile_numbers) && !empty($request->content)) {
                Helper::sendSmsService( $request->sender_id, $request->mobile_numbers, $request->content );
            }				
			return redirect()->route('Sms.create')
                        ->with('success','Sms Send successfully');		
		 }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCity(Request $request)
    {
        //DB::enableQueryLog();
        $weddingday = $birthday = $mobileNumber = '';
        $customers = array();
        $data = explode(",",$request->name);

        if (in_array("Wedding", $data)) {
            $weddingday = date("Y-m-d");
        }
        if (in_array("Birthday", $data)) {
            $birthday = date("Y-m-d");
        }
        $currentMonth = date('m');
        $currentDay = date('d');
        $diffArray = array_diff($data, array("Wedding","Birthday"));        
        //$customers = Vendor::orderBy('name','ASC')->select('mobile_number')->whereIn('city_id',$data)->where('wedding',$weddingday)->get();

        if( isset($request->name) && !empty($request->name) ) {
            $query = Vendor::orderBy('name','ASC')->select('mobile_number');
            if( isset($diffArray) && !empty($diffArray) ) {   
                $query->whereIn('city_id',$diffArray);
            }
            if( isset($weddingday) && !empty($weddingday) ) {    
                $query->whereRaw('MONTH(wedding) = ?',[$currentMonth]);
                $query->whereRaw('DAY(wedding) = ?',[$currentDay]);
            }
            if( isset($birthday) && !empty($birthday) ) {    
                $query->whereRaw('MONTH(dob) = ?',[$currentMonth]);
                $query->whereRaw('DAY(dob) = ?',[$currentDay]);
            }
            $customers = $query->get();
        }

/*         $query = DB::getQueryLog();
        $query = end($query);
        echo "<pre>";
        print_r($query);
        exit; */

        if( isset($customers) && !empty($customers) ) {

            $records = array(); 
            foreach($customers as $customer){
                $records[] = $customer->mobile_number;
            }
            if(!empty($records)) {
                $mobileNumber = implode(",",$records);
            }
        }     
        //echo $mobileNumber;
        //exit;
        return response()->json(['success'=>'Data is successfully added','data' => $mobileNumber]);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
