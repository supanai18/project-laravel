@extends('layout.main')
@section('title', 'ข่าวประชาสัมพันธ์ :')
@section('content')

<div class="flex-row">
  <h6 class="m-0 font-weight-bold text-active">ข่าวประชาสัมพันธ์</h6>
</div>
<br />
<div class="row">
  @foreach($news as $key=>$data)
  <div class="col-lg-4 col-md-4 col-sm-12 col-12 layout">
    <div class="card" style="width: 100%;">
      <a href="{{ url('/news/'.$data->id.'/'.$data->news_title) }}">
        <div class="container-post-profile">
          <img class="card-img-top" src="{{ asset('upload/new/'.$data->news_image) }}" alt="{{ $data->news_title }}">
          <div class="overlay">
            <div class="text">{{ $data->news_title }}</div>
          </div>
        </div>
      </a>
      <div class="card-body">
        <a href="{{ url('/news/'.$data->id.'/'.$data->news_title) }}">
          <p class="card-text font-weight-bold text-color-app min-h75 text-truncate-h40">{{ $data->news_title }}</p>
        </a>
        <span class="text-small text-black max-line-two">{{ $data->news_intro }}</span>
      </div>
      <div class="card-body">
        <div class="text-left">
          <span class="text-color-app text-small max-line-one"><i class="fas fa-flag color-app"></i> จัดโดย: {{ $data->news_creator }}</span>
        </div>
        <div class="text-left">
          <span class="text-color-app text-small max-line-one"><i class="fas fa-user color-app"></i> ผู้โพสต์: {{ $data->name }}</span>
        </div>
        <br />
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
            <a href="{{ url('/news/'.$data->id.'/'.$data->news_title) }}" class="btn btn-sm btn-trainning">
            รายละเอียด
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
            <a class="btn btn-sm"><i class="fas fa-heart text-app"></i> View {{ $data->news_view }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div>
{!! $news->render() !!}
</div>

@endsection