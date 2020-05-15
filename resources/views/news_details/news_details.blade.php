@extends('layout.main')

@foreach($news_details as $data)
  @section('title', $data->news_title)
@endforeach

@section('content')
<div class="flex-row">
  <h6 class="m-0">
    <a class="text-inactive" href="{{ url('/news') }}">ข่าวประชาสัมพันธ์</a>
  </h6>
  <p class="slash"><i class="fas fa-caret-right"></i></p>
  <h6 class="m-0 font-weight-bold text-active">หัวข้อข่าวประชาสัมพันธ์</h6>
</div>

@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif

@foreach($news_details as $data)
<div class="row">
  <div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <h3 class="text-app">หัวข้อ: {{ $data->news_title }}</h3>
    <br />
    <div>
      <img src="{{ asset('upload/new/'.$data->news_image) }}" width="100%" />
      <br />
      <span style="font-weight: bolder;">รายละเอียด:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->news_description }}</p>
    </div>
    <br />
  </div>
  <div class="col-lg-4 col-md-12 col-sm-12 col-12">
    <div class="card shadow layout-card">
      <div class="card-body">
        <div>
          <span><i class="fas fa-users text-app"></i> จัดโดย: {{ $data->news_creator }}</span>
        </div>
        <br />
        <div>
          <span><i class="fas fa-heart text-app"></i> ผู้เข้าชม: {{ $data->news_view }} ครั้ง</span>
        </div>
        <br />
        <br />
        <div>
          <a href="{{ url('/confirm-unlike-post/'.$data->id) }}">
            <span><i class="fas fa-user text-app"></i> ผู้โพสต์: {{ $data->name }}</span>
          </a>
        </div>
      </div>
    </div>
    <br/>
  </div>
</div>

@endforeach

@endsection