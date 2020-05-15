<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use DB;
use App\Post;
use App\Comments;
use App\News;

class HomeController extends Controller
{
  public function index() {
    $events = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->orderBy('posts.created_at', 'desc')
            ->get();
    $event_list = [];

    foreach ($events as $key => $event) {
      $event_list[] = Calendar::event(
        $event->post_title,
        true,
        new \DateTime($event->post_start_date),
        new \DateTime($event->post_end_date.' +1 day'),
        $event->id,
        [
          'color' => '#015dd5',
          'textColor' => '#ffffff',
        ]
      );
    }

    $calendar_details = Calendar::addEvents($event_list)->setCallbacks([
                                'themeSystem' => '"bootstrap4"',
                                'eventRender' => 'function(event, element) {
                                  element.popover({
                                    animation: true,
                                    html: true,
                                    content: $(element).html(),
                                    trigger: "hover"
                                    });
                                  }'
                                ]);
    
    $post = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(9);

    return view('home', compact('post', 'calendar_details'));
    // return response()->json($calendar_details);
  }

  public function training() {
    $events = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('posts.post_status', 'เสียค่าธรรมเนียม')
            ->whereNotIn('post_rate', [0])
            ->orderBy('posts.created_at', 'desc')
            ->get();
    $event_list = [];

    foreach ($events as $key => $event) {
      $event_list[] = Calendar::event(
        $event->post_title,
        true,
        new \DateTime($event->post_start),
        new \DateTime($event->post_end.' +1 day'),
        $event->id,
        [
          'color' => '#015dd5',
          'url' => url("/post/".$event->id."/".$event->post_title),
          'textColor' => '#ffffff',
        ]
      );
    }

    $calendar_details = Calendar::addEvents($event_list)->setCallbacks([
                                'themeSystem' => '"bootstrap4"',
                                'eventRender' => 'function(event, element) {
                                  element.popover({
                                    animation: true,
                                    html: true,
                                    content: $(element).html(),
                                    trigger: "hover"
                                    });
                                  }'
                                ]);
    
    $post = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('posts.post_status', 'เสียค่าธรรมเนียม')
            ->whereNotIn('post_rate', [0])
            ->orderBy('posts.created_at', 'desc')
            ->paginate(9);

    return view('training', compact('post', 'calendar_details'));
  }

  public function training_free() {
    $events = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('posts.post_status', 'ฟรี')
            ->whereNotIn('post_rate', [0])
            ->orderBy('posts.created_at', 'desc')
            ->get();
    $event_list = [];

    foreach ($events as $key => $event) {
      $event_list[] = Calendar::event(
        $event->post_title,
        true,
        new \DateTime($event->post_start),
        new \DateTime($event->post_end.' +1 day'),
        $event->id,
        [
          'color' => '#015dd5',
          'url' => url("/training/".$event->id."/".$event->post_title),
          'textColor' => '#ffffff',
        ]
      );
    }

    $calendar_details = Calendar::addEvents($event_list)->setCallbacks([
                                'themeSystem' => '"bootstrap4"',
                                'eventRender' => 'function(event, element) {
                                  element.popover({
                                    animation: true,
                                    html: true,
                                    content: $(element).html(),
                                    trigger: "hover"
                                    });
                                  }'
                                ]);

    $training_free = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.user_id')
                    ->where('posts.post_status', 'ฟรี')
                    ->whereNotIn('post_rate', [0])
                    ->orderBy('posts.created_at', 'desc')
                    ->paginate(9);

    return view('training_free', compact('training_free', 'calendar_details'));
  }

  // training details post #id
  public function training_details($id) {
    $update_view = Post::where('id', $id)->update(['post_view' => DB::raw('post_view+1')]);

    $details_post = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.user_id')
                    ->where('posts.id', $id)
                    ->where('posts.post_status', 'ฟรี')
                    ->get();

    $comments = DB::table('comments')
              ->join('posts', 'comments.post_id', '=', 'posts.id')
              ->join('users', 'comments.user_id', '=', 'users.id')
              ->where('post_id', $id)
              ->get();

    return view('training_details.training_details', compact('details_post', 'comments'));
  }

  public function news() {
    $news = DB::table('users')
            ->join('news', 'users.id', '=', 'news.user_id')
            ->orderBy('news.created_at', 'desc')
            ->paginate(9);

    return view('news', compact('news'));
  }

  public function news_details($id) {
    $update_news = News::where('id', $id)->update(['news_view' => DB::raw('news_view+1')]);

    $news_details = DB::table('users')
                    ->join('news', 'users.id', '=', 'news.user_id')
                    ->where('news.id', $id)
                    ->get();

    return view('news_details.news_details', compact('news_details'));
  }

  // details post #id
  public function details_post($id) {
    $update_view = Post::where('id', $id)->update(['post_view' => DB::raw('post_view+1')]);

    $details_post = DB::table('users')
              ->join('posts', 'users.id', '=', 'posts.user_id')
              ->where('posts.post_status', 'เสียค่าธรรมเนียม')
              ->where('posts.id', $id)
              ->get();

    $comments = DB::table('comments')
              ->join('posts', 'comments.post_id', '=', 'posts.id')
              ->join('users', 'comments.user_id', '=', 'users.id')
              ->select('*', 'comments.id', 'posts.id as post_id', 'users.id as user_id')
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
