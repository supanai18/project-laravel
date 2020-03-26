<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="{{ asset('upload/image/pnu.png') }}" />
<head>
  @include('layout.head')
</head>
<body style="font-family: 'Prompt', sans-serif;" id="page-top">
  <div id="wrapper">
    @include('layout.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('layout.navbar')
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      @include('layout.footer')
    </div>
  </div>
  @include('layout.js')
</body>
</html>