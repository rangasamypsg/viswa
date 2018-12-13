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

class QuestionController extends Controller
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
        $questions = DB::table('questions as q')
                    ->select("q.id","q.text","q.created_at","q.updated_at")
                    ->orderBy('q.id', 'Asc')
                    ->get();    

        return view('Question.index',compact('questions')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Question.create');
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
            
			return redirect()->route('Question.index')
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
        $questions = DB::table('questions')
                    ->where('id','=', $id)
                    ->orderBy('id', 'desc')
                    ->first(); 


        /* echo "<pre>";
        print_r($questions);           
        exit; */

        return view('Question.show',compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $options = DB::table('options')
                    ->where('question_id','=', $id)
                    ->get();                              
        if(!empty($options)){
            $options = DB::table('options')
                        ->where('question_id','=', $id)
                        ->delete();
        }
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('Question.index')
                        ->with('success','Question deleted successfully');
    }
}
