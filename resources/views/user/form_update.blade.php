@extends('layout.main')

@section('content')

<!-- post -->
<div class="card shadow mb-4">
@foreach($form_update_profile as $data)
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p> 
      <h6 class="m-0 font-weight-bold text-active">ฟอร์มแก้ไขโปรไฟล์</h6>
    </div>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('/confirm-update-profile/'.$data->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <center>
        <img src="{{ $data->avatar }}" alt="Avatar" width="20%">
      </center>
      <div class="form-group">
        <label>รูปปก <span class="text-red">*</span></label>
        <input type="file" class="form-control" name="avatar" value="{{ $data->avatar }}">
      </div>
      <div class="form-group">
        <label>ชื่อ <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="ระบุชื่อ" required>
      </div>
      <div class="form-group">
        <label>อีเมล์ <span class="text-red">*</span></label>
        <input type="email" class="form-control" name="email" value="{{ $data->email }}" placeholder="ระบุอีเมล์" required>
      </div>
      <div class="form-group">
        <label>รหัสผ่าน <span class="text-red">*</span></label>
        <input type="password" class="form-control" name="password" placeholder="ระบุรหัสผ่าน" required>
      </div>
      <button type="submit" class="btn btn-primary">อัพเดท</button>
    </form>
  </div>
@endforeach
</div>

@endsection