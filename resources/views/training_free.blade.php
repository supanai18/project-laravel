@extends('layout.main')
@section('title', 'อบรมฟรี-สัมมนาฟรี :')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')

<div class="d-flex justify-content-between">
  <h6 class="m-0 font-weight-bold text-active">หน้าแรก</h6>
  <a href="" class="m-0 font-weight-bold text-active" data-toggle="modal" data-target="#calendar"><i class="fas fa-calendar-alt"></i> ปฎิทินการรับสมัคร</a>
</div>
<div class="modal fade" id="calendar" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ปฎิทินการรับสมัคร</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      {!! $calendar_details->calendar() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-trainning" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
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
        <div class="text-left">
          <span class="text-color-app text-small max-line-one"><i class="fas fa-user color-app"></i> ผู้โพสต์: {{ $data->name }}</span>
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar_details->script() !!}
@endsection