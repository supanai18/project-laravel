@extends('layout.main')
@section('title', 'อบรมฟรี-สัมมนาฟรี :')
@section('content')

<div class="flex-row">
  <h6 class="m-0 font-weight-bold text-active">อบรมฟรี-สัมมนาฟรี</h6>
</div>
<br />
<div class="row">
  @foreach($training_free as $key=>$data)
  <div class="col-lg-4 col-md-4 col-sm-12 col-12 layout">
    <div class="card" style="width: 100%;">
      <a href="{{ url('/training/'.$data->id.'/'.$data->post_title) }}">
        <div class="container-post-profile">
          <img class="card-img-top" src="{{ asset('upload/post/'.$data->post_image) }}" alt="{{ $data->post_title }}">
          <div class="overlay">
            <div class="text">{{ $data->post_title }}</div>
          </div>
          <div class="overlay-button">
            <a class="btn button-free">{{ $data->post_status }}</a>
          </div>
        </div>
      </a>
      <div class="background-black text-center">
        <span class="text-small text-white">
          <i class="fas fa-calendar-alt"></i> 
          {{ date('d-m-Y', strtotime($data->post_start) )}} - {{ date('d-m-Y', strtotime($data->post_end) )}}
        </span>
      </div>
      <div class="card-body">
        <a href="{{ url('/training/'.$data->id.'/'.$data->post_title) }}">
          <p class="card-text font-weight-bold text-color-app min-h75 text-truncate-h40">{{ $data->post_title }}</p>
        </a>
        <span class="text-small text-black max-line-two">{{ $data->post_intro }}</span>
      </div>
      <div class="card-body">
        <div class="text-left">
          <span class="text-color-app text-small max-line-one"><i class="fas fa-flag color-app"></i> จัดโดย: {{ $data->post_creator }}</span>
        </div>
        <br />
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
            <a href="{{ url('/training/'.$data->id.'/'.$data->post_title) }}" class="btn btn-sm btn-trainning">
            สมัครอบรม
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
            <a class="btn btn-sm"><i class="fas fa-heart text-app"></i> View {{ $data->post_view }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div>
{!! $training_free->render() !!}
</div>

@endsection