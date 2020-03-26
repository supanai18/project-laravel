<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Comments;
use App\News;

class HomeController extends Controller
{
  public function index() {
    $post = Post::where('post_status', 'เสียค่าธรรมเนียม')->orderBy('created_at', 'desc')->paginate(9);

    return view('home', compact('post'));
  }

  public function training_free() {
    $training_free = Post::where('post_status', 'ฟรี')->orderBy('created_at', 'desc')->paginate(9);

    return view('training_free', compact('training_free'));
  }

  // training details post #id
  public function training_details($id) {
    $update_view = Post::where('id', $id)->update(['post_view' => DB::raw('post_view+1')]);

    $details_post = Post::where('id', $id)->where('post_status', 'ฟรี')->get();

    $comments = DB::table('posts')
              ->join('users', 'posts.user_id', '=', 'users.id')
              ->join('comments', 'posts.id', '=', 'comments.post_id')
              ->where('post_id', $id)
              ->get();

    return view('training_details.training_details', compact('details_post', 'comments'));
  }

  public function news() {
    $news = News::orderBy('created_at', 'desc')->paginate(9);

    return view('news', compact('news'));
  }

  public function news_details($id) {
    $update_news = News::where('id', $id)->update(['news_view' => DB::raw('news_view+1')]);

    $news_details = News::where('id', $id)->get();

    return view('news_details.news_details', compact('news_details'));
  }

  // details post #id
  public function details_post($id) {
    $update_view = Post::where('id', $id)->update(['post_view' => DB::raw('post_view+1')]);

    $details_post = Post::where('id', $id)->where('post_status', 'เสียค่าธรรมเนียม')->get();

    $comments = DB::table('posts')
              ->join('users', 'posts.user_id', '=', 'users.id')
              ->join('comments', 'posts.id', '=', 'comments.post_id')
              ->where('post_id', $id)
              ->get();

    return view('post_details.post_details', compact('details_post', 'comments'));
  }

  // post like
  public function post_like($id) {
    $post_like = Post::where('id', $id)->update(['post_like' => DB::raw('post_like+1')]);

    return redirect()->back()->with('success', 'ท่านได้กดถูกใจรายการดังกล่าว ขอบคุณครับ/ค่ะ');
  }

  // post unlike
  public function post_unlike($id) {
    $post_unlike = Post::where('id', $id)->update(['post_unlike' => DB::raw('post_unlike+1')]);

    return redirect()->back()->with('success', 'ท่านได้กดไม่ถูกใจรายการดังกล่าว ทางทีมงานจะนำไปปรับปรุงแก้ไขต่อไป ขอบคุณครับ/ค่ะ');
  }
}
