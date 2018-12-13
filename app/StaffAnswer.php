<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
use Config;
use Auth;
use DB;

class StaffAnswer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "staff_answers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'answer_id','mobile_number','question_id','answer'
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public static function saveCustomerStaffFeedback( $data ){
        $answerId = Helper::__codeGeneration(Config::get('constant.VISWA.STAFFANSWER'),Config::get('constant.FORMAT-CODE.ANS_CODE'));
        for($i = 1; $i < count($data)-4; $i++){           
           $answer = new StaffAnswer();
           $answer->mobile_number = $data['mobile_number'];
           $answer->answer_id = $answerId;
           $answer->question_id = $i; 
           $answer->answer = ( isset($data["answer$i"]) && !empty($data["answer$i"]) ? $data["answer$i"] : '' );
           $answer->save();
        }
        return ( isset($answerId) && !empty($answerId) ? $answerId : '' );
    }

}
