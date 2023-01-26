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

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactUsFormController;

use App\Http\Controllers\PostsController;
use App\Models\User;


use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;


Route::get('/', function () {
    return view('landingPage');
});

  
use App\Http\Controllers\Auth\ForgotPasswordController;
  
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
  
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/terms', function () {
    $title = "Terms of use";
    return view('terms', ['title' => $title]);
});

Route::get('/privacy-policy', function () {
    $title = "Privacy Policy";
    return view('privacy-policy', ['title' => $title]);
});

Route::get('/about', function () {
    $title = "About";
    return view('about', ['title' => $title]);
});

Route::get('/guide', function () {
    $title = "Guide";
    return view('guide', ['title' => $title]);
});

Route::get('/resources', function () {
    $title = "Resources";
    return view('resources', ['title' => $title]);
});

Route::get('/updates', function () {
    $title = "My updates";
    return view('updates', ['title' => $title]);
})->middleware('auth');

Route::get('/my-story', function () {
    $title = "My profile";
    return view('my-story', ['title' => $title]);
})->middleware('auth');


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
 

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('/update/userInfo', "App\Http\Controllers\UsersController@updateUserInfo")->name("updateUserInfo");

    Route::post('/upload/userAvatar', "App\Http\Controllers\UsersController@uploadUserAvatar")->name("uploadUserAvatar");

    Route::post('/create/newPost', [App\Http\Controllers\PostsController::class, 'createNewPost'])->name('createNewPost');

    Route::get('/findFriends', 'FriendsController@findFriends')->name('findFriends');

    Route::get('/friendRequests', 'FriendsController@friendRequests')->name('friendRequests');

    Route::get('/modifyFriendship/{friendship_status}/{user_id}', 'FriendsController@modifyFriendship')->name('modifyFriendship');

    Route::get('/userProfile/{id}', 'App\Http\Controllers\UsersController@userProfile')->name('userProfile');

    Route::get('/friends', 'FriendsController@checkoutFriends')->name('checkoutFriends');

    Route::get('/friendsPosts', 'PostsController@friendsPosts')->name('friendsPosts');

    Route::get('/singlePost/{id}', 'PostsController@singlePost')->name('singlePost');

    Route::post('/sendComment', 'PostsController@sendComment')->name('sendComment');

    Route::post('/editComment', 'CommentsController@editComment')->name('editComment');

    Route::post('/deleteComment', 'CommentsController@deleteComment')->name('deleteComment');

    Route::get('/myPosts', "PostsController@myPosts")->name('myPosts');

    Route::get('/deletePost/{id}', "PostsController@deletePost")->name('deletePost');

    Route::get('/editPostForm/{id}', 'PostsController@editPostForm')->name('editPostForm');

    Route::post('/editPost', 'PostsController@editPost')->name('editPost');

    Route::get('/messagesList', "MessagesController@messagesList")->name('messagesList');

    Route::get('/conversation/{user_id}', "MessagesController@conversation")->name('conversation');

    Route::post('/sendMessage', "MessagesController@sendMessage")->name('sendMessage');

    Route::get('/notifications', "MessagesController@notifications")->name('notifications');

    Route::get('/searchForPosts', "PostsController@searchForPosts")->name('searchForPosts');

    Route::post('/likeThisPost', "PostsController@likeThisPost")->name('likeThisPost');

    Route::post('/didUserLikeThisPost', "PostsController@didUserLikeThisPost")->name('didUserLikeThisPost');

    Route::get('/contact', [ContactUsFormController::class, 'createForm']);

    Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

    Route::post('/blog', [UsersController::class, 'blog'])->name('blog');

    Route::get('/articles', [FriendsController::class, 'articles'])->name('articles');
});

