<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "questions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'text','opt1','opt2','opt3','opt4','opt5'
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
