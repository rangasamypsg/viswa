<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherRegister extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "voucher_registers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'firstname','lastname','email','mobile_number','check_in','gender','address','country','zipcode','voucher','voucher_count','redeem_count'
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getFullNameAttribute()
    {
        return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
    }
    
}
