@extends('layout.main')

@section('content')

<!-- post -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/cart') }}">รถเข็นของฉัน</a>
      </h6>
      <p class="slash">/</p>
      @foreach($post_details as $data)
      <h6 class="m-0 font-weight-bold text-active">{{ $data->post_title }}</h6>
      @endforeach
    </div>
  </div>
  <div class="card-body">
    @foreach($post_details as $data)
      <center class="layout-image-post">
        <div class="container-post-profile">
          <img src="{{ asset('upload/post/'.$data->post_image) }}" alt="Avatar" width="50%">
        </div>
        <div class="layout-post-description">
          <h3>{{ $data->post_title }}</h3>
          {!! $data->post_description !!}
          <span style="font-weight: bolder;">จำนวนอัตราที่เปิดรับสมัคร:</span>
          <p>{{ $data->post_rate }} อัตรา</p>
          <span style="font-weight: bolder;">เปิดรับสมัครตั้งแต่วันที่:</span>
          <p>{{ $data->post_start }}</p>
          <span style="font-weight: bolder;">ปิดรับสมัครวันที่:</span>
          <p>{{ $data->post_end }}</p>
          <br />
          <span style="font-weight: bolder;">จัดทำโดย:</span>
          <p>{{ $data->post_creator }}</p>
        </div>
      </center>
    @endforeach
  </div>
</div>

@endsection