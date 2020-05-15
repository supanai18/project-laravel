@extends('layout.main')
@section('title', 'หน้าแรก :')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')

<div class="d-flex justify-content-between">
  <h6 class="m-0 font-weight-bold text-active">หน้าแรก</h6>
</div>
<br />
{!! $calendar_details->calendar() !!}

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar_details->script() !!}
@endsection