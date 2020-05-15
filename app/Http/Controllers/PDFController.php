<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Auth;
use App\Post;
use App\News;
use App\Training;

class PDFController extends Controller
{
  public function dashboard_post_report() {
    if(Auth::user()->status == 'admin') {
      $post = DB::table('posts')
              ->join('trainings', 'posts.id', '=', 'trainings.post_id')
              ->select('*', 'posts.id', 'trainings.id as training_id', DB::raw('COUNT(trainings.post_id) as count'))
              ->where('trainings.training_status', 'ผ่านการอนุมัติ')
              ->groupBy('trainings.post_id')
              ->paginate(10);

      return view('admin.report_post', compact('post'));
      // return response()->json($post);
    } else {
      return redirect('/');
    }
  }

  public function report_post($id) {
    if(Auth::user()->status == 'admin') {
      $post = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->where('posts.id', $id)
                ->get();

      $pdf = PDF::loadView('admin.pdf_post', $post, compact('post'));

      return $pdf->stream('ReportPost.pdf');
      // return $pdf->download('ReportPost.pdf');
    } else {
      return redirect('/');
    }
  }

  public function report_post_all() {
    if(Auth::user()->status == 'admin') {
      $post = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->get();

      $pdf = PDF::loadView('admin.pdf_post', $post, compact('post'));

      return $pdf->stream('ReportPost.pdf');
      // return $pdf->download('ReportPost.pdf');
    } else {
      return redirect('/');
    }
  }

  public function dashboard_news() {
    if(Auth::user()->status == 'admin') {
      $news = News::paginate(10);

      return view('admin.report_new', compact('news'));
    } else {
      return redirect('/');
    }
  }

  public function report_news($id) {
    if(Auth::user()->status == 'admin') {
      $news = DB::table('users')
                ->join('news', 'users.id', '=', 'news.user_id')
                ->where('news.id', $id)
                ->get();

      $pdf = PDF::loadView('admin.pdf_news', $news, compact('news'));

      return $pdf->stream('ReportNews.pdf');
    } else {
      return redirect('/');
    }
  }

  public function report_news_all() {
    if(Auth::user()->status == 'admin') {
      $news = DB::table('users')
                ->join('news', 'users.id', '=', 'news.user_id')
                ->get();

      $pdf = PDF::loadView('admin.pdf_news', $news, compact('news'));

      return $pdf->stream('ReportNews.pdf');
    } else {
      return redirect('/');
    }
  }
}
