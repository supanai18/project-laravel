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
      <h6 class="m-0 font-weight-bold text-primary">จัดการยอดการชำระเงิน</h6>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>หลักฐาน</th>
            <th>หัวข้อ</th>
            <th>ผู้โอน</th>
            <th>สถานะ</th>
            <th>อนุมัติ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($manage_payment as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>
              <button type="button" class="btn" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                <img src="{{ asset('upload/payment/'.$data->payment_file) }}" alt="payment_file" width="50px" />
              </button>
              <div class="modal" id="myModal{{ $data->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <img src="{{ asset('upload/payment/'.$data->payment_file) }}" alt="payment_file" width="100%" />
                  </div>
                </div>
              </div>
            </td>
            <td>{{ $data->post_title }}</td>
            <td>{{ $data->training_name }}</td>
            <td>{{ $data->training_status }}</td>
            <td>
              <center>
                <a href="{{ url('/confirm-payment/'.$data->training_id) }}" class="btn button-action">
                  อนุมัติ
                </a>
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