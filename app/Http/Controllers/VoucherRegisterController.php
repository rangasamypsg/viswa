<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\VoucherRegister; 
use App\VoucherHistory; 
use App\VoucherUser; 
use Config;
use Auth;
use DB;


class VoucherRegisterController extends Controller
{
    public $perPage = 10;
     
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
        /* $user = VoucherRegister::where('id', 1)->first();	
        echo $user->fullName;
        exit; */
        $voucherRegisters = VoucherRegister::all();
        //dd($voucherRegisters);

        return view('VoucherRegister.index',compact('voucherRegisters')); 
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voucherRedeemList()
    {
        return view('VoucherRegister.redeem'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function voucherUser(){

        $voucherUsers = VoucherUser::all();
        //dd($voucherUsers);

        return view('VoucherRegister.user',compact('voucherUsers')); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VoucherRegister  $vocucherRegister
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherRegister $vocucherRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoucherRegister  $vocucherRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherRegister $vocucherRegister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoucherRegister  $vocucherRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherRegister $vocucherRegister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoucherRegister  $vocucherRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherRegister $vocucherRegister)
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_voucher_list()
    {
        $voucherlist = VoucherRegister::all();
        return view('view_voucher_list')->with('voucherlist', $voucherlist);
        // return view('view_voucher_list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redeem_voucher(Request $request)
    {
        $input = $request->all();
        // return view('redeem_voucher');
        // return $input;
        //

        //echo "<pre>";
        //print_r($input); exit;
        $voucher_code = $input['voucher_code'];
        if(empty($voucher_code)){
            $data['status'] = "failure";
            $data['response'] = "Please enter the Voucher code";
            return json_encode( $data );
        } else {

            $userdata = DB::table('voucher_registers')->where('voucher',$voucher_code)->get();
            
            if( !$userdata->isEmpty()) {
                $data['status'] = "success";
                $data['response'] = $userdata;
                return json_encode( $data );

            } else {

                $data['status'] = "failure";
                $data['response'] = "Please enter the correct Voucher code";
                return json_encode( $data );
            }
            

        }

        //echo "<pre>";
        //print_r($userdata); exit;

       
    }


   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redeemed_voucher()
    {
        return view('redeem_voucher');
            // $data['response'] = "success";
            //  return json_encode( $data );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function voucher_redeem($id)
    {
        // $id = $request->id;

        $voucher_customer = DB::table('voucher_registers')->where('id', $id)->first();
        $voucher_count = $voucher_customer->voucher_count;
        $voucher_count_redeem = $voucher_customer->redeem_count;
        $mobile_number = $voucher_customer->mobile_number;

        if($voucher_count != 0){
            $voucher_count = $voucher_count-1;
            $voucher_count_redeem = $voucher_count_redeem+1;
            VoucherRegister::where('id', $id)->update(array(
                'voucher_count' =>$voucher_count,
                'redeem_count' =>$voucher_count_redeem,
            ));
            VoucherHistory::create([
                'user_id' => $id,
                'status' => '1',
            ]);
            // $voucherlist = VoucherRegister::all();
            // Route::get('sendmail', 'MailController@sendmail')->name('sendmail');
            $message = "SuccessFully Redeem.";
            $this->sendsms($mobile_number,$message);
            return redirect()->route('Voucher.voucherRedeemList')
                        ->with('success','Voucher Redeemed Successfully.');
        }
        else
        {
            // $message = "No Voucher To Redeem.";
            // $this->sendsms($mobile_number,$message);
            // Route::get('sendmail', 'MailController@sendmail')->name('sendmail');
            return redirect()->back()->with('status', 'No Voucher For Redeemed.');
        }
    }


    public function sendsms($mobile_number, $sendsms)
    {
        // Your authentication key
        $authKey = "207123AE91hE13cJ75ac1b73c";
        // Multiple mobiles numbers separated by comma
        $mobileNumber = $mobile_number;
        // Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "VDDVOC";
        // Your message to send, Add URL encoding here.
        $message = urlencode($sendsms);
        // Define route
        $route = "4";
        // Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );
        // API URL
        $url = "http://api.msg91.com/api/sendhttp.php";
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            // ,CURLOPT_FOLLOWLOCATION => true
        ));
        // Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // get response
        $output = curl_exec($ch);
        // Print error if any
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
    }

}
