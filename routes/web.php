<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// トップページ
Route::get('/', 'IndexController@index');

// メニューページ
Route::get('/menu','MenusController@index');

// カートページ
Route::get('/cart','CartsController@index')->name('cart');
Route::post('/cart/store','CartsController@store');
Route::post('/cart/clear/{id}','CartsController@pop');
Route::post('/cart/edit','CartsController@edit');
Route::post('/cart/clear','CartsController@clear');

//　注文
Route::get('/order/confirm','OrdersController@index')->name('order');
Route::post('/order/confirm/insert','OrdersController@insert');
Route::get('/order/complete','OrdersController@complete')->name('complete');
Route::any('/order/confirm/coupon','OrdersController@coupon');

// etc..
Route::get('/company', 'PagesController@company');
Route::get('/privacypolicy', 'PagesController@privacypolicy');
Route::get('/agreement', 'PagesController@agreement');
Route::get('/faq', 'PagesController@faq');

Route::group(['middleware' => ['userauth']], function () {

//マイページ
Route::get('/mypage/order/history','MypagesController@orderHistory');
Route::get('/mypage/order/detail/{id}','MypagesController@orderDetail');
Route::get('/mypage/detail','MypagesController@detail');
Route::get('/mypage/edit','MypagesController@edit');
Route::post('/mypage/confirm','MypagesController@confirm');
Route::post('/mypage/update','MypagesController@update');

//お客様用ログアウト
Route::post('/logout','auth\LoginController@logout');

});

// コンタクト
Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@send');


// API
Route::get('/app/countCartContents','ApisController@countCartContents');

// --------------------------- 管理者用 ---------------------------------------

Route::group(['middleware' => ['adminauth']], function () {

//管理者用ページ
Route::get('/pizzzzza/employee', 'EmployeesController@index')->name('employees'); //従業員一覧
Route::get('/pizzzzza/employee/show/{id}', 'EmployeesController@show'); //従業員詳細
Route::post('/pizzzzza/employee/handler/{id}', 'EmployeesController@handler'); //ハンドラー
Route::post('/pizzzzza/employee/edit', 'EmployeesController@edit'); //従業員編集
Route::get('/pizzzzza/employee/add', 'EmployeesController@add'); //従業員追加
Route::post('/pizzzzza/employee/add/store', 'EmployeesController@store'); //従業員追加処理

Route::get('/pizzzzza/order/top','AdminController@orderIndex'); //注文確認ページ
Route::any('/pizzzzza/order/get','AdminController@orderGet'); //注文確認ページ処理用


Route::get('/pizzzzza/menu', 'AdminMenusController@index'); //従業員用メニュー一覧
Route::get('/pizzzzza/menu/edit', 'AdminMenusController@nav'); //従業員用メニュー　販売終了or編集へ飛ばす
Route::post('/pizzzzza/menu/edit/do', 'AdminMenusController@editDo'); //従業員用メニュー更新処理
Route::get('/pizzzzza/menu/add', 'AdminMenusController@add'); //従業員用メニュー追加
Route::post('/pizzzzza/menu/add', 'AdminMenusController@push'); //従業員用メニュー追加処理

Route::get('/pizzzzza/analysis','AnalysisController@index'); //売り上げ・売れ筋ページ

Route::get('/pizzzzza/coupon/menu','CouponsController@couponMenu'); //クーポンメニュー
Route::get('/pizzzzza/coupon/add','CouponsController@couponNew'); //クーポン種別選択ページ
Route::get('/pizzzzza/coupon/list','CouponsController@couponNowList'); //開催中クーポン一覧ページ
Route::get('/pizzzzza/coupon/add/discount/input','CouponsController@couponNewDiscount'); //クーポン値引き入力ページ
Route::get('/pizzzzza/coupon/add/gift/input','CouponsController@couponNewGiftInput'); //プレゼントクーポン条件入力ページ
Route::get('/pizzzzza/coupon/add/gift/select','CouponsController@couponNewGiftSelect'); //プレゼントクーポン商品選択ページ(未完成)
Route::get('/pizzzzza/coupon/list/discount/edit','CouponsController@couponNowDiscountEdit'); //値引きクーポン編集ページ　
Route::get('/pizzzzza/coupon/list/gift/edit','CouponsController@couponNowGiftEdit'); //プレゼントクーポン条件変更ページ
Route::get('/pizzzzza/coupon/history','CouponsController@couponHistory'); //過去のクーポン一覧ページ

//電話注文
Route::post('/pizzzzza/order/accept/customer/handler','PhoneOrdersController@handler'); // POSTデータの処理振り分け
Route::get('/pizzzzza/order/accept/input','PhoneOrdersController@index')->name('telSearch'); //電話番号入力ページ
Route::post('/pizzzzza/order/accept/customer/check','PhoneOrdersController@input'); //お客様情報・注文履歴表示ページ（入力ページからの遷移用）
Route::get('/pizzzzza/order/accept/customer/detail','PhoneOrdersController@show');  //お客様情報・注文履歴表示ページ（戻るボタンなどでの遷移用）
Route::get('/pizzzzza/order/accept/customer/edit','PhoneOrdersController@edit'); //登録済みの顧客情報編集ページ
Route::get('/pizzzzza/order/accept/customer/update/phone','PhoneOrdersController@updatePhone'); //登録済みの顧客情報編集＞電話会員＞更新処理
Route::get('/pizzzzza/order/accept/customer/update/web','PhoneOrdersController@updateWeb'); //登録済みの顧客情報編集＞WEB会員＞更新処理
Route::get('/pizzzzza/order/accept/customer/input','PhoneOrdersController@newCustomer')->name('newCustomer'); //登録済み出ない場合のお客様情報入力ページ

//電話注文　注文処理
Route::get('/pizzzzza/order/accept/item/select','PhoneOrdersController@orderSelect'); //商品入力・選択ページ
Route::get('/pizzzzza/order/accept/item/confirm','PhoneOrdersController@orderConfirm'); //注文情報確認ページ

//売上・売れ筋
Route::get('/pizzzzza/analysis/populer','AnalysisController@analysisPopuler');
Route::get('/pizzzzza/analysis/earning','AnalysisController@analysisEarning');

//Auth
Route::post('/pizzzzza/logout', 'auth\AdminLoginController@logout'); //管理者用ログアウトページ

});

Auth::routes();

Route::get('/pizzzzza/login', 'auth\AdminLoginController@form'); //管理画面ログインページ
Route::post('/pizzzzza/order/top', 'auth\AdminLoginController@login'); //管理画面トップ
