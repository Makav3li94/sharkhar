<?php

use Illuminate\Support\Facades\Route;

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


Route::get( '/', function () {
	return view( 'home' );
} )->name( 'home' );

Route::post( 'message', function () {
	request()->validate( [
		'name'  => 'required|string',
		'email' => 'required|email',
		'body'  => 'required|string',
	] );
	\App\Models\Contact::create( request()->all() );

	return redirect()->back()->withSuccess( 'پیغام شما ارسال شد.' );
} )->name( 'contact' );

//Auth Pages
Auth::routes();

Route::get( '/resend', [ \App\Http\Controllers\SellersController::class, 'resendCode' ] )->name( 'resend_code' );
Route::post( '/forget/password', [
	\App\Http\Controllers\SellersController::class,
	'forgetPassword'
] )->name( 'forget_password' );
Route::get( '/sharkhar/login', [
	\App\Http\Controllers\Auth\LoginController::class,
	'showAdminLoginForm'
] )->name( 'admin_login' );
Route::get( '/login/buyer', [
	\App\Http\Controllers\Auth\LoginController::class,
	'showBuyerLoginForm'
] )->name( 'login_buyer' );
Route::get( '/link/login/buyer/{token}', [
	\App\Http\Controllers\Auth\LoginController::class,
	'linkLoginBuyer'
] )->name( 'link_login_buyer' );
Route::get( '/send-pass/', [ \App\Http\Controllers\Auth\LoginController::class, 'sendPass' ] )->name( 'send_pass' );
Route::get( '/register/buyer', [
	\App\Http\Controllers\Auth\RegisterController::class,
	'showBuyerRegisterForm'
] )->name( 'register_buyer' );
Route::post( '/sharkhar/login', [
	\App\Http\Controllers\Auth\LoginController::class,
	'adminLogin'
] )->name( 'admin_login' );
Route::post( '/login/buyer', [
	\App\Http\Controllers\Auth\LoginController::class,
	'buyerLogin'
] )->name( 'buyer_login' );
Route::post( '/register/buyer', [ \App\Http\Controllers\Auth\RegisterController::class, 'createBuyer' ] );

//End Auth Pages


//RULES Pages
Route::get( '/sell-benefit', [ \App\Http\Controllers\PagesController::class, 'sellBenefit' ] )->name( 'SellBenefit' );
Route::get( '/seller-protection', [
	\App\Http\Controllers\PagesController::class,
	'sellerProtection'
] )->name( 'sellerProtection' );
Route::get( '/dispute-rules', [
	\App\Http\Controllers\PagesController::class,
	'disputeRules'
] )->name( 'DisputeRules' );
Route::get( '/buy-benefit', [ \App\Http\Controllers\PagesController::class, 'buyBenefit' ] )->name( 'buyBenefit' );
Route::get( '/money-back-guarantee', [
	\App\Http\Controllers\PagesController::class,
	'moneyBackGuarantee'
] )->name( 'moneyBackGuarantee' );
Route::get( '/rules', [ \App\Http\Controllers\PagesController::class, 'rules' ] )->name( 'rules' );
//END RULES

//Site Maps
Route::get( '/sitemap.xml', [ \App\Http\Controllers\SitemapController::class, 'index' ] );
Route::get( '/sitemap/main.xml', [ \App\Http\Controllers\SitemapController::class, 'main' ] );
Route::get( '/sitemap/articles.xml', [ \App\Http\Controllers\SitemapController::class, 'blogs' ] );
Route::get( '/sitemap/categories.xml', [ \App\Http\Controllers\SitemapController::class, 'shopCategories' ] );
//Route::get( '/sitemap/categories.xml', [ \App\Http\Controllers\SitemapController::class, 'blogCategories' ] );
//Route::get( '/sitemap/vendors.xml', [ \App\Http\Controllers\SitemapController::class, 'vendors' ] );
//Route::get( '/sitemap/tags.xml', [ \App\Http\Controllers\SitemapController::class, 'tags' ] );
//Route::get( '/sitemap/products-part-1.xml', [ \App\Http\Controllers\SitemapController::class, 'products1' ] );
//Route::get( '/sitemap/products-part-2.xml', [ \App\Http\Controllers\SitemapController::class, 'products2' ] );
//Route::get( '/sitemap/products-part-3.xml', [ \App\Http\Controllers\SitemapController::class, 'products3' ] );
//Route::get( '/sitemap/products-part-4.xml', [ \App\Http\Controllers\SitemapController::class, 'products4' ] );
//Route::get( '/sitemap/products-part-5.xml', [ \App\Http\Controllers\SitemapController::class, 'products5' ] );
//Route::get( '/sitemap/products-part-6.xml', [ \App\Http\Controllers\SitemapController::class, 'products6' ] );
//Route::get( '/sitemap/products-part-7.xml', [ \App\Http\Controllers\SitemapController::class, 'products7' ] );
//Route::get( '/sitemap/products-part-8.xml', [ \App\Http\Controllers\SitemapController::class, 'products8' ] );
//Route::get('/sitemap.xml/products-part-9', [ \App\Http\Controllers\SitemapController::class, 'products9' ]);
//Route::get('/sitemap.xml/products-part-10', [ \App\Http\Controllers\SitemapController::class, 'products10' ]);

//End Site Maps


//Feeds

Route::get( '/blogs/{event}', 'EventsController@show' )->name( 'events.show' );
Route::get( '/vendors/{event}', 'EventsController@show' )->name( 'events.show' );
Route::get( '/products/{event}', 'EventsController@show' )->name( 'events.show' );
Route::feeds();

//End Feeds


Route::get( 'scrap/', [ \App\Http\Controllers\ScraperController::class, 'scrapInstagram' ] )->name( 'scrap' );

Route::get( '/home', [ App\Http\Controllers\HomeController::class, 'index' ] )->name( 'home' );
Route::view( '/home', 'home' )->middleware( 'auth' );
//Route::get( '/buyer', 	[\App\Http\Controllers\Admin\Buyer\AdminBuyerController::class, 'dashboard'] );
//Route::get( '/admin',   [ \App\Http\Controllers\Admin\Admin\AdminController::class, 'dashboard'] );
//******* ADMIN ********
Route::name( 'admin.' )->prefix( 'admin' )->middleware( 'auth:admin' )->group( function () {
	Route::get( 'dashboard', [
		\App\Http\Controllers\Admin\Admin\AdminController::class,
		'dashboard'
	] )->name( 'dashboard' );
	Route::resource( 'sellers', \App\Http\Controllers\SellersController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'blogs', \App\Http\Controllers\BlogController::class );
	Route::patch( 'sellers.update/{seller}', [
		\App\Http\Controllers\SellersController::class,
		'changePassword'
	] )->name( 'sellers.change_password' );
	Route::resource( 'contacts', \App\Http\Controllers\ContactsController::class );
	Route::resource( 'orders', \App\Http\Controllers\OrdersController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'police', \App\Http\Controllers\PoliceController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'products', \App\Http\Controllers\ProductsController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'transactions', \App\Http\Controllers\TransactionsController::class )->only( [ 'index', ] );;
	Route::get( 'wallet-pay', [ \App\Http\Controllers\WalletPayController::class, 'index' ] )->name( 'wallet_pay' );
	Route::resource( 'feedbacks', \App\Http\Controllers\FeedbacksController::class );
} );


//******* SElLER *******
Route::name( 'seller.' )->prefix( 'seller' )->middleware( 'auth' )->group( function () {
	Route::get( 'dashboard', [
		\App\Http\Controllers\Admin\Seller\AdminSellerController::class,
		'dashboard'
	] )->name( 'dashboard' );
	Route::post( 'verify/{seller}', [
		\App\Http\Controllers\Admin\Seller\AdminSellerController::class,
		'verify'
	] )->name( 'verify' );
	Route::get( 'profile/{seller}', [
		\App\Http\Controllers\Admin\Seller\AdminSellerController::class,
		'profile'
	] )->name( 'profile' );
	Route::patch( 'profile/{seller}', [
		\App\Http\Controllers\Admin\Seller\AdminSellerController::class,
		'changePassword'
	] )->name( 'change_password' );
	Route::patch( 'profile/update/{seller}', [
		\App\Http\Controllers\Admin\Seller\AdminSellerController::class,
		'update'
	] )->name( 'update' );
	Route::resource( 'orders', \App\Http\Controllers\OrdersController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'police', \App\Http\Controllers\PoliceController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'products', \App\Http\Controllers\ProductsController::class )->except( [ 'create', 'show' ] );;
	Route::get( 'products_optional_price', [
		\App\Http\Controllers\ProductsController::class,
		'updateOptionalPrice'
	] )->name( 'optional_price' );
	Route::resource( 'transactions', \App\Http\Controllers\TransactionsController::class )->only( [ 'index' ] );;
	Route::resource( 'wallet', \App\Http\Controllers\WalletController::class )->only( [ 'index', 'store' ] );;
	Route::get( 'wallet-pay', [ \App\Http\Controllers\WalletPayController::class, 'request' ] )->name( 'wallet_pay' );
	Route::resource( 'feedbacks', \App\Http\Controllers\FeedbacksController::class );

	Route::resource( 'contacts', \App\Http\Controllers\ContactsController::class );

	Route::get( 'search', [
		\App\Http\Controllers\Admin\Seller\AdminSellerController::class,
		'search'
	] )->name( 'search' );
} );

//******* Buyer *******
Route::name( 'buyer.' )->prefix( 'buyer' )->middleware( 'auth:buyer' )->group( function () {
	Route::get( 'dashboard', [
		\App\Http\Controllers\Admin\Buyer\AdminBuyerController::class,
		'dashboard'
	] )->name( 'dashboard' );
	Route::get( 'profile/{buyer}', [
		\App\Http\Controllers\Admin\Buyer\AdminBuyerController::class,
		'profile'
	] )->name( 'profile' );
	Route::patch( 'profile/update/{buyer}', [
		\App\Http\Controllers\Admin\Buyer\AdminBuyerController::class,
		'update'
	] )->name( 'update' );
	Route::resource( 'orders', \App\Http\Controllers\OrdersController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'police', \App\Http\Controllers\PoliceController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'products', \App\Http\Controllers\ProductsController::class )->except( [ 'create', 'show' ] );;
	Route::resource( 'transactions', \App\Http\Controllers\TransactionsController::class )->only( [ 'index', ] );;
	Route::resource( 'feedbacks', \App\Http\Controllers\FeedbacksController::class );
	Route::resource( 'contacts', \App\Http\Controllers\ContactsController::class );
	Route::get( 'get_seller_ajax', [
		\App\Http\Controllers\FeedbacksController::class,
		'getSellerAjax'
	] )->name( 'get.seller.ajax' );
} );


Route::get( 'admin', function () {
	\App\Models\Admin::create( [
		'name'     => 'Makaveli',
		'email'    => 'neogood@yahoo.com',
		'mobile'   => '09121989573',
		'password' => \Illuminate\Support\Facades\Hash::make( 'Parham@19171363' ),
	] );
} );
//Route::get('test', [ \App\Http\Controllers\ScraperController::class, 'scrap' ]);

Route::get( 'test', function () {

} );

//Shop Pages

Route::get( '/shops', [ \App\Http\Controllers\ShopController::class, 'shop' ] )->name( 'shop' );
Route::resource( '/news', \App\Http\Controllers\BlogController::class )->except( [ 'create' ] );
Route::get( '/blogs/{slug}', [ \App\Http\Controllers\BlogController::class, 'show' ] )->name( 'blog' );
Route::get( '/blog/{category_slug}', [ \App\Http\Controllers\BlogController::class, 'category' ] );
Route::get( '/{name}', [ \App\Http\Controllers\ShopController::class, 'vendor' ] )->name( 'vendor' );
Route::get( '/product/{product}/{optional_price?}', [
	\App\Http\Controllers\ShopController::class,
	'single'
] )->name( 'product' );
Route::get( '/payment/{product}', [
	\App\Http\Controllers\TransactionsController::class,
	'payment'
] )->name( 'payment_view' );
Route::post( '/final/payment', [ \App\Http\Controllers\TransactionsController::class, 'store' ] )->name( 'payment' );
Route::get( '/check_payment/{order_id?}/', [
	\App\Http\Controllers\TransactionsController::class,
	'checkPayment'
] )->name( 'check_payment' );
//End Shop Pages