@extends('layout.main')

@section('content')
@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif

<!-- post -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash">/</p>
      @foreach($post_details as $data)
      <h6 class="m-0 font-weight-bold text-active">{{ $data->post_title }}</h6>
      @endforeach
    </div>
  </div>
  <div class="card-body">
    @foreach($post_details as $data)
      <div class="button-right">
        <a class="btn button-action" href="{{ url('/form-update-post-auth/'.$data->id) }}">แก้ไข</a>
        <button class="btn button-action" onclick="if (confirm('ยืนยันลบหรือไม่?')) { return location.href='{{ url('/confirm-delete-post-auth/'.$data->id) }}' };">ลบ</button>
      </div>
      <div class="layout-image-post">
        <div class="container-post-profile">
          <img src="{{ asset('upload/post/'.$data->post_image) }}" alt="Avatar" width="50%">
        </div>
        <div class="layout-post-description">
          <h3>{{ $data->post_title }}</h3>
          <span style="font-weight: bolder;">รายละเอียด:</span>
          <!-- <textarea class="form-control payment" rows="6" disabled>{{ $data->post_description }}</textarea> -->
          <div>
            <p>{{ $data->post_description }}</p>
          </div>
          <span style="font-weight: bolder;">จำนวนอัตราที่เปิดรับสมัคร:</span>
          <div>
            <p>{{ $data->post_rate }} อัตรา</p>
          </div>
          <span style="font-weight: bolder;">ช่องทางการชำระเงิน:</span>
          <div>
            <p>{{ $data->post_payment }}</p>
          </div>
          <span style="font-weight: bolder;">เปิดรับสมัครตั้งแต่วันที่:</span>
          <div>
            <p>{{ $data->post_start }}</p>
          </div>
          <span style="font-weight: bolder;">ปิดรับสมัครวันที่:</span>
          <div>
            <p>{{ $data->post_end }}</p>
          </div>
          <br />
          <span style="font-weight: bolder;">จัดทำโดย:</span>
          <div>
            <p>{{ $data->post_creator }}</p>
          </div>
        </div>
        <div class="layout-post-description">
          <hr />
          <div>
            <span style="font-weight: bolder;">รายละเอียดการอบรม</span>
          </div>
          <span style="font-weight: bolder;">ระยะเวลาในการจัดอบรม:</span>
          <div>
            <p>{{ $data->post_date }} วัน</p>
          </div>
          <span style="font-weight: bolder;">วัน/เวลาในการอบรม:</span>
          <div>
            <p>{{ $data->post_start_date }} {{ $data->post_start_time }} - {{ $data->post_end_date }} {{ $data->post_end_time }}</p>
          </div>
        </div>
        <div class="layout-post-description">
          <hr />
          <div>
            <span style="font-weight: bolder;">ข้อมูลส่วนบุคคล</span>
          </div>
          <span style="font-weight: bolder;">ชื่อ-สกุล:</span>
          <div>
            <p>{{ $data->post_personal }}</p>
          </div>
          <span style="font-weight: bolder;">ที่อยู่:</span>
          <div>
            <p>{{ $data->post_per_address }}</p>
          </div>
          <span style="font-weight: bolder;">เบอร์โทรศัพท์:</span>
          <div>
            <p>{{ $data->post_tel }}</p>
          </div>
          <span style="font-weight: bolder;">บัตรประชาชน:</span>
          <div>
            <img src="{{ asset('upload/card/'.$data->post_id_card) }}" alt="Avatar" width="50%">
          </div>
          <span style="font-weight: bolder;">ใบประกอบอาชีพ:</span>
          <div>
            <img src="{{ asset('upload/cert/'.$data->post_cert) }}" alt="Avatar" width="50%">
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection