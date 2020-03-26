@extends('layout.main')

@section('title', 'รถเข็นของฉัน :')

@section('content')
@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif

<div class="flex-row">
  <h6 class="m-0 font-weight-bold text-active">รถเข็นของฉัน</h6>
</div>
<br />

<section id="tabs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<div class="nav nav-tabs nav-fill row" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active col-lg-4 col-md-4 col-sm-4 col-4" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-controls="nav-payment" aria-selected="true">ที่ต้องชำระ</a>
						<a class="nav-item nav-link col-lg-4 col-md-4 col-sm-4 col-4" id="nav-progress-tab" data-toggle="tab" href="#nav-progress" role="tab" aria-controls="nav-progress" aria-selected="false">กำลังดำเนินการ</a>
						<a class="nav-item nav-link col-lg-4 col-md-4 col-sm-4 col-4" id="nav-success-tab" data-toggle="tab" href="#nav-success" role="tab" aria-controls="nav-success" aria-selected="false">สำเร็จ</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
            <div class="row">
              @forelse($cart as $key=>$data)
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <span>รายการที่ {{ $key+1 }}</span>
                  <br />
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('upload/post/'.$data->post_image) }}" alt="$data->post_title" width="100%">
                    <div class="card-body">
                      <span class="font-weight-bold color-app">{{ $data->post_title }}</span>
                      <div>
                        <span>สถานะ: {{ $data->training_status }}</span>
                      </div>
                      <hr />
                      <span class="text-red">ชำระก่อนวันที่ {{ date('d-m-Y', strtotime($data->post_end) )}}</span>
                      <div>
                        <a href="{{ url('/form-create-payment/'.$data->id.'/'.$data->post_title) }}" class="btn btn-app">ชำระเงิน</a>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
              <center>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-nodata">
                  <div>
                    <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
                  </div>
                  <div>
                    <span>ไม่พบรายการ</span>
                  </div>
                  <p class="nodata">
                    ------------------------------------------------------------------------------------------
                    ------------------------------------------------------------------------------------------
                    ------------------------------------------------------------------------------------------
                  </p>
                </div>
              </center>
              @endforelse
            </div>
					</div>
					<div class="tab-pane fade" id="nav-progress" role="tabpanel" aria-labelledby="nav-progress-tab">
            <div class="row">
              @forelse($payment as $key=>$data)
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <span>รายการที่ {{ $key+1 }}</span>
                  <br />
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('upload/post/'.$data->post_image) }}" alt="$data->post_title" width="100%">
                    <div class="card-body">
                      <span class="font-weight-bold color-app">{{ $data->post_title }}</span>
                      <div>
                        <span>สถานะ: {{ $data->training_status }}</span>
                      </div>
                      <hr />
                      <span class="text-red">แก้ไขชำระก่อนวันที่ {{ date('d-m-Y', strtotime($data->post_end) )}}</span>
                      <div>
                        <a href="{{ url('/form-update-payment/'.$data->id.'/'.$data->post_title) }}" class="btn btn-app">แก้ไขชำระเงิน</a>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
              <center>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-nodata">
                  <div>
                    <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
                  </div>
                  <div>
                    <span>ไม่พบรายการ</span>
                  </div>
                  <p class="nodata">
                    ------------------------------------------------------------------------------------------
                    ------------------------------------------------------------------------------------------
                    ------------------------------------------------------------------------------------------
                  </p>
                </div>
              </center>
              @endforelse
            </div>
					</div>
					<div class="tab-pane fade" id="nav-success" role="tabpanel" aria-labelledby="nav-success-tab">
            <div class="row">
              @forelse($post as $key=>$data)
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <span>รายการที่ {{ $key+1 }}</span>
                  <br />
                  <div class="card">
                    <a href="{{ url('/training-details/'.$data->post_id) }}">
                      <img class="card-img-top" src="{{ asset('upload/post/'.$data->post_image) }}" alt="$data->post_title" width="100%">
                    </a>
                    <div class="card-body">
                      <a href="{{ url('/training-details/'.$data->post_id) }}">
                        <span class="font-weight-bold color-app">{{ $data->post_title }}</span>
                      </a>
                      <div>
                        <span>สถานะ: {{ $data->training_status }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
              <center>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-nodata">
                  <div>
                    <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
                  </div>
                  <div>
                    <span>ไม่พบรายการ</span>
                  </div>
                  <p class="nodata">
                    ------------------------------------------------------------------------------------------
                    ------------------------------------------------------------------------------------------
                    ------------------------------------------------------------------------------------------
                  </p>
                </div>
              </center>
              @endforelse
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection