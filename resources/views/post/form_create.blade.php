@extends('layout.main')

@section('content')

<!-- post -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p>
      <h6 class="m-0 font-weight-bold text-active">ฟอร์มสร้างอบรม-สัมมนา(มีค่าใช้จ่าย)</h6>
    </div>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('/confirm-create-post-auth') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="form-group">
        <label>รูปปก: <span class="text-red">*</span></label>
        <input type="file" class="form-control" name="post_image" required>
      </div>
      <div class="form-group">
        <label>หัวเรื่อง: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_title" placeholder="ระบุหัวเรื่อง" required>
      </div>
      <div class="form-group">
        <label>เกริ่นนำ: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_intro" placeholder="ระบุเกริ่นนำ" required>
      </div>
      <div class="form-group">
        <label>รายละเอียด: <span class="text-red">*</span></label>
        <textarea class="form-control" rows="6" name="post_description" required></textarea>
      </div>
      <div class="form-group">
        <label>จัดทำโดย: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_creator" placeholder="ระบุผู้จัดทำ" required>
      </div>
      <div class="form-group">
        <label>สถานที่จัดอบรม: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="post_address" placeholder="ระบุผู้สถานที่จัดอบรม" required>
      </div>
      <div class="form-group">
        <label>อัตราสมัคร (จำนวนคน): <span class="text-red">*</span></label>
        <input type="number" class="form-control" name="post_rate" placeholder="ระบุอัตรา" required>
      </div>
      <div class="form-group">
        <label>สถานะ:</label>
        <select class="form-control" name="post_status" required>
          <option></option>
          <option value="ฟรี">ฟรี</option>
          <option value="เสียค่าธรรมเนียม">เสียค่าธรรมเนียม</option>
        </select>
      </div>
      <div class="form-group">
        <label>วันที่เปิดรับสมัคร: <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_start" placeholder="ระบุวันที่เปิดรับสมัคร" required>
      </div>
      <div class="form-group">
        <label>วันที่ปิดรับสมัคร: <span class="text-red">*</span></label>
        <input type="date" class="form-control" name="post_end" placeholder="ระบุวันที่ปิดรับสมัคร" required>
      </div>
      <button type="submit" class="btn btn-primary">สร้าง</button>
    </form>
  </div>
</div>

@endsection