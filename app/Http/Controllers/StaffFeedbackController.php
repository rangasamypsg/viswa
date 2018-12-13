<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests;
use App\StaffQuestion;
use App\StaffOption;
use App\StaffAnswer;
use Config;
use Auth;
use DB;

class StaffFeedbackController extends Controller
{
    public $perPage = 10;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = DB::table('vendors as v')
                    ->select("v.id","v.name","v.mobile_number","v.email","v.city_id","v.state","a.created_at")
                    ->join('staff_answers as a', 'v.mobile_number', '=', 'a.mobile_number')
                    ->orderBy('a.created_at', 'Asc')
                    ->groupBy('a.mobile_number')
                    ->get();    

        return view('StaffFeedback.index',compact('feedbacks')); 
    }

    public function show($id)
    {
        /* $feedbacks = DB::table('staff_answers')
                    ->where('mobile_number','=', $id)
                    ->orderBy('id', 'desc')
                    ->groupBy('answer_id')
                    //->get();
                    ->paginate($this->perPage); */ 

        $feedbacks = StaffAnswer::where('mobile_number','=', $id)->groupBy('answer_id')->groupBy('answer_id')->paginate($this->perPage);          

        //dd($feedbacks);          
 
        return view('StaffFeedback.show',compact('feedbacks'));
    }

}
