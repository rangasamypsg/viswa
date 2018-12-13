<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use App\Mail\Welcome;

Route::get('/', function () {

    /* Mail::to('ranga@thegang.in')->send(new \App\Mail\Welcome);
 
    return view('emails.welcome'); */

    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Category resource 	
Route::get('categorys', ['as' => 'Category.index' , 'uses' => 'CategoryController@index']);
Route::get('category/create', ['as' => 'Category.create' , 'uses' => 'CategoryController@create']);
Route::post('category/store', ['as' => 'Category.store' , 'uses' => 'CategoryController@store']);
Route::get('category/show/{id}', ['as' => 'Category.show' , 'uses' => 'CategoryController@show']);
Route::get('category/{id}/edit', ['as' => 'Category.edit' , 'uses' => 'CategoryController@edit']);
Route::PATCH('category/update/{id}', ['as' => 'Category.update' , 'uses' => 'CategoryController@update']);
Route::delete('category/destroy/{id}', ['as' => 'Category.destroy' , 'uses' => 'CategoryController@destroy']); 

//Product resource 	
Route::get('products', ['as' => 'Product.index' , 'uses' => 'ProductController@index']);
Route::get('product/create', ['as' => 'Product.create' , 'uses' => 'ProductController@create']);
Route::post('product/store', ['as' => 'Product.store' , 'uses' => 'ProductController@store']);
Route::get('product/show/{id}', ['as' => 'Product.show' , 'uses' => 'ProductController@show']);
Route::get('product/{id}/edit', ['as' => 'Product.edit' , 'uses' => 'ProductController@edit']);
Route::PATCH('product/update/{id}', ['as' => 'Product.update' , 'uses' => 'ProductController@update']);
Route::delete('product/destroy/{id}', ['as' => 'Product.destroy' , 'uses' => 'ProductController@destroy']);

//Product resource 	
Route::get('product_categorys', ['as' => 'Product.categorys' , 'uses' => 'ProductController@showProducts']);
Route::get('product_category/{id}', ['as' => 'Product.category' , 'uses' => 'ProductController@showProductCategory']);
Route::get('product_show/{id}/{name}', ['as' => 'Product.detail' , 'uses' => 'ProductController@showProductDetails']);

//Product Categories
Route::post('product/soldout', ['as' => 'Product.soldout', 'uses' => 'ProductController@getProductSoldout']);
Route::get('categories', ['as' => 'Api.Categories' , 'uses' => 'ApiController@categories']);    

//Sold Product Categories
Route::get('sold_categorys', ['as' => 'Sold.categorys' , 'uses' => 'SoldController@showSoldProducts']);
Route::get('sold_category/{id}', ['as' => 'Sold.category' , 'uses' => 'SoldController@showSoldProductCategory']);
Route::get('sold_show/{id}/{name}', ['as' => 'Sold.detail' , 'uses' => 'SoldController@showSoldProductDetails']);
Route::post('sold/soldout', ['as' => 'Sold.soldout', 'uses' => 'SoldController@getSoldout']);

//Vendor resource 	
Route::get('vendors', ['as' => 'Vendor.index' , 'uses' => 'VendorController@index']);
Route::get('vendor/create', ['as' => 'Vendor.create' , 'uses' => 'VendorController@create']);
Route::post('vendor/store', ['as' => 'Vendor.store' , 'uses' => 'VendorController@store']);
Route::get('vendor/show/{id}', ['as' => 'Vendor.show' , 'uses' => 'VendorController@show']);
Route::get('vendor/{id}/edit', ['as' => 'Vendor.edit' , 'uses' => 'VendorController@edit']);
Route::PATCH('vendor/update/{id}', ['as' => 'Vendor.update' , 'uses' => 'VendorController@update']);
Route::delete('vendor/destroy/{id}', ['as' => 'Vendor.destroy' , 'uses' => 'VendorController@destroy']);

//Sale resource 	
Route::get('sales', ['as' => 'Sale.index' , 'uses' => 'SaleController@index']);
Route::get('sale/create', ['as' => 'Sale.create' , 'uses' => 'SaleController@create']);
Route::post('sale/store', ['as' => 'Sale.store' , 'uses' => 'SaleController@store']);
Route::get('sale/show/{id}', ['as' => 'Sale.show' , 'uses' => 'SaleController@show']);
Route::get('sale/{id}/edit', ['as' => 'Sale.edit' , 'uses' => 'SaleController@edit']);
Route::PATCH('sale/update/{id}', ['as' => 'Sale.update' , 'uses' => 'SaleController@update']);
Route::delete('sale/destroy/{id}', ['as' => 'Sale.destroy' , 'uses' => 'SaleController@destroy']);

//SMS resource
Route::get('sms/create', ['as' => 'Sms.create' , 'uses' => 'SmsController@create']);
Route::post('sms/store', ['as' => 'Sms.store' , 'uses' => 'SmsController@store']);
Route::post('sms/city', ['as' => 'Sms.city' , 'uses' => 'SmsController@getCity']);

//Feedback resource 	
Route::get('feedbacks', ['as' => 'Feedback.index' , 'uses' => 'FeedbackController@index']);
Route::get('feedback/create', ['as' => 'Feedback.create' , 'uses' => 'FeedbackController@create']);
Route::post('feedback/store', ['as' => 'Feedback.store' , 'uses' => 'FeedbackController@store']);
Route::get('feedback/show/{id}', ['as' => 'Feedback.show' , 'uses' => 'FeedbackController@show']);
Route::get('feedback/{id}/edit', ['as' => 'Feedback.edit' , 'uses' => 'FeedbackController@edit']);
Route::PATCH('feedback/update/{id}', ['as' => 'Feedback.update' , 'uses' => 'FeedbackController@update']);
Route::delete('feedback/destroy/{id}', ['as' => 'Feedback.destroy' , 'uses' => 'FeedbackController@destroy']);

//Question resource 	
Route::get('questions', ['as' => 'Question.index' , 'uses' => 'QuestionController@index']);
Route::get('question/create', ['as' => 'Question.create' , 'uses' => 'QuestionController@create']);
Route::post('question/store', ['as' => 'Question.store' , 'uses' => 'QuestionController@store']);
Route::get('question/show/{id}', ['as' => 'Question.show' , 'uses' => 'QuestionController@show']);
Route::get('question/{id}/edit', ['as' => 'Question.edit' , 'uses' => 'QuestionController@edit']);
Route::PATCH('question/update/{id}', ['as' => 'Question.update' , 'uses' => 'QuestionController@update']);
Route::delete('question/destroy/{id}', ['as' => 'Question.destroy' , 'uses' => 'QuestionController@destroy']);

//Staff Question resource 	
Route::get('staff_questions', ['as' => 'StaffQuestion.index' , 'uses' => 'StaffQuestionController@index']);
Route::get('staff_question/create', ['as' => 'StaffQuestion.create' , 'uses' => 'StaffQuestionController@create']);
Route::post('staff_question/store', ['as' => 'StaffQuestion.store' , 'uses' => 'StaffQuestionController@store']);
Route::get('staff_question/show/{id}', ['as' => 'StaffQuestion.show' , 'uses' => 'StaffQuestionController@show']);
Route::get('staff_question/{id}/edit', ['as' => 'StaffQuestion.edit' , 'uses' => 'StaffQuestionController@edit']);
Route::PATCH('staff_question/update/{id}', ['as' => 'StaffQuestion.update' , 'uses' => 'StaffQuestionController@update']);
Route::delete('staff_question/destroy/{id}', ['as' => 'StaffQuestion.destroy' , 'uses' => 'StaffQuestionController@destroy']);

//Staff Feedback resource 	
Route::get('staff_feedbacks', ['as' => 'StaffFeedback.index' , 'uses' => 'StaffFeedbackController@index']);
Route::get('staff_feedback/show/{id}', ['as' => 'StaffFeedback.show' , 'uses' => 'StaffFeedbackController@show']);

Route::get('voucher_list', ['as' => 'Voucher.index' , 'uses' => 'VoucherRegisterController@index']);
Route::get('voucher_user', ['as' => 'Voucher.voucherUser' , 'uses' => 'VoucherRegisterController@voucherUser']);
Route::get('voucher_redeem_list', ['as' => 'Voucher.voucherRedeemList' , 'uses' => 'VoucherRegisterController@voucherRedeemList']);
Route::post('redeemed_voucher', ['as' => 'Voucher.redeem_voucher' , 'uses' => 'VoucherRegisterController@redeem_voucher']);
Route::get('/voucher_redeem/{id}', 'VoucherRegisterController@voucher_redeem')->name('voucher_redeem');
 

//Staff resource 	
Route::get('staffs', ['as' => 'Staff.index' , 'uses' => 'StaffController@index']);
Route::get('staff/create', ['as' => 'Staff.create' , 'uses' => 'StaffController@create']);
Route::post('staff/store', ['as' => 'Staff.store' , 'uses' => 'StaffController@store']);
Route::get('staff/show/{id}', ['as' => 'Staff.show' , 'uses' => 'StaffController@show']);
Route::get('staff/{id}/edit', ['as' => 'Staff.edit' , 'uses' => 'StaffController@edit']);
Route::PATCH('staff/update/{id}', ['as' => 'Staff.update' , 'uses' => 'StaffController@update']);
Route::delete('staff/destroy/{id}', ['as' => 'Staff.destroy' , 'uses' => 'StaffController@destroy']); 

Route::get('staff_lists', ['as' => 'Staff.list' , 'uses' => 'StaffController@staffList']);
Route::get('feed_back_lists', ['as' => 'Feedback.list' , 'uses' => 'FeedbackController@feedbackList']);

//Route::delete('staff/destroy/{id}', ['as' => 'Staff.destroy' , 'uses' => 'StaffController@destroy']);

// Route for view/blade file.
Route::get('importExport', ['as' => 'Product.import' , 'uses' => 'ProductController@importExport']); 
// Route for export/download tabledata to .csv, .xls or .xlsx 
Route::get('downloadExcel/{type}', ['as' => 'Product.download' , 'uses' => 'ProductController@downloadExcel']);
// Route for import excel data to database.
Route::post('importExcel', ['as' => 'Product.importExcel' , 'uses' => 'ProductController@importExcel']);

Route::get('expo_customer_list', ['as' => 'Api.ExpoCustomerList' , 'uses' => 'StaffController@expoCustomerList']);


//API Service
Route::group(['middleware' => ['web','XSS']], function () {

    Route::post('registration', ['as' => 'Api.Registration' , 'uses' => 'ApiController@registration']);
    Route::post('user_login', ['as' => 'Api.doLogin' , 'uses' => 'ApiController@doLogin']);
    Route::get('product-categories', ['as' => 'Api.productCategories' , 'uses' => 'ApiController@productCategories']);

    Route::get('category', ['as' => 'Api.procategories' , 'uses' => 'ApiController@Category']);
    Route::post('category_products', ['as' => 'Api.categoryProducts' , 'uses' => 'ApiController@categoryProducts']);

    Route::post('update_password', ['as' => 'Api.updatePassword' , 'uses' => 'ApiController@updatePassword']);
    Route::post('user_registration', ['as' => 'Api.UserRegistration' , 'uses' => 'ApiController@userRegistration']);
    
    //Customer login
    Route::post('customer_mobile_login', ['as' => 'Api.doMobileLogin' , 'uses' => 'ApiController@doMobileLogin']);
    //Customer Registration
    Route::post('vendor_registration', ['as' => 'Api.VendorRegistration' , 'uses' => 'ApiController@VendorRegistration']);
    
    //Customer Feedback
    Route::get('experience_feedbacks', ['as' => 'Api.Feedback' , 'uses' => 'ApiController@getFeedback']);
    Route::post('experience_feedback', ['as' => 'Api.CusFeedback' , 'uses' => 'ApiController@experienceFeedback']);

    //Staff Feedback
    Route::get('customer_feedbacks', ['as' => 'Api.StaffFeedback' , 'uses' => 'ApiController@getCustomerFeedbacks']);
    Route::post('customer_feedback', ['as' => 'Api.StaffCusFeedback' , 'uses' => 'ApiController@customerFeedback']);

    //get cities
    Route::get('get_cities', ['as' => 'Api.city' , 'uses' => 'ApiController@getCityNames']);
    Route::post('place_staff_list', ['as' => 'Api.selectStaff' , 'uses' => 'ApiController@getSelectedStaff']);
    Route::post('expo_customer', ['as' => 'Api.ExpoCustomer' , 'uses' => 'ApiController@expoCustomer']);
    Route::get('expo_customer_list', ['as' => 'Staff.ExpoCustomerList' , 'uses' => 'StaffController@expoCustomerList']);
});

Route::get('posts', ['as' => 'posts.index' , 'uses' => 'ApiController@index']);
Route::group(['prefix'=>'api','middleware'=>'auth:api'], function(){
    
    //Route::get('posts', ['as' => 'posts.index' , 'uses' => 'ApiController@index']);
   
});