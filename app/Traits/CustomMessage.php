<?php

namespace App\Traits;

trait CustomMessage {
  
    public function printThis() {
       echo "Trait executed rangasamy";
    }
 
    public static function printRegisterSuccess() {
       
        $data =  "Thanks for your registration.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printRegisterFalse() {
        
         $data =  "Registration not successful";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
     }

    public static function printCorrectMobileNumber() {
         
         $data =  "Please enter the correct mobile number";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printInvalidMobileNo() {
        
         $data =  "Invalid Mobile Number";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printInvalidMobileNoAndPassword() {
        
         $data =  "Invalid Mobile Number or Password";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printInvalidEmailId() {
        
        $data =  "Invalid Email ID";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
   }

   public static function printInvalidEmailIdAndPassword() {
        
        $data =  "Invalid Email ID or Password";
    
        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printEmailIdMissing() {
        
        $data =  "Email ID is Missing";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printPasswordSuccess() {
        
        $data =  "Password updated successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
   }

   public static function printPasswordFailure() {
       
        $data =  "Password not updated successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
   }

   public static function printCorrectEmailIdNumber() {
         
        $data =  "Please enter the correct Email Id";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printPasswordDoesnotMatch() {
         
        $data =  "passwords doesn't match";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMobileNoMissing() {
        
        $data =  "Please enter the mobile number";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printNewUser() {
        
        $data =  "New User";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printLoginSuccess() {
        
        $data =  "Login Success";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printExperienceFeedback() {
        
        $data =  "Experience feedback created successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerFeedback() {
        
        $data =  "Customer feedback created successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printPlaceIdMissing() {
        
        $data =  "Please select the place";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printFeedBack() {
        
        $data =  "Thanka for your Feedback";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    
    
}
