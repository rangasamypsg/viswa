<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffQuestion extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "staff_questions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'id','text', 
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
