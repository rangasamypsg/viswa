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
use App\Question;
use App\Option;
use App\Answer;
use Config;
use Auth;
use DB;

class StaffQuestionController extends Controller
{

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
        $StaffQuestions = DB::table('staff_questions as q')
                    ->select("q.id","q.text","q.created_at","q.updated_at")
                    ->orderBy('q.id', 'Asc')
                    ->get();    

        return view('StaffQuestion.index',compact('StaffQuestions')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('StaffQuestion.create');
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
            
            $staffQuestion = new StaffQuestion();
            $staffQuestion->text = $input['text'];
            $staffQuestion->save();            
             
            if( !empty($input['option']) ){
                foreach($input['option'] as $key=>$value) {
                    
                    if(empty($value)){
                        unset($input['option']);
                    } else {
                        $StaffOption = new StaffOption();
                        $StaffOption->question_id = $staffQuestion->id;
                        $StaffOption->option = $value;
                        $StaffOption->save();
                    }
                }
            }
            
			return redirect()->route('StaffQuestion.index')
                        ->with('success','Staff Questions created successfully');		
		 } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaffQuestion  $staffQuestion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff_questions = DB::table('staff_questions')
                    ->where('id','=', $id)
                    ->orderBy('id', 'desc')
                    ->first(); 

        return view('StaffQuestion.show',compact('staff_questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffQuestion  $staffQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffQuestion $staffQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffQuestion  $staffQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffQuestion $staffQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffQuestion  $staffQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $options = DB::table('staff_options')
                    ->where('question_id','=', $id)
                    ->get();                              
        if(!empty($options)){
            $options = DB::table('staff_options')
                        ->where('question_id','=', $id)
                        ->delete();
        }
        $question = StaffQuestion::find($id);
        $question->delete();
        return redirect()->route('StaffQuestion.index')
                        ->with('success','Staff Question deleted successfully');
    }
}
