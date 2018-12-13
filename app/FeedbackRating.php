<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackRating extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "feedback_ratings";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'staff_name','ratings'
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
