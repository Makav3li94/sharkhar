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
//Route::get('admin',function (){
//	\App\Models\Admin::create([
//		'name'=>'Makaveli',
//		'email'=>'neogood@yahoo.com',
//		'mobile'=>'09121989573',
//		'password'=>\Illuminate\Support\Facades\Hash::make('Parham@19171363'),
//	]);
//});
//Route::get('test', [ \App\Http\Controllers\ScraperController::class, 'scrap' ]);
Route::get( 'test', function () {
	$path = '/public/';
	\Spatie\Sitemap\SitemapGenerator::create('https://sharkhar.net')->writeToFile($path);
//	$sellers = \App\Models\Seller::doesntHave( 'products' )->get();
//	foreach ( $sellers as $seller ) {
//		\App\Jobs\ScrapInsta::dispatch( $seller );
//	}
//	echo \Illuminate\Support\Facades\Hash::make(19171363);
//	 $sents = [
//		'دوست عزیز و محترم . از معامله با ایشون لذت بردم.',
//		'مطمئن و خوش قول',
//		'فروشنده ای خوب و گرامی',
//		'بسیار صادق ، خوش اخلاق و کار درست',
//		'معامله عالی با دوست عزیز',
//		'دوست بسیار قابل اعتماد و با شخصیت و مودب ، در سریع ترین زمان ممکن فرستادن برای بنده ',
//		'کاردرست ، معتمد و خوش اخلاق با آرزوی سلامتی وموفقیت برای این بزرگوار 🤗',
//		' دوست محترم و قابل اعتماد',
//		'فروشنده با انصاف',
//		' کاملا صادق و خوش برخورد',
//		'سیار فروشنده محترم و با اخلاق',
//		'فروشنده با انصاف هستند.',
//		'بسیار خوش قول و کاردرست',
//		'راضی از انجام معامله',
//		'فردی بسیار خوشرو و قابل اعتماد',
//		'فروشنده ای محترم و خوش قول',
//		'خرید کاملا خوب وبدون مشکل بود وایشون کاملا قابل اعتماد ومنصف هستن',
//		'مثل همیشه معامله سریع و بدون مشکل',
//		'از معاملات رضایت بخش و بسیار بی نقص',
//		'دوست عزيز هميشه كارش درسته ايشون قابل اعتماد و خوش برخورد هستند ممنون رفيق',
//		'انسانی گل و دوستی مورد اعتماد.از معامله با ایشون لذت خواهید برد',
//		'بسیار مودب و خوش اخلاق',
//		'فروشنده ای محترم و باشخصیت',
//		'فرد قابل اطمینان و بسیار با ادب و با اخلاق ',
//		'فروشنده ای خوش قول و خوش اخلاق',
//		'فروشنده ای خوش برخورد و قابل اعتماد',
//		'فروشنده منصف و قابل اعتماد. از معامله با ایشون بسیار خوشحالم',
//		'معامله خوبی بود!!!',
//		'معامله ای راحت',
//		'معامله ای مطمئن و رضایت بخش و از دوستان قابل اعتماد',
//		'معامله ای بسیار عالی و تشکر از مسولیت پذیری و پیگیری ایشون ',
//		'خریدی بی دردسر و کاملا راحت با بسته بندی عالی و صداقت کامل',
//		'بسیار خوش اخلاق و انسانی شریف و باانصاف',
//		'بسیار فروشنده متین و مطمئنی هستند و خیلی هم پیگیر',
//		'دوستی خوب و مهربون',
//		'فروشنده ای با انصاف، بسیار مورد اطمینان و محترم.',
//		'معامله ای راحت با دوست متین و با شخصیت و مورد احترام.',
//		'بسیار خوش برخورد و خوش قول هستن  در اولین فرصت به نحو احسن ارسال کردن و ازشون تشکر میکنم و از معامله با ایشون خرسندم',
//		'بسیار خوش بر خورد و کار راه انداز و انسانی شریف و قابل اعتماد',
//		'فروشنده با انصاف و خوش قول ',
//		'فروشنده ای بســـــیار با حوصله و خوش اخلاق ، بلافاصله بعد از خرید هم کالا رو ارسال کردن',
//		'فروشنده قابل اعتماد و محترم می باشند ',
//		'خوش برخود وخوش غول در معامله وفروختن قطعات کم یاب و ناب',
//		'دوست خوب ، قابل اعتماد و متشخص',
//		'فروشنده ی محترم و مسئولیت پذیر',
//		'فروشنده ای بسیار خوش اخلاق و صبور!',
//		'فروشنده محترم...سرعت خفن در ارسال :D',
//		'خوش اخلاق ، قابل اعتماد ، رک و رو راست',
//		'کاربری متشخص و قابل اعتماد',
//		'معامله ای بی نقص و کامل ، رضایت کامل',
//		'معامله ای بی دردسر و فروشنده ای بینظیر. جای سخن دیگری نیست تشکر ',
//		'فروشنده قابل اعتماد. ارسال سریع کالا طبق نظر مشتری. قیمت مناسب. در کل عالی',
//		'فروشنده خیلی خوش رو',
//		'دوستی محترم و با انصاف',
//		'خرید از دوست عزیز و کار درست -از خرید از ایشون راضی ام ',
//		'عالی',
//		'راضی از خرید از ایشون.دقیقا همونجوری بود که میگفتن',
//		'..محترم،معتمد،پیگیر و پاسخ گو...هر چند لازم به یادآوری نیست....سوای معامله،خرسندم از آشنایی با ایشون',
//		'نیاز به تعریف ندارند، آشنایی و معامله با ایشون سعادتی بود برای بنده 🌷🙂 ',
//		'کار درست ، خوش برخورد ، پیگیر و مطمئن یکی از بهترین فروشنده های شرخر ایشالا همیشه موفق و سلامت باشند ',
//		'باشخصیت ترین و بهترین فروشنده!',
//		'فردی بسیار محترم - بسیار وقت شناس - مسئولیت پذیر - متعهد - بسیار خوش برخورد از معامله با ایشان بسیار خرسندم',
//		'معامله ای عالی',
//		'از ایشون برای اولین بار خرید کردم بسیار آدم منصف و خوش اخلاقی هستند با قیمت های خوب. ',
//		'فروشنده عالی و خوش برخورد.....عالی',
//		'بسیار تمیز، بسته بندی عالی و خود ایشان نیز بسیار پیگیر و منظم عمل کردند تشکر فراوان',
//		'دوست قابل اعتماد و متعهد',
//		'یک خرده بسیار عالی و مطمئن از دوست عزیز',
//		'همه چی عالی بود.بسه بندی.پشتیبانی. کاربر بسیار حرفه ای هستن ایشون',
//		'فردی بی نظیر و درجه یک، معامله با ایشان افتخاریست برای بنده',
//	];
//	$sents = [
//		' باز خدارشکر بابت سیستم ضمانت شرخر !',
//		'ضعیف',
//		'اصلا مشخص نیست اندازه هاشو چجوری گرفته بودن !!',
//
//	];
//	$orders = \App\Models\Order::where( [ [ 'id', '<=', 324 ] , [ 'id', '>=', 322 ] ] )->get();
//
//	foreach ( $orders as $key=> $order ) {
//		$rand = array_rand($sents,1);
//
//		\App\Models\Feedback::create( [
//			'seller_id'  => $order->seller_id,
//			'buyer_id'   => $order->buyer_id,
//			'product_id' => $order->product_id,
//			'order_id'   => $order->id,
//			'body'       => $sents[$key],
//			'score'      => 0,
//		] );
//	}
} );

Route::get( '/', function () {
//	$url      = "https://www.instagram.com/parnasite/?__a=1";
//	$response = file_get_contents( $url );r
//
//	return $userdata = json_decode( $response, true );
	return view( 'home' );
//	return redirect( \route( 'register' ) );
} )->name( 'home' );


Route::post( 'message', function () {
	request()->validate( [
		'name' => 'required|string',
		'email' => 'required|email',
		'body' => 'required|string',
	] );
	\App\Models\Contact::create( request()->all() );

	return redirect()->back()->withSuccess( 'پیغام شما ارسال شد.' );

} )->name( 'contact' );


Auth::routes();
Route::get( '/shops', [ \App\Http\Controllers\ShopController::class, 'shop' ] )->name( 'shop' );
Route::resource( '/blogs', \App\Http\Controllers\BlogController::class )->except( [ 'create' ] );
Route::get( '/blogs/{slug}', [ \App\Http\Controllers\BlogController::class, 'show' ] );
Route::get( '/blog/{category_slug}', [ \App\Http\Controllers\BlogController::class, 'category' ] );

//RULES
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

Route::get( '/vendors/{name}', [ \App\Http\Controllers\ShopController::class, 'vendor' ] )->name( 'vendor' );
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

Route::get( '/send-pass/', [
	\App\Http\Controllers\Auth\LoginController::class,
	'sendPass'
] )->name( 'send_pass' );

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

	Route::resource( 'sellers', \App\Http\Controllers\SellersController::class )->except( [
		'create',
		'show'
	] );;


	Route::patch( 'sellers.update/{seller}', [
		\App\Http\Controllers\SellersController::class,
		'changePassword'
	] )->name( 'sellers.change_password' );


	Route::resource( 'contacts', \App\Http\Controllers\ContactsController::class );

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
	Route::resource( 'orders', \App\Http\Controllers\OrdersController::class )->except( [
		'create',
		'show'
	] );;
	Route::resource( 'police', \App\Http\Controllers\PoliceController::class )->except( [
		'create',
		'show'
	] );;
	Route::resource( 'products', \App\Http\Controllers\ProductsController::class )->except( [
		'create',
		'show'
	] );;
	Route::get( 'products_optional_price', [
		\App\Http\Controllers\ProductsController::class,
		'updateOptionalPrice'
	] )->name( 'optional_price' );
	Route::resource( 'transactions', \App\Http\Controllers\TransactionsController::class )->only( [
		'index',
	] );;
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
	Route::resource( 'orders', \App\Http\Controllers\OrdersController::class )->except( [
		'create',
		'show'
	] );;

	Route::resource( 'police', \App\Http\Controllers\PoliceController::class )->except( [
		'create',
		'show'
	] );;
	Route::resource( 'products', \App\Http\Controllers\ProductsController::class )->except( [
		'create',
		'show'
	] );;
	Route::resource( 'transactions', \App\Http\Controllers\TransactionsController::class )->only( [
		'index',
	] );;

	Route::resource( 'feedbacks', \App\Http\Controllers\FeedbacksController::class );

	Route::resource( 'contacts', \App\Http\Controllers\ContactsController::class );

	Route::get( 'get_seller_ajax', [
		\App\Http\Controllers\FeedbacksController::class,
		'getSellerAjax'
	] )->name( 'get.seller.ajax' );
} );

//******* Shop *******