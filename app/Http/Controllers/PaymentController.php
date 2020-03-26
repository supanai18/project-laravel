<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Payment;
use App\Training;

class PaymentController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
  
  public function confirm_payment(Request $request, $training_id) {
    if($request->hasFile('payment_file')){
      $filenameWithExt = $request->file('payment_file')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('payment_file')->getClientOriginalExtension();
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      $path = $request->file('payment_file')->move('upload/payment/',$fileNameToStore);
    }

    $confirm_payment = new Payment();
    $confirm_payment->user_id = Auth::user()->id;
    $confirm_payment->training_id = $training_id;
    if($request->hasFile('payment_file')){
      $confirm_payment->payment_file = $fileNameToStore;
    }
    $confirm_payment->save();

    $update_training = Training::where('id', $training_id)->update(['training_status' => 'รอการอนุมัติจากเจ้าหน้าที่']);

    return redirect('/cart')->with('success', 'แจ้งชำระเงินสำเร็จ');
  }

  public function confirm_update_payment(Request $request, $payment_id) {
    if($request->hasFile('payment_file')){
      $filenameWithExt = $request->file('payment_file')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('payment_file')->getClientOriginalExtension();
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      $path = $request->file('payment_file')->move('upload/payment/',$fileNameToStore);
    }

    if($request->payment_file != '') {
      $payment = Payment::find($payment_id);
      $payment_file = 'upload/payment/'.$payment->payment_file;
      if (file_exists($payment_file)) {
         @unlink($payment_file);
      }
    }

    $confirm_payment = Payment::find($payment_id);
    $confirm_payment->user_id = Auth::user()->id;
    if($request->hasFile('payment_file')){
      $confirm_payment->payment_file = $fileNameToStore;
    }
    $confirm_payment->save();

    return redirect('/cart')->with('success', 'แจ้งอัพเดทชำระเงินสำเร็จ');
  }
}
