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

Route::get('admin/dangnhap','UserController@getLogin');
Route::post('admin/dangnhap','UserController@postLogin');
Route::get('admin/dangxuat','UserController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'checklogin'],function()
{
	Route::get('/','TheLoaiController@getList');

	Route::group(['prefix'=>'theloai'],function()
	{
		Route::get('list','TheLoaiController@getList');
		Route::get('add','TheLoaiController@getAdd');
		Route::post('add','TheLoaiController@postAdd');
		Route::get('edit/{id}','TheLoaiController@getEdit');
		Route::post('edit/{id}','TheLoaiController@postEdit');
		Route::get('delete/{id}','TheLoaiController@getDel');
	});

	Route::group(['prefix'=>'sanpham'],function()
	{
		Route::get('list','SanPhamController@getList');
		Route::get('add','SanPhamController@getAdd');
		Route::post('add','SanPhamController@postAdd');
		Route::get('edit/{id}','SanPhamController@getEdit');
		Route::post('edit/{id}','SanPhamController@postEdit');
		Route::get('delete/{id}','SanPhamController@getDel');
	});

	Route::group(['prefix'=>'tintuc'],function()
	{
		Route::get('list','TinTucController@getList');
		Route::get('add','TinTucController@getAdd');
		Route::post('add','TinTucController@postAdd');
		Route::get('edit/{id}','TinTucController@getEdit');
		Route::post('edit/{id}','TinTucController@postEdit');
		Route::get('delete/{id}','TinTucController@getDel');
	});

	Route::group(['prefix'=>'slide'],function()
	{
		Route::get('list','SlideController@getList');
		Route::get('add','SlideController@getAdd');
		Route::post('add','SlideController@postAdd');
		Route::get('edit/{id}','SlideController@getEdit');
		Route::post('edit/{id}','SlideController@postEdit');
		Route::get('delete/{id}','SlideController@getDel');
	});

	Route::group(['prefix'=>'user'],function()
	{
		Route::get('list','UserController@getList');
		Route::get('add','UserController@getAdd');
		Route::post('add','UserController@postAdd');
		Route::get('edit/{id}','UserController@getEdit');
		Route::post('edit/{id}','UserController@postEdit');
		Route::get('delete/{id}','UserController@getDel');
	});

	Route::group(['prefix'=>'customer'],function()
	{
		Route::get('list','CustomerController@getList');
		Route::get('edit/{id}','CustomerController@getEdit');
		Route::post('edit/{id}','CustomerController@postEdit');
		Route::get('delete/{id}','CustomerController@getDel');
	});

	Route::group(['prefix'=>'bill'],function()
	{
		Route::get('list','BillController@getList');
		Route::get('edit/{id}','BillController@getEdit');
		Route::post('edit/{id}','BillController@postEdit');
		Route::get('delete/{id}','BillController@getDel');
		Route::get('del-product/{id_bill}/{id_product}','BillController@delProduct');
	});
});

Route::get('/','PageController@home');
Route::get('home',['as'=>'home','uses'=>'PageController@home']);
Route::get('category/{id}',['as'=>'loaisanpham','uses'=>'PageController@getLoaiSanPham']);
Route::get('product/{id}',['as'=>'sanpham','uses'=>'PageController@getSanPham']);
Route::get('404',['as'=>'404','uses'=>'PageController@get404']);
Route::get('news',['as'=>'news','uses'=>'PageController@getNews']);
Route::get('news/{id}',['as'=>'detailnews','uses'=>'PageController@detailNews']);
Route::get('lienhe',['as'=>'lienhe','uses'=>'PageController@getContact']);
Route::get('contact',['as'=>'lienhe','uses'=>'PageController@getContact']);
Route::post('search',['as'=>'search','uses'=>'PageController@postSearch']);

Route::get('dangnhap',['as'=>'getLogin','uses'=>'PageController@getLogin']);
Route::post('dangnhap',['as'=>'postLogin','uses'=>'PageController@postLogin']);
Route::get('dangky',['as'=>'getDangKy','uses'=>'PageController@getDangKy']);
Route::post('dangky',['as'=>'postDangKy','uses'=>'PageController@postDangKy']);
Route::get('dangxuat',['as'=>'dangxuat','uses'=>'PageController@getLogout']);

Route::get('addcart/{id}',['as'=>'addcart','uses'=>'PageController@addCart']);
Route::get('delcart/{id}',['as'=>'delcart','uses'=>'PageController@delCart']);
Route::get('checkout',['as'=>'checkout','uses'=>'PageController@getCheckout']);
Route::post('savecart',['as'=>'savecart','uses'=>'PageController@saveCart']);