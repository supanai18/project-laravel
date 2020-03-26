<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="{{ asset('upload/image/pnu.png') }}" />
<head>
  @include('layout_admin.head')
</head>
<body style="font-family: 'Prompt', sans-serif;" id="page-top">
  <div id="wrapper">
    @include('layout_admin.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('layout_admin.navbar')
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      @include('layout_admin.footer')
    </div>
  </div>
  @include('layout_admin.js')
</body>
</html>