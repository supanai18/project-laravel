@extends('layout.main')

@section('content')

<!-- post -->
<div class="card shadow mb-4">
@foreach($form_update_post as $data)
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p>
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/post-details-auth/'.$data->id) }}">{{ $data->post_title }}</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p>
      <h6 class="m-0 font-weight-bold text-active">ฟอร์มแก้ไขอบรม-สัมมนา(มีค่าใช้จ่าย)</h6>
    </div>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('/confirm-update-post-auth/'.$data->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <center>
        <img src="{{ asset('upload/post/'.$data->post_image) }}" alt="Avatar" width="50%">
      </center>
      <p class="font-weight-bold">ข้อมูลการอบรม</p>
      <div class="form-group">
        <label>รูปปก <span class="text-red">*</span></label>
        <input type="file" class="form-control" name="post_image" value="{{ $data->post_image }}">
      </div>
      <div class="form-group">
        <label>หัวเรื่อง <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_title" value="{{ $data->post_title }}" placeholder="ระบุหัวเรื่อง" required>
      </div>
      <div class="form-group">
        <label>เกริ่นนำ <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_intro" value="{{ $data->post_intro }}" placeholder="ระบุเกริ่นนำ" required>
      </div>
      <div class="form-group">
        <label>รายละเอียด <span class="text-red">*</span></label>
        <textarea class="form-control" rows="6" name="post_description" value="{{ $data->post_description }}" required>{{ $data->post_description }}</textarea>
      </div>
      <div class="form-group">
        <label>จัดทำโดย <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_creator" value="{{ $data->post_creator }}" placeholder="ระบุผู้จัดทำ" required>
      </div>
      <div class="form-group">
        <label>สถานที่จัดอบรม <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_address" value="{{ $data->post_address }}" placeholder="ระบุผู้สถานที่จัดอบรม" required>
      </div>
      <div class="form-group">
        <label>อัตราสมัคร (จำนวนคน) <span class="text-red">*</span></label>
        <input type="number" class="form-control" name="post_rate" value="{{ $data->post_rate }}" placeholder="ระบุอัตรา" required>
      </div>
      <div class="form-group">
        <label>ค่าธรรมเนียม: <span class="text-red">*</span></label>
        <select class="form-control" value="{{ $data->post_status }}" name="post_status" required id="selected_post">
          <option value="{{ $data->post_status }}" selected>{{ $data->post_status }}</option>
          <option value="ฟรี">ฟรี</option>
          <option value="เสียค่าธรรมเนียม">เสียค่าธรรมเนียม</option>
        </select>
      </div>
      <div id="post_price" class="form-group">
        <label>ราคาคอร์ส: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_price" placeholder="ระบุราคาคอร์ส">
      </div>
      <div id="post_payment" class="form-group">
        <label>ช่องทางการชำระเงิน เช่น - ธนาคาร ชื่อบัญชี เลข: <span class="text-red">*</span></label>
        <textarea class="form-control" rows="6" name="post_payment" placeholder="ระบุช่องทางการชำระเงิน">{{ $data->post_payment }}</textarea>
      </div>
      <div class="form-group">
        <label>วันที่เปิดรับสมัคร <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_start" value="{{ $data->post_start }}" placeholder="ระบุวันที่เปิดรับสมัคร" required>
      </div>
      <div class="form-group">
        <label>วันที่ปิดรับสมัคร <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_end" value="{{ $data->post_end }}" placeholder="ระบุวันที่ปิดรับสมัคร" required>
      </div>
      <br />
      <hr />
      <br />
      <p class="font-weight-bold">รายละเอียดการอบรม</p>
      <div class="form-group">
        <label>ระยะเวลาการอบรม: <span class="text-red">*</span></label>
        <select class="form-control" name="post_date" value="{{ $data->post_date }}" id="selected_post_date" required>
          <option value="{{ $data->post_date }}" selected>{{ $data->post_date }}</option>
          <option value="0.5">ครึ่งวัน</option>
          <option value="1">1 วัน</option>
          <option value="2">2 วัน</option>
          <option value="3">3 วัน</option>
          <option value="มากกว่า 3">มากกว่า 3 วัน</option>
        </select>
      </div>
      <div class="form-group" id="post_start_date">
        <label>เริ่มวันที่: <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_start_date" value="{{ $data->post_start_date }}" placeholder="ระบุวันที่เริ่มจัดอบรม">
      </div>
      <div class="form-group" id="post_start_time">
        <label>เริ่มเวลา: <span class="text-red">*</span></label>
        <input type="time" class="form-control" name="post_start_time" value="{{ $data->post_start_time }}" placeholder="ระบุเวลาเริ่มจัดอบรม">
      </div>
      <div class="form-group" id="post_end_date">
        <label>สิ้นสุดวันที่: <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_end_date" value="{{ $data->post_end_date }}" placeholder="ระบุวันที่สิ้นสุดจัดอบรม">
      </div>
      <div class="form-group" id="post_end_time">
        <label>สิ้นสุดเวลา: <span class="text-red">*</span></label>
        <input type="time" class="form-control" name="post_end_time" value="{{ $data->post_end_time }}" placeholder="ระบุเวลาสิ้นสุดจัดอบรม">
      </div>
      <br />
      <hr />
      <br />
      <p class="font-weight-bold">ข้อมูลส่วนบุคคล</p>
      <div class="form-group">
        <label>ชื่อ-สกุล: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_personal" value="{{ $data->post_personal }}" placeholder="ระบุชื่อ-สกุล" required>
      </div>
      <div class="form-group">
        <label>บัตรประชาชน: <span class="text-red">*</span></label>
        <input type="file" class="form-control-file" name="post_id_card" value="{{ $data->post_id_card }}" placeholder="ระบุไฟล์บัตรประชาชน">
      </div>
      <div class="form-group">
        <label>ใบประกอบอาชีพ: <span class="text-red">*</span></label>
        <input type="file" class="form-control-file" name="post_cert" value="{{ $data->post_cert }}" placeholder="ระบุไฟล์ใบประกอบอาชีพ" >
      </div>
      <div class="form-group">
        <label>ที่อยู่: <span class="text-red">*</span></label>
        <textarea type="text" class="form-control" name="post_per_address" placeholder="ระบุที่อยู่" rows="4" required>{{ $data->post_per_address }}</textarea>
      </div>
      <div class="form-group">
        <label>เบอร์โทรศัพท์: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_tel" value="{{ $data->post_tel }}" placeholder="ระบุเบอร์โทรศัพท์" required>
      </div>
      <button type="submit" class="btn btn-primary">อัพเดท</button>
    </form>
  </div>
@endforeach
</div>

@endsection