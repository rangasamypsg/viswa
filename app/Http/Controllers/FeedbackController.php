<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests;
use App\Question;
use App\Option;
use App\Answer;
use Config;
use Auth;
use DB;

class FeedbackController extends Controller
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
                    ->join('answers as a', 'v.mobile_number', '=', 'a.mobile_number')
                    ->orderBy('a.created_at', 'Asc')
                    ->groupBy('a.mobile_number')
                    ->get();    

        return view('Feedback.index',compact('feedbacks')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
       
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'text' => 'required',
        );
		
         // run the validation rules on the inputs from the form
         $validator = Validator::make($input, $rules);
         // if the validator fails, redirect back to the form
         if ($validator->fails()) {
		  
             // If validation falis redirect back to login.
              return redirect()->back()
                              ->withInput()
                              ->with('errors',$validator->errors()); 
			 
         } else {
            
            $question = new Question();
            $question->text = $input['text'];
            $question->save();            
             
            if( !empty($input['option']) ){
                foreach($input['option'] as $key=>$value) {
                    
                    if(empty($value)){
                        unset($input['option']);
                    } else {
                        $option = new Option();
                        $option->question_id = $question->id;
                        $option->option = $value;
                        $option->save();
                    }
                }
            }
            
			return redirect()->route('Feedback.index')
                        ->with('success','Questions created successfully');		
		 }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* $feedbacks = DB::table('answers')
                    ->where('mobile_number','=', $id)
                    ->orderBy('id', 'desc')
                    ->groupBy('answer_id')
                    ->get(); */
        
        $feedbacks = Answer::where('mobile_number','=', $id)->groupBy('answer_id')->groupBy('answer_id')->paginate($this->perPage);            
        //dd($feedbacks);

        return view('Feedback.show',compact('feedbacks'));
    }

    public function feedbackList()
    {
        $feedbackRatings = DB::table('feedback_ratings as f')
                    ->select("f.id","f.customer_name","f.mobile_number","f.staff_name","f.city_id","f.ratings","f.created_at","f.updated_at")
                    ->orderBy('f.id', 'DESC')
                    ->get();    

        return view('Feedback.list',compact('feedbackRatings')); 
    }
}
