<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpoCustomer extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "expo_customers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'customer_name', 'mobile_number','comments','status',
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // validate
    // read more on validation at http://laravel.com/docs/validation
    public static $expoCustomerRules = [
        'mobile_number' => 'required|unique:expo_customers',
        'email_id' => 'required|string|email|max:255|unique:expo_customers',
    ];

}
