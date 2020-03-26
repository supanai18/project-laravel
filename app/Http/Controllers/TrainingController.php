<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;
use App\Training;

class TrainingController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function confirm_register_training(Request $request, $post_id) {
    $confirm_register_training = new Training();
    $confirm_register_training->user_id = Auth::user()->id;
    $confirm_register_training->post_id = $post_id;
    $confirm_register_training->training_name = $request->training_name;
    $confirm_register_training->training_lastname = $request->training_lastname;
    $confirm_register_training->training_email = $request->training_email;
    $confirm_register_training->training_tel = $request->training_tel;
    $confirm_register_training->training_career = $request->training_career;
    $confirm_register_training->training_religion = $request->training_religion;
    $confirm_register_training->training_status = 'รอการชำระเงิน';
    $confirm_register_training->save();

    $update_post = Post::where('id', $post_id)->update(['post_rate' => DB::raw('post_rate-1')]);

    return redirect()->back()->with('success', 'สมัครอบรมสำเร็จ กรุณาชำระเงินที่รายการรถเข็นของท่าน');
  }

  public function confirm_register_training_free(Request $request, $post_id) {
    $confirm_register_training = new Training();
    $confirm_register_training->user_id = Auth::user()->id;
    $confirm_register_training->post_id = $post_id;
    $confirm_register_training->training_name = $request->training_name;
    $confirm_register_training->training_lastname = $request->training_lastname;
    $confirm_register_training->training_email = $request->training_email;
    $confirm_register_training->training_tel = $request->training_tel;
    $confirm_register_training->training_career = $request->training_career;
    $confirm_register_training->training_religion = $request->training_religion;
    $confirm_register_training->training_status = 'ผ่านการอนุมัติ';
    $confirm_register_training->save();

    $update_post = Post::where('id', $post_id)->update(['post_rate' => DB::raw('post_rate-1')]);

    return redirect()->back()->with('success', 'สมัครอบรมสำเร็จ สามารถตรวจสอบที่รถเข็น รายการสำเร็จ');
  }
}
