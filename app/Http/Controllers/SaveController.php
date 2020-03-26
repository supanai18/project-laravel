<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;
use App\Save;

class SaveController extends Controller
{
  public function confirm_save($id) {
    $confirm_save = new Save();
    $confirm_save->user_id = Auth::user()->id;
    $confirm_save->post_id = $id;
    $confirm_save->save();

    return redirect('/list')->with('success', 'ท่านได้บันทึกเก็บลงในรายการเสร็จสิ้น');
  }

  public function delete_save($id) {
    $delete_save = Save::find($id);
    $delete_save->delete();

    return redirect()->back()->with('success', 'ท่านได้ลบออกจากรายการ');
  }
}
