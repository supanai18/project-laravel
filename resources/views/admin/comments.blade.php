@extends('layout_admin.main')
@section('title', 'หน้าควบคุม ความคิดเห็น :')
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
    <h6 class="m-0 font-weight-bold text-primary">ความคิดเห็น</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>คอมเม้นท์</th>
            <th>หัวข้อโพสต์</th>
            <th>รหัสผู้ใช้</th>
            <th>ชื่อผู้ใช้</th>
            <th>ลบ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($comments as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->comment }}</td>
            <td>{{ $data->post_title }}</td>
            <td>{{ $data->user_id }}</td>
            <td>{{ $data->name }}</td>
            <td>
              <center>
                <button onclick="if (confirm('ยืนยันลบความคิดเห็นหรือไม่?')) { return location.href='{{ url('/dashboard/confirm-delete-comments/'.$data->id) }}' };" class="btn">
                  <i class="fas fa-trash-alt text-app"></i>
                </button>
              </center>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection