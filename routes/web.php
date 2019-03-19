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
Route::group(['namespace'=>'frontend'], function () {
	// 首页
	Route::get('/', 'HomeController@index');
	//会员
	Route::get('login', 'UserController@login')->name('f_login');
	Route::post('login', 'UserController@login')->name('f_login');
	Route::get('logout', 'UserController@logout')->name('f_logout');
	Route::get('register', 'UserController@register')->name('f_register');
	Route::post('register', 'UserController@register')->name('f_register');
	Route::get('change-password', 'UserController@changePassword')->name('f_change_pass');
	Route::post('change-password', 'UserController@changePassword')->name('f_change_pass');
	Route::get('reset-password', 'UserController@resetPassword')->name('f_reset_pass');
	Route::post('reset-password', 'UserController@resetPassword')->name('f_reset_pass');
	Route::get('person', 'UserController@person')->name('f_person');
	//通知
	Route::get('notice/{id}', 'NoticeController@content')->name('f_notice_content');
	// 文章文档
	Route::get('article', 'ArticleController@list')->name('f_article_list');
	Route::get('article/tag/{tag}', 'ArticleController@list_tag')->name('f_article_list_tag');
	Route::get('article/{id}', 'ArticleController@content')->name('f_article_content');
	Route::get('article/search/{key}', 'ArticleController@search')->name('f_article_search');
	// 看书推荐
	Route::get('book', 'BookController@list')->name('f_book_list');
	Route::get('book/{id}', 'BookController@content')->name('f_book_content');
	Route::get('book/search/{key}', 'BookController@search')->name('f_book_search');
	// 编辑软件
	Route::get('software', 'SoftwareController@list')->name('f_software_list');
	//协会介绍
	Route::get('introduce', 'OtherController@introduce')->name('f_other_introduce');
	Route::get('about', 'OtherController@about')->name('f_other_about');
	Route::get('disclaimer', 'OtherController@disclaimer')->name('f_other_disclaimer');
});


Route::group(['prefix'=>'admin','namespace'=>'backend'], function () {
	Route::get('/', 'Controller@index')->name('admin');
	// 管理员
	Route::get('login', 'AdminController@login')->name('b_login');
	Route::post('login', 'AdminController@login')->name('b_login');
	Route::get('logout', 'AdminController@logout')->name('b_logout');
	//用户
	Route::get('user/member', 'UserController@member')->name('b_user_member');
	Route::get('user/manager', 'UserController@manager')->name('b_user_manager');
	//角色
	Route::get('role', 'RoleController@list')->name('b_role_list');
	Route::get('role/json', 'RoleController@json')->name('b_role_json');
	Route::get('role/edit', 'RoleController@json')->name('b_role_edit');
	//权限
	Route::get('access', 'AccessController@list')->name('b_access_list');
	Route::get('access/add', 'AccessController@form')->name('b_access_add');
	Route::post('access/add', 'AccessController@store')->name('b_access_add');
	Route::get('access/edit', 'AccessController@form')->name('b_access_edit');
	Route::post('access/edit', 'AccessController@store')->name('b_access_edit');
	Route::get('access/delete', 'AccessController@delete')->name('b_access_del');
	//通知
	Route::get('notice', 'NoticeController@list')->name('b_notice_list');
	Route::get('notice/add', 'NoticeController@form')->name('b_notice_add');
	Route::post('notice/add', 'NoticeController@store')->name('b_notice_add');
	Route::get('notice/edit', 'NoticeController@form')->name('b_notice_edit');
	Route::post('notice/edit', 'NoticeController@store')->name('b_notice_edit');
	Route::get('notice/delete', 'NoticeController@delete')->name('b_notice_del');
	Route::get('notice/search', 'NoticeController@search')->name('b_notice_search');
	// 文章
	Route::get('article', 'ArticleController@list')->name('b_article_list');
	Route::get('article/add', 'ArticleController@form')->name('b_article_add');
	Route::post('article/add', 'ArticleController@store')->name('b_article_add');
	Route::get('article/edit', 'ArticleController@form')->name('b_article_edit');
	Route::post('article/edit', 'ArticleController@store')->name('b_article_edit');
	Route::get('article/delete', 'ArticleController@delete')->name('b_article_del');
	Route::get('article/search', 'ArticleController@search')->name('b_article_search');
	// 看书推荐
	Route::get('book', 'BookController@list')->name('b_book_list');
	Route::get('book/add', 'BookController@form')->name('b_book_add');
	Route::post('book/add', 'BookController@store')->name('b_book_add');
	Route::get('book/edit', 'BookController@form')->name('b_book_edit');
	Route::post('book/edit', 'BookController@store')->name('b_book_edit');
	Route::get('book/delete', 'BookController@delete')->name('b_book_del');
	//软件管理
	Route::get('software', 'SoftwareController@list')->name('b_software_list');
	Route::get('software/add', 'SoftwareController@form')->name('b_software_add');
	Route::post('software/add', 'SoftwareController@store')->name('b_software_add');
	Route::get('software/edit', 'SoftwareController@form')->name('b_software_edit');
	Route::post('software/edit', 'SoftwareController@store')->name('b_software_edit');
	Route::get('software/delete', 'SoftwareController@delete')->name('b_software_del');
	// 标签
	Route::get('tag', 'TagController@list')->name('b_tag_list');
	Route::get('tag/add', 'TagController@form')->name('b_tag_add');
	Route::post('tag/add', 'TagController@store')->name('b_tag_add');
	Route::get('tag/edit', 'TagController@form')->name('b_tag_edit');
	Route::post('tag/edit', 'TagController@store')->name('b_tag_edit');
	Route::get('tag/delete', 'TagController@delete')->name('b_tag_del');
	// 上传
	Route::post('uplode', 'UplodeController@image')->name('b_uplode_img');
});
