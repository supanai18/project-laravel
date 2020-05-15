@extends('layout.main')
@section('title', 'จัดการยอดการชำระเงิน :')
@section('content')
@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="flex-row">
      <h6 class="m-0">
        <a class="text-inactive" href="{{ url('/profile') }}">โปรไฟล์</a>
      </h6>
      <p class="slash"><i class="fas fa-caret-right"></i></p>
      <h6 class="m-0 font-weight-bold text-primary">รายชื่อผู้สมัครอบรม</h6>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>ภาพอบรม</th>
            <th>หัวข้ออบรม</th>
            <th>ชื่อผู้สมัคร</th>
            <th>อีเมล์</th>
            <th>เบอร์โทรศัพท์</th>
            <th>ศาสนา</th>
            <th>สถานะ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_register_user as $key=>$list_register_user)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>
              <button type="button" class="btn" data-toggle="modal" data-target="#myModal{{ $list_register_user->id }}">
                <img src="{{ asset('upload/post/'.$list_register_user->post_image) }}" alt="post_file" width="50px" />
              </button>
              <div class="modal" id="myModal{{ $list_register_user->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <img src="{{ asset('upload/post/'.$list_register_user->post_image) }}" alt="post_file" width="100%" />
                  </div>
                </div>
              </div>
            </td>
            <td>{{ $list_register_user->post_title }}</td>
            <td>{{ $list_register_user->training_name }} {{ $list_register_user->training_lastname }}</td>
            <td>{{ $list_register_user->training_email }}</td>
            <td>{{ $list_register_user->training_tel }}</td>
            <td>{{ $list_register_user->training_religion }}</td>
            <td>{{ $list_register_user->training_status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection