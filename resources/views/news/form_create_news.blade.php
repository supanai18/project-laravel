@extends('layout.main')

@section('content')

<!-- news -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p>
      <h6 class="m-0 font-weight-bold text-active">ฟอร์มสร้างข่าวประชาสัมพันธ์</h6>
    </div>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('/confirm-create-news-auth') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="form-group">
        <label>รูปปก: <span class="text-red">*</span></label>
        <input type="file" class="form-control" name="news_image" required>
      </div>
      <div class="form-group">
        <label>หัวเรื่อง: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="news_title" placeholder="ระบุหัวเรื่อง" required>
      </div>
      <div class="form-group">
        <label>เกริ่นนำ: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="news_intro" placeholder="ระบุเกริ่นนำ" required>
      </div>
      <div class="form-group">
        <label>รายละเอียด: <span class="text-red">*</span></label>
        <textarea class="form-control" rows="6" name="news_description" required></textarea>
      </div>
      <div class="form-group">
        <label>จัดทำโดย: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="news_creator" placeholder="ระบุผู้จัดทำ" required>
      </div>
      <button type="submit" class="btn btn-primary">สร้าง</button>
    </form>
  </div>
</div>

@endsection