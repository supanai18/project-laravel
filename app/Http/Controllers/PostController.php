<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;

class PostController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  // ดึงอบรมของ user
  public function post_details($id) {
    $post_details = Post::where('id', $id)->where('user_id', Auth::user()->id)->get();

    return view('post.post_details', compact('post_details'));
  }

  // ลิงก์ไปหน้า form_create_post.blade.php
  public function form_create_post() {
    return view('post.form_create');
  }

  // ยืนยันการส่งฟอร์ม form_create_post.blade.php
  public function create_post(Request $request) {
    if($request->hasFile('post_image')){
      $filenameWithExt = $request->file('post_image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('post_image')->getClientOriginalExtension();
      $fileNameToStore = time().'.'.$extension;
      $path = $request->file('post_image')->move('upload/post/',$fileNameToStore);
    }

    $add_post = new Post();
    $add_post->user_id = Auth::user()->id;
    if($request->hasFile('post_image')){
      $add_post->post_image = $fileNameToStore;
    }
    $add_post->post_title = $request->post_title;
    $add_post->post_intro = $request->post_intro;
    $add_post->post_description = $request->post_description;
    $add_post->post_creator = $request->post_creator;
    $add_post->post_address = $request->post_address;
    $add_post->post_status = $request->post_status;
    $add_post->post_rate = $request->post_rate;
    $add_post->post_start = $request->post_start;
    $add_post->post_end = $request->post_end;
    $add_post->post_view = 0;
    $add_post->post_like = 0;
    $add_post->post_unlike = 0;
    $add_post->save();

    return redirect('/profile')->with('success', 'สร้างอบรม-สัมมนา(มีค่าใช้จ่าย) สำเร็จ');
  }

  // ลิงก์ไปหน้าฟอร์ม form_update_post.blade.php
  public function form_update_post($id) {
    $form_update_post = Post::where('id', $id)->where('user_id', Auth::user()->id)->get();

    return view('post.form_update', compact('form_update_post'));
  }

  // ยืนยันส่งฟอร์ม form_update_post.blade.php
  public function update_post(Request $request, $id) {
    if($request->hasFile('post_image')){
      $filenameWithExt = $request->file('post_image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('post_image')->getClientOriginalExtension();
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      $path = $request->file('post_image')->move('upload/post/',$fileNameToStore);
    }

    if($request->post_image != '') {
      $post = Post::find($id);
      $post_image = 'upload/post/'.$post->post_image;
      if (file_exists($post_image)) {
         @unlink($post_image);
      }
    }

    $update_post = Post::find($id);
    $update_post->user_id = Auth::user()->id;
    if($request->hasFile('post_image')){
      $update_post->post_image = $fileNameToStore;
    }
    $update_post->post_title = $request->post_title;
    $update_post->post_intro = $request->post_intro;
    $update_post->post_description = $request->post_description;
    $update_post->post_creator = $request->post_creator;
    $update_post->post_address = $request->post_address;
    $update_post->post_status = $request->post_status;
    $update_post->post_rate = $request->post_rate;
    $update_post->post_start = $request->post_start;
    $update_post->post_end = $request->post_end;
    $update_post->save();

    return redirect("/post-details-auth/$id")->with('success', 'แก้ไขอบรม-สัมมนา(มีค่าใช้จ่าย) สำเร็จ');
  }

  // ทำการลบอบรมตาม id
  public function delete_post($id) {
    $delete_post = Post::find($id);
    $delete_post->delete();

    $post_image = 'upload/post/'.$delete_post->post_image;
    if (file_exists($post_image)) {
       @unlink($post_image);
    }

    return redirect('/profile')->with('success', 'ลบอบรม-สัมมนา(มีค่าใช้จ่าย) สำเร็จ');
  }
}
