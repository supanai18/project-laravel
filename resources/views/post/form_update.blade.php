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
        <label>สถานะ:</label>
        <select class="form-control" value="{{ $data->post_status }}" name="post_status" required>
          <option value="{{ $data->post_status }}">{{ $data->post_status }}</option>
          <option value="ฟรี">ฟรี</option>
          <option value="เสียค่าธรรมเนียม">เสียค่าธรรมเนียม</option>
        </select>
      </div>
      <div class="form-group">
        <label>วันที่เปิดรับสมัคร <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_start" value="{{ $data->post_start }}" placeholder="ระบุวันที่เปิดรับสมัคร" required>
      </div>
      <div class="form-group">
        <label>วันที่ปิดรับสมัคร <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_end" value="{{ $data->post_end }}" placeholder="ระบุวันที่ปิดรับสมัคร" required>
      </div>
      <button type="submit" class="btn btn-primary">อัพเดท</button>
    </form>
  </div>
@endforeach
</div>

@endsection