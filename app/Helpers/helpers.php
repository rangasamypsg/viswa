<?php

namespace App\Helpers;
use App\Helpers;
use App\Product;
use App\City;
use App\Sale; 
use App\Question; 
use App\Answer; 
use App\Option; 
use App\StaffQuestion; 
use App\StaffOption; 
use App\StaffAnswer; 
use Config;
use DB;

class Helper
{
    public static function fooBar()
    {
        return 'it works!';
    }
     
    public static function checkEmailMobileNoExists($errorsData){
        
        $message = '';
       
        if(isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number already exist. Please try with another mobile number.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0])){          
            $message = "Email ID already exist. Please try with different mail id.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0]) AND isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number and Email ID already exists.";
        }                        
       
        return $message;
    }
    
    public static function checkEmailMobileNumberExists($errorsData){
        
        $message = '';
       
        if(isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number already exist. Please try with another mobile number.";
        }
        if(isset($errorsData['email'][0]) && !empty($errorsData['email'][0])){          
            $message = "Email ID already exist. Please try with different mail id.";
        }
        if(isset($errorsData['email'][0]) && !empty($errorsData['email'][0]) AND isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number and Email ID already exists.";
        }                        
       
        return $message;
    } 

    public static function checkExpoMobileNoExists($errorsData){
        
        $message = '';
       
        if(isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number already exist. Please try with another mobile number.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0])){          
            $message = "Email ID already exist. Please try with different mail id.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0]) AND isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number and Email ID already exists.";
        }  
        
        return $message;
    }
    
    public static function sendSmsService( $sender_id, $mobileNumber, $data ) {

        //echo strtoupper($sender_id)." | ".$mobileNumber." | ".$data;
        //exit;
        //Your authentication key
        $authKey = Config::get('settings.SMS.AUTHENTICATION_KEY');

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $mobileNumber;

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = strtoupper($sender_id);

        //Your message to send, Add URL encoding here.
        $message = urlencode("$data");

        //Define route 
        $route = Config::get('settings.SMS.ROUTE');

        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

        //API URL
        $url="http://api.msg91.com/api/sendhttp.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);        

        return  ( isset( $output ) && !empty( $output ) ? $output : '');

    } // SendSms

    public static function getCityName($cityID){
        $data = City::where("id", '=', $cityID)->first();  
        return ( isset($data->city_name) && !empty($data->city_name) ? $data->city_name : '' );
    }
    
    public static function getDateFormat( $create_date ) {
 
        return date(Config::get('settings.Date-Format'),strtotime(Config::get('settings.Date_Format'),strtotime($create_date))); 
    }

    public static function __codeGeneration($type,$type_code) 
    {
         switch ($type) {
            case Config::get('constant.VISWA.SALE'):
               
                $sale = SALE::orderBy('id','Desc')->first();
                 
                if(!empty($sale['id'])) {
                    $id = $sale['id'];
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;
            case Config::get('constant.VISWA.ANSWER'):
               
                $answer = ANSWER::orderBy('id','Desc')->first();
                
                if(!empty($answer['id'])) {
                    $id = $answer['answer_id']; 
                    $incrementVal = ++$id; 
                } else {
                    $incrementVal = 1;
                }
                return $incrementVal;
            break;
            case Config::get('constant.VISWA.STAFFANSWER'):
               
                $answer = StaffAnswer::orderBy('id','Desc')->first();
                
                if(!empty($answer['id'])) {
                    $id = $answer['answer_id']; 
                    $incrementVal = ++$id; 
                } else {
                    $incrementVal = 1;
                }
                return $incrementVal;
            break;
        }  
    }


    public static function getQuestion($answerId){
        $data = Question::where("id", '=', $answerId)->first();  
        return ( isset($data->text) && !empty($data->text) ? $data->text : '' );
    }

    public static function getAnswer($answerId){
        $data = Option::where("question_id", '=', $answerId)->first();  
        return ( isset($data->answer) && !empty($data->answer) ? $data->answer : '' );
    }

    public static function getQuestions( $answerId ){
        $data = Answer::where("answer_id", '=', $answerId)->get();  
        return ( isset($data) && !empty($data) ? $data : '' );
    }

    public static function getOptions( $questionId ){
        $data = Option::where("question_id", '=', $questionId)->get();  
        return ( isset($data) && !empty($data) ? $data : '' );
    }

    public static function getRatingImage($rating) 
    {
        return ( isset($rating) && !empty($rating) ? $rating.".png" : '' );
    }

    public static function getStaffQuestion($answerId){
        $data = StaffQuestion::where("id", '=', $answerId)->first();  
        return ( isset($data->text) && !empty($data->text) ? $data->text : '' );
    }

    public static function getStaffQuestions( $answerId ){
        $data = StaffAnswer::where("answer_id", '=', $answerId)->get();  
        return ( isset($data) && !empty($data) ? $data : '' );
    }

    public static function getStaffOptions( $questionId ){
        $data = StaffOption::where("question_id", '=', $questionId)->get();  
        return ( isset($data) && !empty($data) ? $data : '' );
    }

    public static function getCatProductCount( $categoryId, $status ){
        $data = Product::where("category_id", '=', $categoryId)->where("status", '=', $status)->count();  
        return ( isset($data) && !empty($data) ? $data : '' );
    }
}