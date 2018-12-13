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

class SoldController extends Controller
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
     public function showSoldProducts()
     {	
         
        $products = DB::table('categories as c')
            ->select("c.id","c.category_name","c.category_image",
            "p.id as product_id","p.product_name","p.product_code","p.slug","p.category_id","p.description","p.carat","p.kt","p.weight","p.status")
            ->join('products as p', 'p.category_id', '=', 'c.id')
            ->where('p.status', '=','0')
            ->orderBy('p.id', 'Asc')
            ->get();

        $categorys = array();
        foreach($products as $key=>$product){
            $data = array(); 
            $data['id'] = $product->id;
            $data['category_name'] = $product->category_name;
            $data['product_name'] = $product->product_name;
            $data['description'] = $product->description;
            $data['product_image'] = $product->category_image;

            $categorys[$product->category_name] = array();
            array_push($categorys[$product->category_name],$data);
        }

        /* echo "<pre>";
        print_r($categorys);
        exit; */

        return view('Sold.showSoldProducts',compact('categorys')); 
         
     }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showSoldProductCategory($id)
     {	
        
        $products = DB::table('categories as c')
            ->select("c.category_name","p.id","p.product_name","p.product_code","p.slug","p.category_id","p.product_ios_img_small","p.description","p.carat","p.kt","p.weight","p.status")
            ->leftjoin('products as p', 'p.category_id', '=', 'c.id')
            ->orderBy('p.created_at', 'desc')
            ->where('p.category_id', '=',$id)
            ->where('p.status', '=',0)	
            //->whereNull('d.deleted_at')
            //->get();
            ->paginate($this->perPage);
       // echo "<pre>";
	   // print_r($products); exit;

        return view('Sold.showSoldProductCategory',compact('products')); 
         
     }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showSoldProductDetails($id,$name)
     {	
          $product = Product::orderBy('id', 'desc')
                      ->where('id', '=',$id)
                      ->where('slug', '=',$name)
                      ->first();

        return view('Sold.showSoldProductDetails',compact('product')); 
     }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getSoldout(Request $request){
        
        if($request->ajax()) {
			$input = $request->all();
			$productId = $input['product_id'];
			$status = $input['status'];
            $statusVal = (($status == 1) ? 0 : 1);
            $data = (($status == 1) ? 'sold-product' :  'sold-out');

            $UpdateDetails = Product::where('id', '=',  $productId)->first();
            $UpdateDetails->status = $statusVal;
            $UpdateDetails->save();
            
            $return = array('status'=>'success', 'msg'=> $data); 
            
           /* echo "<pre>";
            print_r($return);
            exit; */ 

			return json_encode($return);
        }
	}
}

