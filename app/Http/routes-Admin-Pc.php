<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

*/




// Admin panel 

Route::group(['middleware'=>['web','admin']] , function(){

Route::get('/adminpanel/products/print','ProductController@printPreview');
Route::get('/adminpanel/products','ProductController@index');
Route::get('/adminpanel/products/getProduct','ProductController@getProduct');
Route::get('/adminpanel/products/getProductInfo','ProductController@get_product_info_by_search');
Route::get('/adminpanel/products/getproductinfosearch','ProductController@getproductinfosearch');


Route::get('/adminpanel/employees/print','EmployeeController@printPreview');
Route::get('/adminpanel/customers/printDebt/{id}','CustomerController@printDebtPreview');
Route::get('/adminpanel/employees/printDebt/{id}','EmployeeController@printDebtPreview');
Route::get('/adminpanel/providers/printDebt/{id}','ProviderController@printDebtPreview');

Route::get('/adminpanel/backup',function(){ return view('admin.backup') ; });
Route::get('/welcome','welcomeController@index');
Route::get('/adminpanel','AdminController@index');
Route::post('/adminpanel/users/changePassword','UsersController@UpdatePassword');
Route::resource('/adminpanel/users','UsersController');
Route::resource('/adminpanel/employees','EmployeeController');
Route::resource('/adminpanel/careers','CareerController');
Route::resource('/adminpanel/customers','CustomerController');
Route::resource('/adminpanel/providers','ProviderController');
Route::resource('/adminpanel/products','ProductController');
Route::resource('/adminpanel/categories','CategoryController');
Route::resource('/adminpanel/opens','OpenController');
Route::resource('/adminpanel/catchDocuments','CatchDocumentController');
Route::resource('/adminpanel/cars','CarsController');

Route::get('/adminpanel/accounts/sandCreate','AccountController@sandCreate');
Route::post('/adminpanel/accounts/sand','AccountController@sand');
Route::get('/adminpanel/accounts/win','AccountController@winAndLose');
Route::get('/adminpanel/accounts/showCash','AccountController@showCash');

Route::resource('/adminpanel/accounts','AccountController');
Route::resource('/adminpanel/ordersells','OrderController');
Route::resource('/adminpanel/ordersells/product','AddProductController');
Route::resource('/adminpanel/incomes','IncomesController');




Route::get('/adminpanel/employees/{id}/delete','EmployeeController@destroy') ;
Route::get('/adminpanel/careers/{id}/delete','CareerController@destroy');
Route::get('/adminpanel/customers/{id}/delete','CustomerController@destroy');
Route::get('/adminpanel/providers/{id}/delete','ProviderController@destroy');
Route::get('/adminpanel/products/{id}/delete','ProductController@destroy');
Route::get('/adminpanel/categories/{id}/delete','CategoryController@destroy');
Route::get('/adminpanel/products/{id}/delete','AddProductController@destroy');
Route::get('/adminpanel/inv/form','InvoiceController@form');
Route::post('/adminpanel/inv/save','InvoiceController@save');
Route::get('/adminpanel/inv/reform','InvoiceController@reform');
Route::post('/adminpanel/inv/resave','InvoiceController@resave');
Route::get('/adminpanel/inv/formbuy','InvoiceController@formbuy');
Route::post('/adminpanel/inv/savebuy','InvoiceController@savebuy');
Route::get('/adminpanel/inv/orderbuy','InvoiceController@orderbuy');
Route::post('/adminpanel/inv/saveorderbuy','InvoiceController@saveorderbuy');
Route::get('/adminpanel/inv/reformbuy','InvoiceController@reformbuy');
Route::post('/adminpanel/inv/resavebuy','InvoiceController@resavebuy');
Route::get('/adminpanel/inv/formOut','InvoiceController@formOut');
Route::post('/adminpanel/inv/saveOut','InvoiceController@saveOut');
Route::get('/adminpanel/inv/{id}','InvoiceController@show');
Route::get('/adminpanel/invsell/{id}','InvoiceController@showbuy');
Route::get('/adminpanel/inv/','InvoiceController@index');
Route::get('/adminpanel/invsell','InvoiceController@index2');
Route::get('/adminpanel/inv/{id}/delete','InvoiceController@destroy');
});




Route::group(['middleware'=>['web','seller']] , function(){

//get//
			//sell
Route::get('/seller/inv/form','InvoiceSellerController@form');
Route::post('/seller/inv/save','InvoiceSellerController@save');

 		    //resell
Route::get('/seller/inv/reform','InvoiceSellerController@reform');
Route::post('/seller/inv/resave','InvoiceSellerController@resave');
           //print bill
Route::get('/seller/inv/','InvoiceSellerController@index');
Route::get('/seller/inv/{id}','InvoiceSellerController@show');

//resource
Route::resource('/seller/cars','CarsSellerController');
Route::resource('/seller/customers','CustomerSellerController');

//invsell
Route::get('/seller/invsell','InvoiceSellerController@index2');
Route::get('/seller/invsell/{id}','InvoiceSellerController@showbuy');

});

//seller Out

Route::group(['middleware'=>['web','sellerOut']] , function(){

//get//
			//sell
Route::get('/sellerout/inv/form','InvoiceSellerOutController@form');
Route::post('/sellerout/inv/save','InvoiceSellerOutController@save');

 		    //resell
Route::get('/sellerout/inv/reform','InvoiceSellerOutController@reform');
Route::post('/sellerout/inv/resave','InvoiceSellerOutController@resave');
           //print bill
Route::get('/sellerout/inv/','InvoiceSellerOutController@index');
Route::get('/sellerout/inv/{id}','InvoiceSellerOutController@show');
//invsell
Route::get('/sellerout/invsell','InvoiceSellerOutController@index2');
Route::get('/sellerout/invsell/{id}','InvoiceSellerOutController@showbuy');


//resource
Route::resource('/sellerout/customers','CustomerSellerOutController');

});

//Store

Route::group(['middleware'=>['web','store']] , function(){

//get//

Route::get('/store/products/print','ProductStoreController@printPreview');

//Resource
Route::resource('/store/products','ProductStoreController');
Route::resource('/store/categories','CategoryStoreController');

});

Route::group(['middleware'=>['web','accountant']] , function(){




Route::get('/accountant/products/print','ProductAccountantController@printPreview');
Route::get('/accountant/employees/print','EmployeeAccountantController@printPreview');
Route::get('/accountant/employees/printDebt/{id}','EmployeeAccountantController@printDebtPreview');
Route::get('/accountant/customers/printDebt/{id}','CustomerAccountantController@printDebtPreview');
Route::get('/accountant/providers/printDebt/{id}','ProviderAccountantController@printDebtPreview');


Route::get('/accountant/backup',function(){ return view('accountant.backup') ; });
Route::get('/welcome','welcomeController@index');
Route::resource('/accountant/employees','EmployeeAccountantController');
Route::resource('/accountant/careers','CareerAccountantController');
Route::resource('/accountant/customers','CustomerAccountantController');
Route::resource('/accountant/providers','ProviderAccountantController');
Route::resource('/accountant/products','ProductAccountantController');
Route::resource('/accountant/categories','CategoryAccountantController');
Route::resource('/accountant/opens','OpenAccountantController');
Route::resource('/accountant/catchDocuments','CatchDocumentAccountantController');
Route::resource('/accountant/cars','CarsAccountantController');



Route::get('/accountant/accounts/win','AccountAccountantController@winAndLose');
Route::get('/accountant/accounts/showCash','AccountAccountantController@showCash');

Route::resource('/accountant/accounts','AccountAccountantController');
Route::get('/accountant/employees/{id}/delete','EmployeeAccountantController@destroy') ;
Route::get('/accountant/careers/{id}/delete','CareerAccountantController@destroy');
Route::get('/accountant/customers/{id}/delete','CustomerAccountantController@destroy');
Route::get('/accountant/providers/{id}/delete','ProviderAccountantController@destroy');
Route::get('/accountant/products/{id}/delete','ProductAccountantController@destroy');
Route::get('/accountant/categories/{id}/delete','CategoryAccountantController@destroy');


Route::get('/accountant/inv/form','InvoiceAccountantController@form');
Route::post('/accountant/inv/save','InvoiceAccountantController@save');
Route::get('/accountant/inv/reform','InvoiceAccountantController@reform');
Route::post('/accountant/inv/resave','InvoiceAccountantController@resave');
Route::get('/accountant/inv/formbuy','InvoiceAccountantController@formbuy');
Route::post('/accountant/inv/savebuy','InvoiceAccountantController@savebuy');
Route::get('/accountant/inv/reformbuy','InvoiceAccountantController@reformbuy');
Route::post('/accountant/inv/resavebuy','InvoiceAccountantController@resavebuy');
Route::get('/accountant/inv/formOut','InvoiceAccountantController@formOut');
Route::post('/accountant/inv/saveOut','InvoiceAccountantController@saveOut');
Route::get('/accountant/inv/{id}','InvoiceAccountantController@show');
Route::get('/accountant/inv/','InvoiceAccountantController@index');

Route::get('/accountant/invsell','InvoiceAccountantController@index2');
Route::get('/accountant/invsell/{id}','InvoiceAccountantController@showbuy');


});


Route::auth();

Route::get('/', function () {
   return view('welcome');
});


Route::get('/welcome','welcomeController@index');

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');




