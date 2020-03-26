<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Post;
use App\News;
use App\Training;
use App\Payment;
use App\Comments;
use App\Save;

class UserController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function data_user() {
    $data_user = User::where('id', Auth::user()->id)->get();

    $data_post = Post::where('user_id', Auth::user()->id)->whereIn('post_status', ['เสียค่าธรรมเนียม', 'ฟรี'])->orderBy('created_at', 'desc')->paginate(6);
    $data_news = News::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(6);

    $data_post_count = Post::where('user_id', Auth::user()->id)->count();
    $data_news_count = News::where('user_id', Auth::user()->id)->count();

    $data_training_count = Training::where('user_id', Auth::user()->id)
                                  ->where('training_status', 'รอการชำระเงิน')
                                  ->count();

    return view('user.profile', compact('data_user', 'data_post', 'data_news', 'data_post_count', 'data_news_count', 'data_training_count'));
  }

  public function cart() {
    $cart = DB::table('posts')
          ->join('trainings', 'trainings.post_id', '=', 'posts.id')
          ->where('trainings.user_id', Auth::user()->id)
          ->where('trainings.training_status', 'รอการชำระเงิน')
          ->get();

    $payment = DB::table('trainings')
            ->join('posts', 'trainings.post_id', '=', 'posts.id')
            ->join('payments', 'payments.training_id', '=', 'trainings.id')
            ->where('trainings.training_status', 'รอการอนุมัติจากเจ้าหน้าที่')
            ->where('payments.user_id', Auth::user()->id)
            ->get();

    $post = DB::table('posts')
            ->join('trainings', 'trainings.post_id', '=', 'posts.id')
            ->where('trainings.user_id', Auth::user()->id)
            ->where('trainings.training_status', 'ผ่านการอนุมัติ')
            ->get();

    return view('user.cart', compact('cart', 'payment', 'post'));
  }

  public function list() {
    $comments = DB::table('posts')
              ->join('users', 'posts.user_id', '=', 'users.id')
              ->join('comments', 'posts.id', '=', 'comments.post_id')
              ->where('comments.user_id', Auth::user()->id)
              ->get();

    $save = DB::table('posts')
              ->join('users', 'posts.user_id', '=', 'users.id')
              ->join('saves', 'posts.id', '=', 'saves.post_id')
              ->where('saves.user_id', Auth::user()->id)
              ->get();

    return view('user.list', compact('comments', 'save'));
  }

  // details training fee
  public function training_details($id) {
    $post_details = DB::table('posts')
            ->join('trainings', 'trainings.post_id', '=', 'posts.id')
            ->where('trainings.user_id', Auth::user()->id)
            ->where('trainings.post_id', $id)
            ->where('trainings.training_status', 'ผ่านการอนุมัติ')
            ->get();

    return view('training.training_fee', compact('post_details'));
  }

  public function form_create_payment($training_id) {
    $form_create_payment = DB::table('posts')
          ->join('trainings', 'trainings.post_id', '=', 'posts.id')
          ->where('trainings.user_id', Auth::user()->id)
          ->where('trainings.training_status', 'รอการชำระเงิน')
          ->where('trainings.id', $training_id)
          ->get();

    return view('payment.form_create_payment', compact('form_create_payment'));
  }

  public function form_update_payment($payment_id) {
    $form_update_payment = DB::table('trainings')
            ->join('posts', 'trainings.post_id', '=', 'posts.id')
            ->join('payments', 'payments.training_id', '=', 'trainings.id')
            ->where('trainings.training_status', 'รอการอนุมัติจากเจ้าหน้าที่')
            ->where('payments.user_id', Auth::user()->id)
            ->where('payments.id', $payment_id)
            ->get();

    return view('payment.form_update_payment', compact('form_update_payment'));
  }
}
