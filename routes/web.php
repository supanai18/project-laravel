<?php

// ------------------------------------------- Authenticate -----------------------------------------
// เข้าสู่ระบบ
Route::get('/login', function () {
    return view('login');
});
// สมัครสมาชิก
Route::get('/register', function () {
    return view('register');
});
// session user authenticate
Auth::routes();
// google login
Route::get('/auth/google', 'Auth\LoginController@redirect');
Route::get('/auth/google/callback', 'Auth\LoginController@callback');

// -------------------------------------------- Home ------------------------------------------------

// หน้าแรก
Route::get('/', 'HomeController@index');

// ----------------------------------------- Post Details -------------------------------------------

// post details
Route::get('/post/{id}/{name}', 'HomeController@details_post');
Route::post('/confirm-comment-post/{id}/{title}', 'CommentController@confirm_comment');
Route::get('/confirm-delete-comment/{id}', 'CommentController@delete_comment');

// ----------------------------------------- Post Details Free --------------------------------------
// training free
Route::get('/training-free', 'HomeController@training_free');
// training details
Route::get('/training/{id}/{name}', 'HomeController@training_details');

// ---------------------------------------------- News Details -------------------------------------
Route::get('/news', 'HomeController@news');
// news details
Route::get('/news/{id}/{name}', 'HomeController@news_details');

// ----------------------------------------- Contact ------------------------------------------------
// contact
Route::get('/contact', function() {
    return view('contact.contact');
});
Route::post('/confirm-contact', 'ContactController@create_contact');

// ---------------------------------------- User Profile Authenticate -------------------------------
// user
Route::get('/profile', 'UserController@data_user');
// cart
Route::get('/cart', 'UserController@cart');
// list
Route::get('/list', 'UserController@list');
// post list
Route::get('/training-details/{id}', 'UserController@training_details');

// --------------------------------------- User Create Update and Delete Post -----------------------
// create
Route::get('/form-create-post-auth', 'PostController@form_create_post');
Route::post('/confirm-create-post-auth', 'PostController@create_post');
// update
Route::get('/form-update-post-auth/{id}', 'PostController@form_update_post');
Route::post('/confirm-update-post-auth/{id}', 'PostController@update_post');
// delete
Route::get('/confirm-delete-post-auth/{id}', 'PostController@delete_post');
// post details
Route::get('/post-details-auth/{id}', 'PostController@post_details');

// --------------------------------------- User Create Update and Delete News -----------------------
// create
Route::get('/form-create-news-auth', 'NewController@form_create_news');
Route::post('/confirm-create-news-auth', 'NewController@confirm_create_news');
// update
Route::get('/form-update-news-auth/{id}', 'NewController@form_update_news');
Route::post('/confirm-update-news-auth/{id}', 'NewController@confirm_update_news');
// delete
Route::get('/confirm-delete-news-auth/{id}', 'NewController@confirm_delete_news');
// news details
Route::get('/news-details-auth/{id}', 'NewController@news_details');


// ------------------------------ Action Post Like Unlike and Delete Post in Cart -------------------
// post like
Route::get('/confirm-like-post/{id}', 'HomeController@post_like');
// post unlike
Route::get('/confirm-unlike-post/{id}', 'HomeController@post_unlike');
// post save
Route::get('/confirm-save-post/{id}', 'SaveController@confirm_save');
// post delete save
Route::get('/confirm-delete-save-post/{id}', 'SaveController@delete_save');

// ----------------------------------- Confirm Register Post Free -----------------------------------
// training
Route::post('/confirm-training/{post_id}', 'TrainingController@confirm_register_training');
Route::post('/confirm-training-free/{post_id}', 'TrainingController@confirm_register_training_free');

// ---------------------------------------- Action Payment Slip -------------------------------------
// payment
Route::get('/form-create-payment/{training_id}/{post_title}', 'UserController@form_create_payment');
Route::get('/form-update-payment/{payment_id}/{post_title}', 'UserController@form_update_payment');
Route::post('/confirm-payment/{training_id}', 'PaymentController@confirm_payment');
Route::post('/confirm-update-payment/{payment_id}', 'PaymentController@confirm_update_payment');









// ----------------------------------------- Dashboard Admin Action --------------------------------
// แสดงข้อมูล
Route::get('/dashboard', 'AdminController@dashboard_user');
Route::get('/dashboard/post', 'AdminController@dashboard_post');
Route::get('/dashboard/news', 'AdminController@dashboard_news');
Route::get('/dashboard/comments', 'AdminController@dashboard_comment');

// จัดการลบข้อมูล
Route::get('/dashboard/confirm-delete-user/{id}', 'AdminController@dashboard_delete_user');
Route::get('/dashboard/confirm-delete-post/{id}', 'AdminController@dashboard_delete_post');
Route::get('/dashboard/confirm-delete-news/{id}', 'AdminController@dashboard_delete_news');
Route::get('/dashboard/confirm-delete-comments/{id}', 'AdminController@dashboard_delete_comment');


