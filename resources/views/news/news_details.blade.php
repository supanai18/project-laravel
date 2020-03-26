@extends('layout.main')

@section('content')
@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif

<!-- news -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash">/</p>
      @foreach($news_details as $data)
      <h6 class="m-0 font-weight-bold text-active">{{ $data->news_title }}</h6>
      @endforeach
    </div>
  </div>
  <div class="card-body">
    @foreach($news_details as $data)
      <div class="button-right">
        <a class="btn button-action" href="{{ url('/form-update-news-auth/'.$data->id) }}"><i class="fas fa-pen"></i></a>
        <button class="btn button-action" onclick="if (confirm('ยืนยันลบหรือไม่?')) { return location.href='{{ url('/confirm-delete-news-auth/'.$data->id) }}' };"><i class="fas fa-trash-alt"></i></button>
      </div>
      <center class="layout-image-post">
        <div class="container-post-profile">
          <img src="{{ asset('upload/new/'.$data->news_image) }}" alt="Avatar" width="50%">
        </div>
        <div class="layout-post-description">
          <h3>{{ $data->news_title }}</h3>
          <span style="font-weight: bolder;">รายละเอียด:</span>
          <p>{{ $data->news_description }}</p>
          <br />
          <span style="font-weight: bolder;">จัดทำโดย:</span>
          <p>{{ $data->news_creator }}</p>
        </div>
      </center>
    @endforeach
  </div>
</div>

@endsection