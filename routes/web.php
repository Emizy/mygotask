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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/sendemail', 'SendEmailController@sendmail')->name('sendemail');
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register', 'Admin\AdminRegisterController@showRegForm')->name('admin.register');
    Route::post('/register', 'Admin\AdminRegisterController@register')->name('admin.register.submit');
    Route::get('logout/', 'Admin\AdminLoginController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('biz')->group(function () {
    Route::get('/login', 'Biz\BizLoginController@showLoginForm')->name('biz.login');
    Route::post('/login', 'Biz\BizLoginController@login')->name('biz.login.submit');
    Route::get('/register', 'Biz\BizRegisterController@showRegForm')->name('biz.register');
    Route::post('/register', 'Biz\BizRegisterController@register')->name('biz.register.submit');
    Route::get('/logout', 'Biz\BizLoginController@logout')->name('biz.logout');
    Route::get('/index', 'Biz\BizController@index')->name('biz.index');
    Route::get('/email_confirmaton/{email}/{code}', 'Biz\ConfirmationController@confirm');
    Route::get('/resendemail', 'Biz\ResendEmailController@ResendEmail')->name('biz.resendemail');
    Route::get('/dashboard', 'Biz\AccountController@account')->name('biz.account');
    Route::get('/profile', 'Biz\ProfileController@profile')->name('biz.profile');
    Route::post('/profile/update', 'Biz\ProfileController@Update')->name('biz.profile.update');
    Route::post('/profile/social', 'Biz\ProfileController@social_update')->name('biz.profile.social');
    Route::post('/profile/about', 'Biz\ProfileController@about_update')->name('biz.profile.about');
    Route::get('/manage', 'Biz\CustomerManagerController@customer')->name('biz.manage');
    Route::get('/manage/customer', 'Biz\CustomerManagerController@ShowCustomerForm')->name('biz.manage.customer');
    Route::post('/manage/save', 'Biz\CustomerManagerController@SaveCustomer')->name('biz.manage.save');
    Route::post('/manage/update', 'Biz\CustomerManagerController@UpdateCustomer')->name('biz.manage.update');
    Route::post('/manage/delete', 'Biz\CustomerManagerController@DeleteCustomer')->name('biz.manage.delete');
    Route::get('/manage/occupation', 'Biz\CustomerManagerController@ShowForm')->name('biz.manage.occupation');
    Route::post('/manage/occupation/save', 'Biz\CustomerManagerController@SaveForm')->name('biz.manage.occupation.save');
    Route::post('/manage/occupation/update', 'Biz\CustomerManagerController@UpdateForm')->name('biz.manage.occupation.update');
    Route::get('/manage/dailyentries', 'Biz\CustomerManagerController@ShowEntries')->name('biz.manage.dailyentries');
    Route::post('/manage/dailyentries/save', 'Biz\CustomerManagerController@SaveEntries')->name('biz.manage.dailyentries.save');
    Route::post('/manage/dailyentries/update', 'Biz\CustomerManagerController@SaveUpdate')->name('biz.manage.dailyentries.update');
    Route::post('/manage/dailyentries/delete', 'Biz\CustomerManagerController@DeleteUpdate')->name('biz.manage.dailyentries.delete');
    Route::post('/manage/birthday', 'SendEmailController@BirthdayMail')->name('biz.manage.birthday');

});