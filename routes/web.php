<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\logActivity;
use App\Http\Controllers\newsController;
use App\Http\Controllers\Notification;
use App\Http\Controllers\popupController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');

//กำหนด middleware เพื่อ ไม่ให้ user เข้าหน้า adminได้


//หน้า HOME ADMIN เเละ USER
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'show_admin'])->name('admin.home')->middleware('is_admin');
Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'show_user'])->name('user.home');
Route::get('/admin/dashbord/user', [App\Http\Controllers\HomeController::class, 'dashbord_user'])->name('admin.dashbord.user')->middleware('is_admin');
Route::get('/admin/dashbord/news', [App\Http\Controllers\HomeController::class, 'dashbord_news'])->name('admin.dashbord.news')->middleware('is_admin');
Route::get('/admin/dashbord/popup', [App\Http\Controllers\HomeController::class, 'dashbord_popup'])->name('admin.dashbord.popup')->middleware('is_admin');
Route::get('/admin/dashbord/log', [App\Http\Controllers\HomeController::class, 'dashbord_log'])->name('admin.dashbord.log')->middleware('is_admin');


//mark as read
Route::get('markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');


//หน้า detail ข่าว
Route::get('admin/detail/news/{id}', [newsController::class, 'detail_admin']);
Route::get('user/detail/news/{id}', [newsController::class, 'detail_user']);


// limit login Attempts (ครั้ง,เวลา)
// Route::post("/login",[LoginController::class,'login'])->middleware("throttle:3,1"); 

//User
Route::get('/user/all',[userController::class,'index'])->name('userall')->middleware('is_admin');
Route::post('/user/add',[userController::class,'store'])->name('adduser')->middleware('is_admin');
Route::get('/user/edit/{id}',[userController::class,'edit'])->name('edituser')->middleware('is_admin');
Route::post('/user/update/{id}',[userController::class,'update'])->name('updateuser')->middleware('is_admin');
Route::get('/user/delete/{id}',[userController::class,'destroy'])->name('deleteuser')->middleware('is_admin');
Route::get('/user/editpassword/{id}', [userController::class, 'changePassword'])->name('editpassword')->middleware('is_admin');
Route::post('/user/updatepassword/{id}',[userController::class,'updatePassword'])->name('updateuser')->middleware('is_admin');


//News
Route::get('/news/all',[newsController::class,'index'])->name('newsall')->middleware('is_admin');
Route::get('/news/addpage',[newsController::class,'pageAddNews'])->name('addnewspage')->middleware('is_admin');
Route::post('/news/add',[newsController::class,'store'])->name('addnews')->middleware('is_admin');
Route::get('/news/edit/{id}',[newsController::class,'edit'])->name('editnews')->middleware('is_admin');
Route::post('/news/update/{id}',[newsController::class,'update'])->name('updatenews')->middleware('is_admin');
Route::get('/news/delete/{id}',[newsController::class,'destroy'])->name('deletenews')->middleware('is_admin');

//PopUp
Route::get('/popup/all',[popupController::class,'index'])->name('popupall')->middleware('is_admin');
Route::get('/popup/addpage',[popupController::class,'pageAddpopup'])->name('addpopuppage')->middleware('is_admin');
Route::post('/popup/add',[popupController::class,'store'])->name('addpopup')->middleware('is_admin');
Route::get('/popup/edit/{id}',[popupController::class,'edit'])->name('editpopup')->middleware('is_admin');
Route::post('/popup/update/{id}',[popupController::class,'update'])->name('updatepopup')->middleware('is_admin');
Route::get('/popup/delete/{id}',[popupController::class,'destroy'])->name('deletepopup')->middleware('is_admin');

//edit Profile
Route::get('user/profile/edit',[ProfileEditController::class,'edituser'])->name('User.profile.edit');
Route::post('user/profile/update',[ProfileEditController::class,'updateUser'])->name('user.profile.update');
Route::get('admin/profile/edit',[ProfileEditController::class,'editadmin'])->name('Admin.profile.edit')->middleware('is_admin');
Route::post('admin/profile/update',[ProfileEditController::class,'updateAdmin'])->name('admin.profile.update')->middleware('is_admin');


// log activity
Route::get('/log/all',[logActivity::class,'index'])->name('log_all')->middleware('is_admin');

//DetailNotification
Route::get('admin/detailNoti/news/{title}', [Notification::class, 'detailNoti_admin'])->middleware('is_admin');
Route::get('user/detailNoti/news/{title}', [Notification::class, 'detailNoti_user']);


//backup
// Route::get('admin/backup', [HomeController::class, 'createBackup'])->name('admin.backup');
