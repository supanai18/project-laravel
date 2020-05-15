@extends('layout.main')

@section('title', 'ชำระเงิน :')

@section('content')
<div class="flex-row">
  <h6 class="m-0">
    <a class="text-inactive" href="{{ url('/cart') }}">รถเข็นของฉัน</a>
  </h6>
  <p class="slash"><i class="fas fa-caret-right"></i></p>
  <h6 class="m-0 font-weight-bold text-active">ชำระเงิน</h6>
</div>
<div class="card shadow layout-card">
  <div class="card-body">
    <div class="row">
    @foreach($form_create_payment as $data)
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-app">
        <div class="card">
          <img class="card-img-top" src="{{ asset('upload/post/'.$data->post_image) }}" alt="$data->post_title" width="100%">
          <div class="card-body">
            <span class="font-weight-bold color-app">{{ $data->post_title }}</span>
            <div>
              <span>สถานะ: {{ $data->training_status }}</span>
            </div>
            <br />
            <div>
              <span>รายละเอียด: {{ $data->post_description }}</span>
            </div>
          </div>
        </div>
        <br />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-app">
        <form method="POST" action="{{ url('/confirm-payment/'.$data->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group">
            <label class="mr-sm-2">แนบไฟล์: <span class="text-red">*</span></label>
            <input type="file" class="form-control mb-2 mr-sm-2" name="payment_file" required>
          </div>
          <center>
            <button type="submit" class="btn btn-app">ยืนยันการชำระ</button>
          </center>
        </form>
        <hr />
        <div class="card">
          <div class="card-body">
            <span class="font-weight-bold">ช่องทางการชำระเงิน</span>
            <br />
            <textarea class="form-control payment" rows="6" disabled>{{ $data->post_payment }}</textarea>
            <!-- <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-app">
                <img src="{{ asset('upload/image/ktb.jpg') }}" width="100%" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-app">
                <span>ธ.กรุงไทย</span>
                <div>
                  <span>0000-0000-0000-0000</span>
                </div>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-app">
                <img src="{{ asset('upload/image/scb.jpg') }}" width="100%" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-app">
                <span>ธ.ไทยพาณิชย์</span>
                <div>
                  <span>0000-0000-0000-0000</span>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>
<br />
@endsection