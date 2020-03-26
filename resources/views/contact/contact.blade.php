@extends('layout.main')
@section('title', 'ติดต่อ :')
@section('content')
@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif
<div class="flex-row">
  <h6 class="m-0 font-weight-bold text-active">ติดต่อ</h6>
</div>
<br />
<div class="card shadow layout-card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-8 left layout">
        <form method="POST" action="{{ url('/confirm-contact') }}">
        {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="mr-sm-2">ชื่อผู้ติดต่อ: <span class="text-red">*</span></label>
                <input type="text" class="form-control mb-2 mr-sm-2" name="contact_name" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="mr-sm-2">อีเมล์: <span class="text-red">*</span></label>
                <input type="email" class="form-control mb-2 mr-sm-2" name="contact_email" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">ข้อความ: <span class="text-red">*</span></label>
            <textarea class="form-control" name="contact_description" rows="5" required></textarea>
          </div>
          <button class="btn btn-app" type="submit">ส่ง</button>
        </form>
      </div>
      <div class="col-lg-4 layout">
        <div class="right">
          <p class="text-app font-weight-bold">ข้อมูลติดต่อ</p>
          <div>
            <i class="fa fa-map-marker text-app" aria-hidden="true"></i>
            <span>คณะวิทยาการจัดการ มหาวิทยาลัยนราธิวาสราชนครินทร์</span>
          </div>
          <br />
          <div>
            <i class="fa fa-phone text-app" aria-hidden="true"></i>
            <span>+66 (0) 7 370 9030 ต่อ 3310</span>
          </div>
          <br />
          <div>
            <i class="fa fa-envelope text-app" aria-hidden="true"></i>
            <span>mgt.contact@pnu.ac.th</span>
          </div>
        </div>
      </div>
    </div>
    <div class="layout">
      <iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%20%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%A2%E0%B8%99%E0%B8%A3%E0%B8%B2%E0%B8%98%E0%B8%B4%E0%B8%A7%E0%B8%B2%E0%B8%AA%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%99%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%A3%E0%B9%8C&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
  </div>
</div>
@endsection