<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests;
use App\Staff;
use App\City;
use Config;
use Auth;
use DB;

class StaffController extends Controller
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
        $staffs = DB::table('staffs as s')
                  ->select("s.id","c.city_name","s.staff_name","s.profile_image","s.position","s.staff_id","s.city_id","s.created_at","s.updated_at")
                  ->join('cities as c', 's.city_id', '=', 'c.id')
                  ->orderBy('s.id', 'DESC')
                  ->get();          

        return view('Staff.index',compact('staffs')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cities = City::get()->pluck('city_name', 'id')->prepend(trans('Select City'), '');
        return view('Staff.create', compact('cities'));
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
            'staff_name' => 'required',
            'position' => 'required',
            'staff_id' => 'required|unique:staffs',
            'city_id' => 'required',
            'profile_image' =>  'required|image|mimes:jpeg,jpg,png',
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
            
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $input['profile_image'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/staff_images');
                $image->move($destinationPath, $input['profile_image']);
            }

            $staff = new Staff();
            $staff->staff_name = $input['staff_name'];
            $staff->position = $input['position'];
            $staff->staff_id = $input['staff_id'];
            $staff->city_id = $input['city_id'];
            if ($request->hasFile('profile_image')) {
                $staff->profile_image = (($input['profile_image']) ? $input['profile_image'] : '');
            }
  			$staff->save();
				
			return redirect()->route('Staff.index')
                        ->with('success','Staff created successfully');	
            
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
        $staff = Staff::find($id);
        return view('Staff.show',compact('staff')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cities = City::get()->pluck('city_name', 'id')->prepend(trans('Select City'), '');
        $staff = Staff::find($id);
        return view('Staff.edit',compact('staff','cities'));  
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
            'staff_name' => 'required',
            'position' => 'required',
            'staff_id' => 'required|unique:staffs,staff_name,'.$id,
            'city_id' => 'required',
            'profile_image' =>  'sometimes|required|image|mimes:jpeg,jpg,png',             
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
            
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $input['profile_image'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/staff_images');
                $image->move($destinationPath, $input['profile_image']);
            }

            $staff = Staff::find($id);
            $staff->staff_name = $input['staff_name'];
            $staff->position = $input['position'];
            $staff->staff_id = $input['staff_id'];
            $staff->city_id = $input['city_id'];
            if ($request->hasFile('profile_image')) {
                $staff->profile_image = (($input['profile_image']) ? $input['profile_image'] : '');
            }
  			$staff->save();
				
			return redirect()->route('Staff.index')
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
        $staff = Staff::find($id);
        
        if($staff->profile_image){
			$FileName = public_path() .'/images/staff_images/';
			chmod($FileName, 0755);
            unlink(public_path() .'/images/staff_images/'. $staff->profile_image); 
        }
        $staff->delete();

        return redirect()->route('Staff.index')
                        ->with('success','Record deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffList()
    {
        $staffs = DB::table('staff_ratings as s')
                    ->select("s.id","s.customer_name","s.mobile_number","s.staff_name","s.city_id","s.ratings","s.created_at","s.updated_at")
                    ->orderBy('s.id', 'DESC')
                    ->get();    

        return view('Staff.list',compact('staffs')); 
    }

    public function expoCustomerList()
    {
        $expoCustomers = DB::table('expo_customers as s')
                    ->select("s.id","s.customer_name","s.mobile_number","s.comments","s.know_about","s.status")
                    ->orderBy('s.id', 'DESC')
                    ->get();    

        /* echo "<pre>";
        print_r($expoCustomers); exit; */

        return view('Staff.expo_customer_list',compact('expoCustomers')); 
    }


}
