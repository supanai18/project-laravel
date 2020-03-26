<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Post;
use App\News;
use App\Contact;
use App\Comments;
use App\Payment;

class AdminController extends Controller
{
  // เช็คล็อกอิน
  public function __construct() {
    $this->middleware('auth');
  }

  // จัดการสมาชิก
  public function dashboard_user() {
    if(Auth::user()->status == 'admin') {
      $user = User::where('status', 'member')->paginate(10);

      return view('admin.dashboard', compact('user'));
    } else {
      return redirect('/');
    }
  }

  // จัดการลบสมาชิก
  public function dashboard_delete_user($id) {
    if(Auth::user()->status == 'admin') {
      $user = User::find($id);
      $user->delete();

      return redirect()->back()->with('success', 'ลบสมาชิกเรียบร้อย');
    } else {
      return redirect('/');
    }
  }

  // จัดการอบรม-สัมมนา
  public function dashboard_post() {
    if(Auth::user()->status == 'admin') {
      $post = Post::paginate(10);

      return view('admin.post', compact('post'));
    } else {
      return redirect('/');
    }
  }

  // จัดการลบอบรม-สัมมนา
  public function dashboard_delete_post($id) {
    if(Auth::user()->status == 'admin') {
      $post = Post::find($id);
      $post->delete();

      return redirect()->back()->with('success', 'ลบอบรม-สัมมนาเรียบร้อย');
    } else {
      return redirect('/');
    }
  }

  // จัดการข่าวประชาสัมพันธ์
  public function dashboard_news() {
    if(Auth::user()->status == 'admin') {
      $news = News::paginate(10);

      return view('admin.news', compact('news'));
    } else {
      return redirect('/');
    }
  }

  // จัดการลบข่าวประชาสัมพันธ์
  public function dashboard_delete_news($id) {
    if(Auth::user()->status == 'admin') {
      $news = News::find($id);
      $news->delete();

      return redirect()->back()->with('success', 'ลบข่าวประชาสัมพันธ์เรียบร้อย');
    } else {
      return redirect('/');
    }
  }

  // จัดการแสดงความคิดเห็น
  public function dashboard_comment() {
    if(Auth::user()->status == 'admin') {
      $comments = DB::table('posts')
                  ->join('users', 'posts.user_id', '=', 'users.id')
                  ->join('comments', 'posts.id', '=', 'comments.post_id')
                  ->paginate(10);

      return view('admin.comments', compact('comments'));
    } else {
      return redirect('/');
    }
  }

  // จัดการลบคอมเม้นท์
  public function dashboard_delete_comment($id) {
    if(Auth::user()->status == 'admin') {
      $comments = Comments::find($id);
      $comments->delete();

      return redirect()->back()->with('success', 'ลบแสดงความคิดเห็นเรียบร้อย');
    } else {
      return redirect('/');
    }
  }
}
