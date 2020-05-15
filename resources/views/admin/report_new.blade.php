@extends('layout_admin.main')
@section('title', 'หน้าควบคุม รายงานข่าวประชาสัมพันธ์ :')
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
  <a href="{{ url('/dashboard/report-news-all') }}" class="btn button-right">
    <i class="fas fa-print text-app"></i>
  </a>
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
            <th>Report</th>
          </tr>
        </thead>
        <tbody>
          @foreach($news as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td><img src="{{ asset('upload/new/'.$data->news_image) }}" width="50px" /></td>
            <td>{{ $data->news_title }}</td>
            <td>{{ $data->news_intro }}</td>
            <td>{{ $data->news_creator }}</td>
            <td>
              <center>
                <a href="{{ url('/dashboard/report-news/'.$data->id) }}" class="btn">
                  <i class="fas fa-print text-app"></i>
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