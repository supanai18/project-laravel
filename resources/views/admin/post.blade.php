@extends('layout_admin.main')
@section('title', 'หน้าควบคุม จัดการอบรม-สัมมนา :')
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
    <h6 class="m-0 font-weight-bold text-primary">อบรม-สัมมนา</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>รูป</th>
            <th>หัวข้อ</th>
            <th>เกริ่นนำ</th>
            <th>จัดโดย</th>
            <th>สถานะ</th>
            <th>ลบ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($post as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td><img src="{{ asset('upload/post/'.$data->post_image) }}" width="50px" /></td>
            <td>{{ $data->post_title }}</td>
            <td>{{ $data->post_intro }}</td>
            <td>{{ $data->post_creator }}</td>
            <td>{{ $data->post_status }}</td>
            <td>
              <center>
                <button onclick="if (confirm('ยืนยันลบอบรม-สัมมนาหรือไม่?')) { return location.href='{{ url('/dashboard/confirm-delete-post/'.$data->id) }}' };" class="btn">
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