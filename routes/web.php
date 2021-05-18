<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PackageController as FrontendPackageController;
use App\Http\Controllers\Frontend\UserController as FrontendUser;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;

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
////FRONTEND

Route::get('/',[HomeController::class,'home'])->name('home.view');
Route::get('/posts',[FrontendPostController::class,'posts'])->name('frontend.post.view');
//show post
Route::get('/view/post',[FrontendPostController::class,'viewPost'])->name('frontend.view.post');
Route::get('logout',[FrontendUser::class,'userLogout'])->name('frontend.user.logout');
//single post view
Route::get('/view/single/post/{id}',[FrontendPostController::class,'viewSinglePost'])->name('frontend.view.single.post');
//user dashboard
Route::get('/user/dashboard',[FrontendUser::class,'userDashboard'])->name('user.dashboard');
//User registration login
Route::get('/user/registration/form',[FrontendUser::class,'userRegistration'])->name('frontend.user.reg');
Route::post('/do/user/registration',[FrontendUser::class,'doReg'])->name('frontend.do.user.reg');
Route::get('/login/form',[FrontendUser::class,'loginForm'])->name('frontend.login.form');
Route::post('/login',[FrontendUser::class,'doLogin'])->name('frontend.do.login');

//posts under categories
Route::get('/posts/under_categories/{id}',[FrontendPostController::class,'postsUnderCategory'])->name('posts.under.category');

//Request the posts interested
Route::group(['middleware'=>'interest'],function (){

    Route::get('/post/interested/{id}',[FrontendPostController::class,'interested'])->name('post.interested');
    //user dashboard interested posts
    Route::get('/interested/posts',[FrontendPostController::class,'interestedPosts'])->name('interested.posts');

//view users interested in my posts
    Route::get('/interested/users',[FrontendPostController::class,'viewInterestedUsers'])->name('view.interested.users');

//view approved user list
    Route::get('view/interested/list',[FrontendPostController::class,'viewApprovedUsers'])->name('view.approved.user');

//approve and disapprove the request
    Route::get('/approve/request/{id}/{action}',[FrontendPostController::class,'approve'])->name('approve.request');

// delete user request
    Route::get('/delete/request/{id}',[FrontendPostController::class,'deleteRequest'])->name('delete.request');

//delete user post
    Route::get('/delete/user/post/{id}',[FrontendPostController::class,'deletePost'])->name('front.delete.user.post');
//cacel interest in a post
    Route::get('/cancel/interest/{id}',[FrontendPostController::class,'cancelInterest'])->name('cancel.post.interest');
//user form profile
    Route::get('/user/profile',[FrontendUser::class,'userProfile'])->name('frontend.user.profile');
    Route::get('/user/edit/profile',[FrontendUser::class,'editProfileForm'])->name('user.edit.profile.form');
    Route::put('/update/profile',[FrontendUser::class,'updateUser'])->name('user.profile.update');

    //user create post
    Route::get('/user/post/form',[FrontendPostController::class,'userPostForm'])->name('user.post.form');

//user package view
    Route::get('/packages',[FrontendPackageController::class,'viewPackages'])->name('user.package.view');
    Route::get('/packages/pending/{id}',[FrontendPackageController::class,'pendingPackage'])->name('user.package.pending');

//user package purchase form
    Route::get('/package/purchase/form/{id}',[FrontendPackageController::class,'purchaseForm'])->name('purchase.form');
    Route::post('purchase/package',[FrontendPackageController::class,'packagePurchase'])->name('package.purchase');

//user post add
    Route::post('/user/do/post',[FrontendPostController::class,'userAddPost'])->name('user.create.post');
//user post view
    Route::get('/user/posts/view',[FrontendPostController::class,'userPostView'])->name('user.posts.view');

});







///ADMIN
Route::group(['prefix'=>'admin'],function (){




//Admin login
    Route::get('/admin/login',[AdminController::class,'loginForm'])->name('admin.loginForm');
    Route::post('login',[AdminController::class,'login'])->name('login.admin');

    Route::group(['middleware'=>'auth'],function (){

        Route::get('/logout',[AdminController::class, 'logout'])->name('admin.logout');

//dashboard
        Route::get('/',[DashboardController::class,'dashboard'])->name('home');
//Admin
        Route::get('/Admin/list',[AdminController::class,'adminList'])->name('admin.list');
        Route::post('/Admin/add',[AdminController::class,'adminAdd'])->name('admin.create');
        Route::get('/Admin/form',[AdminController::class,'adminForm'])->name('admin.form');
        Route::get('/Admin/delete/{id}',[AdminController::class,'deleteAdmin'])->name('admin.delete');

//category
        Route::get('/category',[CategoryController::class,'viewcategory'])->name('category.view');
        Route::post('/category/create',[CategoryController::class,'createcategory'])->name('category.create');
        Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('delete');
//
//user manage
        Route::get('/users/view',[UserController::class,'viewuser'])->name('view.user');
        Route::get('/users/form',[UserController::class,'userform'])->name('user.form');
        Route::post('/user/add',[UserController::class,'useradd'])->name('user.add');

//Packages
        Route::get('/packages/view',[PackageController::class,'view'])->name('package.view');
        Route::post('/package/add',[PackageController::class,'packageadd'])->name('package.add');
        Route::get('/package/delete/{id}',[PackageController::class,'packageDelete'])->name('package.delete');

// posts
        Route::get('/posts/view',[PostController::class,'viewpost'])->name('post.view');
        Route::get('/post/form',[PostController::class,'postform'])->name('post.form');
        Route::post('/post/add',[PostController::class,'addpost'])->name('post.add');
        Route::get('/post/delete/{id}',[PostController::class,'postdelete'])->name('post.delete');

// purchase request
        Route::get('/view/purchase/requests',[PackageController::class,'purchaseRequest'])->name('purchase.request.list');
        Route::get('/approved/list',[PackageController::class,'approvedList'])->name('approved.lists');
        Route::get('/disapproved/list',[PackageController::class,'disapprovedList'])->name('disapproved.lists');
//      purchase request action

        Route::get('/approve/request/{request_id}{name}',[PackageController::class,'approveRequest'])->name('approve.purchase.request');
        Route::get('/disapprove/request/{id}',[PackageController::class,'disapproveRequest'])->name('disapprove.purchase.request');
        Route::get('/disapprove/after/approve/{id}',[PackageController::class,'disapproveAfterApprove'])->name('disapprove.after.approve');




    });


});
