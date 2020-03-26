<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\News;

class NewController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function news_details($id) {
    $news_details = News::where('user_id', Auth::user()->id)->where('id', $id)->get();

    return view('news.news_details', compact('news_details'));
  }

  public function form_create_news() {
    return view('news.form_create_news');
  }

  public function confirm_create_news(Request $request) {
    if($request->hasFile('news_image')){
      $filenameWithExt = $request->file('news_image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('news_image')->getClientOriginalExtension();
      $fileNameToStore = time().'.'.$extension;
      $path = $request->file('news_image')->move('upload/new/',$fileNameToStore);
    }

    $confirm_create_news = new News();
    if($request->hasFile('news_image')){
      $confirm_create_news->news_image = $fileNameToStore;
    }
    $confirm_create_news->user_id = Auth::user()->id;
    $confirm_create_news->news_title = $request->news_title;
    $confirm_create_news->news_intro = $request->news_intro;
    $confirm_create_news->news_description = $request->news_description;
    $confirm_create_news->news_creator = $request->news_creator;
    $confirm_create_news->news_view = 0;
    $confirm_create_news->save();

    return redirect('/profile')->with('success', 'สร้างข่าวประชาสัมพันธ์สำเร็จ');
  }

  public function form_update_news($id) {
    $form_update_news = News::where('id', $id)->get();

    return view('news.form_update_news', compact('form_update_news'));
  }

  public function confirm_update_news(Request $request, $id) {
    if($request->hasFile('news_image')){
      $filenameWithExt = $request->file('news_image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('news_image')->getClientOriginalExtension();
      $fileNameToStore = time().'.'.$extension;
      $path = $request->file('news_image')->move('upload/new/',$fileNameToStore);
    }

    if($request->news_image != '') {
      $news = News::find($id);
      $news_image = 'upload/new/'.$news->news_image;
      if (file_exists($news_image)) {
         @unlink($news_image);
      }
    }

    $confirm_update_news = News::find($id);
    if($request->hasFile('news_image')){
      $confirm_update_news->news_image = $fileNameToStore;
    }
    $confirm_update_news->user_id = Auth::user()->id;
    $confirm_update_news->news_title = $request->news_title;
    $confirm_update_news->news_intro = $request->news_intro;
    $confirm_update_news->news_description = $request->news_description;
    $confirm_update_news->news_creator = $request->news_creator;
    $confirm_update_news->save();

    return redirect("/news-details-auth/$id")->with('success', 'แก้ไขข่าวประชาสัมพันธ์สำเร็จ');
  }

  public function confirm_delete_news($id) {
    $confirm_delete_news = News::find($id);
    $confirm_delete_news->delete();

    $news_image = 'upload/new/'.$confirm_delete_news->news_image;
    if (file_exists($news_image)) {
       @unlink($news_image);
    }

    return redirect('/profile')->with('success', 'ลบข่าวประชาสัมพันธ์สำเร็จ');
  }
}
