<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "voucher_histories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'status',
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
