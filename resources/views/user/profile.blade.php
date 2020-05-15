@extends('layout.main')

@section('content')
@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif

<!-- profile -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">โปรไฟล์</h6>
  </div>
  <div class="card-body">
    <div class="button-right">
      <a class="btn button-action" href="{{ url('/form-update-profile/'.Auth::user()->id) }}">แก้ไข</a>
    </div>
    <center>
      <img src="{{ Auth::user()->avatar }}" width="80px" height="80px" class="rounded-circle" />
      <p class="name-profile">{{ Auth::user()->name }}</p>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
          <p class="number-data">{{ $data_post_count }}</p>
          <a href="{{ url('/profile') }}">อบรม-สัมมนา</a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-4">
          <p class="number-data">{{ $data_news_count }}</p>
          <a href="{{ url('/profile') }}">ข่าวประชาสัมพันธ์</a>
        </div>
      </div>
    </center>
  </div>
</div>

<!-- post -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">อบรม-สัมมนา</h6>
  </div>
  <div class="card-body">
    <div class="button-right">
      <a class="btn button-action" href="{{ url('/form-create-post-auth') }}">เพิ่ม</a>
    </div>
    <div class="row">
    @forelse($data_post as $data)
      <div class="col-lg-4 col-md-4 col-sm-4 col-6 layout-image-post">
        <a href="{{ url('/post-details-auth/'.$data->id) }}">
          <div class="container-post-profile">
            <img src="{{ asset('upload/post/'.$data->post_image) }}" alt="Avatar" class="image">
            <div class="overlay">
              <div class="text">{{ $data->post_title }}</div>
            </div>
            @if($data->post_status == 'เสียค่าธรรมเนียม')
            <div class="overlay-button">
              <a class="btn button-fee">{{ $data->post_status }}</a>
            </div>
            @else
            <div class="overlay-button">
              <a class="btn button-free">{{ $data->post_status }}</a>
            </div>
            @endif
          </div>
        </a>
      </div>
    @empty
    <center>
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-nodata">
        <div>
          <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
        </div>
        <div>
          <span>ไม่พบรายการ</span>
        </div>
        <p class="nodata">nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata -
        nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata - 
        nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata -
        </p>
      </div>
    </center>
    @endforelse
    </div>
    {!! $data_post->render() !!}
  </div>
</div>

<!-- news -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ข่าวประชาสัมพันธ์</h6>
  </div>
  <div class="card-body">
    <div class="button-right">
      <a class="btn button-action" href="{{ url('/form-create-news-auth') }}">เพิ่ม</a>
    </div>
    <div class="row">
    @forelse($data_news as $data)
      <div class="col-lg-4 col-md-4 col-sm-4 col-6 layout-image-post">
        <a href="{{ url('/news-details-auth/'.$data->id) }}">
          <div class="container-post-profile">
            <img src="{{ asset('upload/new/'.$data->news_image) }}" alt="Avatar" class="image">
            <div class="overlay">
              <div class="text">{{ $data->news_title }}</div>
            </div>
          </div>
        </a>
      </div>
    @empty
    <center>
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-nodata">
        <div>
          <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
        </div>
        <div>
          <span>ไม่พบรายการ</span>
        </div>
        <p class="nodata">nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata -
        nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata - 
        nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata - nodata -
        </p>
      </div>
    </center>
    @endforelse
    </div>
    {!! $data_news->render() !!}
  </div>
</div>

@endsection