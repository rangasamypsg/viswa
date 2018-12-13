<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "customers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'password', 'email_id','mobile_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // validate
    // read more on validation at http://laravel.com/docs/validation
    public static $regisCustomerRules = [
     
        'name' => 'required|string|max:255',
        'email_id' => 'required|string|email|max:255|unique:customers',
        'mobile_number' => 'required|unique:customers',
        'password' => 'required|string|min:6',
        
    ];


    public static function saveCustomers( $data ){

        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email_id = $data['email_id'];
        $customer->mobile_number = $data['mobile_number'];
        $customer->password = bcrypt($data['password']);
        $customer->save();

        return ( isset($customer->id) && !empty($customer->id) ? $customer->id : '' );
    }

    public static function checkMobileNoExists($mobileNo) {
        
        $data = Customer::where("mobile_number", '=', $mobileNo)->first();
 
        return $data;
    }

    public static function checkemailIdExists($emailId) {
        
        $data = Customer::where("email_id", '=', $emailId)->first();
 
        return $data;
    }
}
