@extends('layout.main')

@section('title', 'รายการของฉัน :')

@section('content')
@if (session('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>สำเร็จ!</strong> {{ session('success') }}
  </div>
@endif

<div class="flex-row">
  <h6 class="m-0 font-weight-bold text-active">รายการของฉัน</h6>
</div>
<br />

<section id="tabs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
				<nav>
					<div class="nav nav-tabs nav-fill row" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active col-lg-6 col-md-6 col-sm-6 col-6" id="nav-save-tab" data-toggle="tab" href="#nav-save" role="tab" aria-controls="nav-save" aria-selected="true">บันทึก</a>
						<a class="nav-item nav-link col-lg-6 col-md-6 col-sm-6 col-6" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">ประวัติความคิดเห็น</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-save" role="tabpanel" aria-labelledby="nav-save-tab">
            <div class="table-responsive">
              <table class="table table-striped" width="100%">
                <tbody>
                  @forelse($save as $key=>$data)
                  <tr class="d-flex justify-content-between">
                    <td>
                      @if($data->post_status == 'เสียค่าธรรมเนียม')
                      <a href="{{ url('/post/'.$data->post_id.'/'.$data->post_title) }}">
                        <span>{{ $data->post_title}}</span>
                      </a>
                      @else
                      <a href="{{ url('/training/'.$data->post_id.'/'.$data->post_title) }}">
                        <span>{{ $data->post_title}}</span>
                      </a>
                      @endif
                    </td>
                    <td>
                      <button class="btn" onclick="if (confirm('ยืนยันลบรายการบันทึกของท่านหรือไม่?')) { return location.href='{{ url('/confirm-delete-save-post/'.$data->id) }}' };">
                        <i class="far fa-times-circle text-app"></i>
                      </button>
                    </td>
                  </tr>
                  @empty
                  <center>
                    <br />
                    <div>
                      <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
                    </div>
                    <div>
                      <span>ไม่พบประวัติการบันทึกเก็บ</span>
                    </div>
                  </center>
                  @endforelse
                </tbody>
              </table>
            </div>
					</div>
					<div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
            <div class="table-responsive">
              <table class="table table-striped" width="100%">
                <tbody>
                  @forelse($comments as $key=>$item)
                  <tr class="d-flex justify-content-between">
                    <td>
                      <img src="{{ $item->avatar }}" width="40px" class="rounded-circle" />
                      <span class="font-weight-bold">{{ $item->name }} : </span>
                      <span>{{ $item->comment }}</span>
                    </td>
                    <td>
                      @if($item->post_status == 'เสียค่าธรรมเนียม')
                      <a href="{{ url('/post/'.$item->post_id.'/'.$item->post_title) }}">
                        <span>{{ $item->post_title}}</span>
                      </a>
                      @else
                      <a href="{{ url('/training/'.$item->post_id.'/'.$item->post_title) }}">
                        <span>{{ $item->post_title}}</span>
                      </a>
                      @endif
                    </td>
                    <td>
                      <button class="btn" onclick="if (confirm('ยืนยันลบความคิดเห็นท่านหรือไม่?')) { return location.href='{{ url('/confirm-delete-comment/'.$item->id) }}' };">
                        <i class="far fa-times-circle text-app"></i>
                      </button>
                    </td>
                  </tr>
                  @empty
                  <center>
                    <br />
                    <div>
                      <img src="{{ asset('upload/icon/archive.png') }}" width="100px" />
                    </div>
                    <div>
                      <span>ไม่พบประวัติความคิดเห็น</span>
                    </div>
                  </center>
                  @endforelse
                </tbody>
              </table>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection