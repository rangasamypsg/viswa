<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
     public $table = "vendors";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name','address','city','state','email','dob'
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // validate
    // read more on validation at http://laravel.com/docs/validation
    public static $regisVendorRules = [
        'mobile_number' => 'required|unique:vendors',
        'email' => 'required|string|email|max:255|unique:vendors',
    ];

    public static function saveVendors( $data ){
       
        $vendor = new Vendor();
        $vendor->name = $data["name"];
        $vendor->mobile_number = $data["mobile_number"];
        $vendor->address = $data["address"];
        $vendor->city_id = $data["city_id"];
        $vendor->state = $data["state"];
        $vendor->email = $data["email"];
        $vendor->dob = date("Y-m-d", strtotime($data["dob"]));
        $vendor->wedding = ( isset( $data['wedding'] ) && !empty( $data['wedding'] ) ? date("Y-m-d", strtotime($data["wedding"])) : '');
       /*  $vendor->ring = ( isset( $data['ring'] ) && !empty( $data['ring'] ) ? $data['ring'] : '' );
        $vendor->bracelet = ( isset( $data['bracelet'] ) && !empty( $data['bracelet'] ) ? $data['bracelet'] : '' );
        $vendor->chain = ( isset( $data['chain'] ) && !empty( $data['chain'] ) ? $data['chain'] : '' ); */
        $vendor->save();

        return ( isset($vendor->id) && !empty($vendor->id) ? $vendor->id : '' );
    }

    public static function checkMobileNoExists($mobileNo) {
        
        $data = Vendor::where("mobile_number", '=', $mobileNo)->first();
 
        return ( isset($data->mobile_number) && !empty($data->mobile_number) ? $data->mobile_number : '' );
    }
     
}
