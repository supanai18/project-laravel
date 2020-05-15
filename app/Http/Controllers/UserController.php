<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    $data_payment_count = DB::table('payments')
                        ->join('trainings', 'payments.training_id', '=', 'trainings.id')
                        ->join('posts', 'trainings.post_id', '=', 'posts.id')
                        ->where('posts.user_id', Auth::user()->id)
                        ->where('trainings.training_status', 'รอการอนุมัติจากเจ้าหน้าที่')
                        ->count();

    $data_training_count = Training::where('user_id', Auth::user()->id)
                                  ->where('training_status', 'รอการชำระเงิน')
                                  ->count();

    return view('user.profile', compact('data_user', 'data_post', 'data_news', 'data_post_count', 'data_news_count', 'data_training_count', 'data_payment_count'));
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
    $comments = DB::table('comments')
              ->join('posts', 'comments.post_id', '=', 'posts.id')
              ->join('users', 'comments.user_id', '=', 'users.id')
              ->where('comments.user_id', Auth::user()->id)
              ->select('*', 'comments.id', 'posts.id as post_id', 'users.id as user_id')
              ->get();

    $save = DB::table('posts')
              ->join('users', 'posts.user_id', '=', 'users.id')
              ->join('saves', 'posts.id', '=', 'saves.post_id')
              ->where('saves.user_id', Auth::user()->id)
              ->get();

    return view('user.list', compact('comments', 'save'));
    // return response()->json($comments);
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

  public function form_update_profile($id) {
    $form_update_profile = User::where('id', $id)->get();

    return view('user.form_update', compact('form_update_profile'));
  }

  public function confirm_update_profile(Request $request, $id) {
    if($request->hasFile('avatar')){
      $filenameWithExt = $request->file('avatar')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('avatar')->getClientOriginalExtension();
      $fileNameToStore = time().'.'.$extension;
      $path = $request->file('avatar')->move('upload/photo/',$fileNameToStore);
    }
    
    $confirm_update_profile = User::find($id);
    $confirm_update_profile->name = $request->name;
    $confirm_update_profile->email = $request->email;
    $confirm_update_profile->password = Hash::make($request->password);
    if($request->hasFile('avatar')){
        $confirm_update_profile->avatar = "http://mgt2.pnu.ac.th/5960704008/post/upload/photo/$fileNameToStore";
    }
    $confirm_update_profile->save();

    return redirect('/profile')->with('success', 'แก้ไขโปรไฟล์สำเร็จ');
  }

  // รายชื่อผู้สมัครอบรม
  public function list_register_user() {
    $list_register_user = DB::table('trainings')
                          ->join('posts', 'trainings.post_id', '=', 'posts.id')
                          ->select(
                            'trainings.id',
                            'trainings.training_name',
                            'trainings.training_lastname',
                            'trainings.training_email',
                            'trainings.training_tel',
                            'trainings.training_career',
                            'trainings.training_religion',
                            'trainings.training_status',
                            'posts.id as post_id',
                            'posts.post_image',
                            'posts.post_title'
                          )
                          ->where('posts.user_id', Auth::user()->id)
                          ->orderBy('trainings.created_at', 'desc')
                          ->get();

    return view('user.listregister', compact('list_register_user'));
  }

  // จัดการยอดการชำระเงิน
  public function manage_payment() {
    $manage_payment = DB::table('payments')
                      ->join('trainings', 'payments.training_id', '=', 'trainings.id')
                      ->join('posts', 'trainings.post_id', '=', 'posts.id')
                      ->where('posts.user_id', Auth::user()->id)
                      ->where('trainings.training_status', 'รอการอนุมัติจากเจ้าหน้าที่')
                      ->paginate(10);

    return view('user.payment', compact('manage_payment'));
  }

  // อนุมัตการโอน
  public function confirm_manage_payment($training_id) {
    $update_training = Training::where('id', $training_id)->update(['training_status' => 'ผ่านการอนุมัติ']);

    return redirect()->back()->with('success', 'อนุมัตการโอนเรียบร้อย');
  }
}
