@extends('layout.main')

@foreach($details_post as $data)
  @section('title', $data->post_title)
@endforeach

@section('content')
<div class="flex-row">
  <h6 class="m-0">
    <a class="text-inactive" href="{{ url('/training-free') }}">อบรม-สัมมนาฟรี</a>
  </h6>
  <p class="slash"><i class="fas fa-caret-right"></i></p>
  <h6 class="m-0 font-weight-bold text-active">หัวข้ออบรม</h6>
</div>

@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif

@foreach($details_post as $data)
<div class="row">
  <div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <h3 class="text-app">หลักสูตร: {{ $data->post_title }}</h3>
    <span class="text-small text-active">
      <i class="fas fa-calendar-alt"></i> 
      {{ date('d-m-Y', strtotime($data->post_start) )}} - {{ date('d-m-Y', strtotime($data->post_end) )}}
    </span>
    <br />
    <div>
      <img src="{{ asset('upload/post/'.$data->post_image) }}" width="100%" />
      <br />
      <br />
      <span style="font-weight: bolder;">รายละเอียด:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->post_description }}</p>
      <br />
      <span style="font-weight: bolder;">จัดโดย:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->post_creator }}</p>
      <br />
      <span style="font-weight: bolder;">สถานที่อบรม:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->post_address }}</p>
      <br />
      <span style="font-weight: bolder;">จำนวนคงเหลือ:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->post_rate }}</p>
      <br />
      <span style="font-weight: bolder;">ค่าธรรมเนียม:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->post_status }}</p>
      <br />
      <span style="font-weight: bolder;">ผู้เข้าชม:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->post_view }}</p>
      <br />
      <span style="font-weight: bolder;">ผู้โพสต์:</span>
      <p style="text-align: justify; text-justify: inter-word;">{{ $data->name }}</p>
    </div>
    <br />
    <hr />
    <p class="font-weight-bold">รายละเอียดการอบรม</p>
    <span style="font-weight: bolder;">ระยะเวลาในการจัดอบรม:</span>
    <div>
      <p>{{ $data->post_date }} วัน</p>
    </div>
    <span style="font-weight: bolder;">วัน/เวลาในการอบรม:</span>
    <div>
      <p>{{ $data->post_start_date }} {{ $data->post_start_time }} - {{ $data->post_end_date }} {{ $data->post_end_time }}</p>
    </div>
    <br />
    <hr />
    <p class="font-weight-bold">ข้อมูลส่วนบุคคล</p>
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
      <img src="{{ asset('upload/card/'.$data->post_id_card) }}" alt="Avatar" width="100%">
    </div>
    <span style="font-weight: bolder;">ใบประกอบอาชีพ:</span>
    <div>
      <img src="{{ asset('upload/cert/'.$data->post_cert) }}" alt="Avatar" width="100%">
    </div>
    <br />
  </div>
  <div class="col-lg-4 col-md-12 col-sm-12 col-12">
    <div class="card shadow layout-card">
      <h3 class="font-weight-bold text-app text-center">ลงทะเบียน</h3>
      <div class="card-body">
        @if($data->post_rate != 0)
        <form method="POST" action="{{ url('/confirm-training-free/'.$data->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group">
            <label class="mr-sm-2">ชื่อผู้ติดต่อ: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_name" required>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">นามสกุล: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_lastname" required>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">อีเมล์: <span class="text-red">*</span></label>
            <input type="email" class="form-control mb-2 mr-sm-2" name="training_email" required>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">เบอร์ติดต่อ: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_tel" required maxlength="10">
          </div>
          <div class="form-group">
            <label class="mr-sm-2">อาชีพ: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_career" required>
          </div>
          <div class="form-group">
            <label>ศาสนา:</label>
            <select class="form-control" name="training_religion" required>
              <option></option>
              <option value="อิสลาม">อิสลาม</option>
              <option value="พุทธ">พุทธ</option>
              <option value="คริสต์">คริสต์</option>
            </select>
          </div>
          <center>
            <button type="submit" class="btn btn-app">ลงทะเบียนเลย</button>
          </center>
        </form>
        @else
        <form method="POST" action="{{ url('/confirm-training-free/'.$data->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group">
            <label class="mr-sm-2">ชื่อผู้ติดต่อ: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_name" required disabled>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">นามสกุล: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_lastname" required disabled>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">อีเมล์: <span class="text-red">*</span></label>
            <input type="email" class="form-control mb-2 mr-sm-2" name="training_email" required disabled>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">เบอร์ติดต่อ: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_tel" required maxlength="10" disabled>
          </div>
          <div class="form-group">
            <label class="mr-sm-2">อาชีพ: <span class="text-red">*</span></label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="training_career" required disabled>
          </div>
          <div class="form-group">
            <label>ศาสนา:</label>
            <select class="form-control" name="training_religion" required disabled>
              <option></option>
              <option value="อิสลาม">อิสลาม</option>
              <option value="พุทธ">พุทธ</option>
              <option value="คริสต์">คริสต์</option>
            </select>
          </div>
          <center>
            <span class="text-red">ปิดการรับสมัคร</span>
          </center>
        </form>
        @endif
      </div>
      <span class="text-red" style="font-size: 14px;">หมายเหตุ: กรุณากรอกข้อมูลให้ครบถ้วน เจ้าหน้าที่จะติดต่อกลับหาท่านตามข้อมูลดังกล่าว</span>
      <hr>
      <div class="d-flex justify-content-around card-body">
        <div>
          <a href="{{ url('/confirm-like-post/'.$data->id) }}">
            <span><i class="fas fa-thumbs-up text-app"></i> ถูกใจ: {{ $data->post_like }}</span>
          </a>
        </div>
        <br />
        <div>
          <a href="{{ url('/confirm-unlike-post/'.$data->id) }}">
            <span><i class="fas fa-thumbs-down text-app"></i> ไม่ถูกใจ: {{ $data->post_unlike }}</span>
          </a>
        </div>
        <br />
        <div>
          <a href="{{ url('/confirm-save-post/'.$data->id) }}">
            <span><i class="fas fa-bookmark text-app"></i> บันทึกเก็บ</span>
          </a>
        </div>
      </div>
    </div>
    <br/>
  </div>
</div>
<div class="card shadow layout-card">
  <div class="flex-row">
    <h6 class="mt-2 ml-2 m-0 font-weight-bold text-active">แสดงความคิดเห็น</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive" style="height:250px; overflow:auto;">
      <table class="table table-striped" height="100px">
        <tbody>
          @forelse($comments as $key=>$item)
          @guest
          @else
          <tr class="d-flex justify-content-between">
            <td>
              <img src="{{ $item->avatar }}" width="40px" height="40px" class="rounded-circle" />
              <span class="font-weight-bold">{{ $item->name }} : </span>
              <span>{{ $item->comment }}</span>
            </td>
            @if(Auth::user()->id == $item->user_id)
            <td>
              <button class="btn" onclick="if (confirm('ยืนยันลบความคิดเห็นท่านหรือไม่?')) { return location.href='{{ url('/confirm-delete-comment/'.$item->id) }}' };">
                <i class="far fa-times-circle text-app"></i>
              </button>
            </td>
            @else
            @endif
          </tr>
          @endguest
          @empty
          <center>
          <div>
            <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
          </div>
          <div>
            <span>ไม่พบความคิดเห็น</span>
          </div>
          </center>
          @endforelse
        </tbody>
      </table>
    </div>
    <form method="POST" action="{{ url('/confirm-comment-post/'.$data->id.'/'.$data->post_title) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="form-group">
        <textarea class="form-control" rows="3" name="comment" placeholder="พิมพ์ข้อความ..." required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">ส่ง</button>
    </form>
  </div>
</div>
<br />

@endforeach

@endsection