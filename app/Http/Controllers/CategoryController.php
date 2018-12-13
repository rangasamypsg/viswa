<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Product;
use Config;
use Auth;
use DB;


class CategoryController extends Controller
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
    public function index(Request $request)
    {
		$keyword = $request->get('search');
        $perPage = Config::get('settings.pagination.perPage');
        if (!empty($keyword)) {
            $categorys = Category::where('category_name', 'LIKE', "%$keyword%")
				->orderBy('id', 'desc')
                ->get();
        } else {
             $categorys = DB::table('categories')
                           ->orderBy('id', 'desc')
                           ->get(); 
        }
        return view('Category.index',compact('categorys')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
	
        $input = $request->all();
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'category_name' => 'required|unique:categories',
            'category_image' =>  'required|image|mimes:jpeg,jpg,png|dimensions:width=250,height=250',
			'description' => 'required',
			//'status' => 'required',			
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
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $input['category_image'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/category');
                $image->move($destinationPath, $input['category_image']);
            }
			$category = new Category();
            $category->category_name = $input['category_name'];
            if ($request->hasFile('category_image')) {
                $category->category_image = (($input['category_image']) ? $input['category_image'] : '');
            }
            $category->description = $input['description'];
			$category->status = $input['status'];
			$category->save();
				
			return redirect()->route('Category.index')
                        ->with('success','Category created successfully');		
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
        $category = Category::find($id);
        return view('Category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$category = Category::find($id);
        return view('Category.edit',compact('category'));        
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
        $input = $request->all();
	 
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'category_name' => 'required|unique:categories,category_name,'.$id,
            'category_image' =>  'sometimes|required|image|mimes:jpeg,jpg,png|dimensions:width=250,height=250',
			'description' => 'required',
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
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $input['category_image'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/category');
                $image->move($destinationPath, $input['category_image']);
            }
			$category = Category::find($id);
            $category->category_name = $input['category_name'];
            if ($request->hasFile('category_image')) {
                $category->category_image = $input['category_image'];
            }
            $category->description = $input['description'];
			$category->status = $input['status'];
            $category->save();
				
			return redirect()->route('Category.index')
                        ->with('success','Record updated successfully');	
		 }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        
        if($category->category_image){
			$FileName = public_path() .'/images/category/';
			chmod($FileName, 0755);
            unlink(public_path() .'/images/category/'. $category->category_image); 
        }
        $category->delete();
        return redirect()->route('Category.index')
                        ->with('success','Record deleted successfully');
    }
    
}
