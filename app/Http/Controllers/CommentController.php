<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Comments;
use App\Post;

class CommentController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function confirm_comment(Request $request, $id, $title) {
    $confirm_comment = new Comments();
    $confirm_comment->user_id = Auth::user()->id;
    $confirm_comment->post_id = $id;
    $confirm_comment->comment = $request->comment;
    $confirm_comment->save();

    return redirect()->back()->with('success', 'ความคิดเห็นของท่านถูกส่งเป็นที่เรียบร้อย');
  }

  public function delete_comment($id) {
    $delete_comment = Comments::find($id);
    $delete_comment->delete();

    return redirect()->back()->with('success', 'ลบความคิดเห็นท่านเรียบร้อย');
  }
}
