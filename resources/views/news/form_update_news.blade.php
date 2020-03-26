@extends('layout.main')

@section('content')

<!-- news -->
<div class="card shadow mb-4">
@foreach($form_update_news as $data)
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p>
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/news-details-auth/'.$data->id) }}">{{ $data->news_title }}</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p>
      <h6 class="m-0 font-weight-bold text-active">ฟอร์มแก้ไขข่าวประชาสัมพันธ์</h6>
    </div>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('/confirm-update-news-auth/'.$data->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="form-group">
        <label>รูปปก: <span class="text-red">*</span></label>
        <input type="file" class="form-control" value="{{ $data->news_image }}" name="news_image">
      </div>
      <div class="form-group">
        <label>หัวเรื่อง: <span class="text-red">*</span></label>
        <input type="text" class="form-control" value="{{ $data->news_title }}" name="news_title" placeholder="ระบุหัวเรื่อง" required>
      </div>
      <div class="form-group">
        <label>เกริ่นนำ: <span class="text-red">*</span></label>
        <input type="text" class="form-control" value="{{ $data->news_intro }}" name="news_intro" placeholder="ระบุเกริ่นนำ" required>
      </div>
      <div class="form-group">
        <label>รายละเอียด: <span class="text-red">*</span></label>
        <textarea class="form-control" rows="6" value="{{ $data->news_description }}" name="news_description" required>{{ $data->news_description }}</textarea>
      </div>
      <div class="form-group">
        <label>จัดทำโดย: <span class="text-red">*</span></label>
        <input type="text" class="form-control" value="{{ $data->news_creator }}" name="news_creator" placeholder="ระบุผู้จัดทำ" required>
      </div>
      <button type="submit" class="btn btn-primary">อัพเดท</button>
    </form>
  </div>
@endforeach
</div>

@endsection