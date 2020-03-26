<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Contact;

class ContactController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function create_contact(Request $request) {
    $create_contact = new Contact();
    $create_contact->user_id = Auth::user()->id;
    $create_contact->contact_name = $request->contact_name;
    $create_contact->contact_email = $request->contact_email;
    $create_contact->contact_description = $request->contact_description;
    $create_contact->save();

    return redirect('/contact')->with('success', 'ติดต่อสอบถามสำเร็จ');
  }
}
