<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "voucher_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
}
