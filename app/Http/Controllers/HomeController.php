<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use Config;
use Auth;
use DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categorys = Category::orderBy('category_name','ASC')->count();
		$products = Product::orderBy('product_name','ASC')->count();
		$solds = Product::where('status','=', 0)->orderBy('product_name','ASC')->count();
		
        return view('home',compact('categorys','products','solds'));
    }
}
