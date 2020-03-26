<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <center>
    <img class="logo" src="{{ asset('upload/image/pnu.png') }}" width="35px" />
  </center>
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
    <div class="sidebar-brand-text mx-3">ระบบสมัครอบรมออนไลน์</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/') }}">
      <span class="font-weight-bold">หน้าแรก</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/training-free') }}">
      <span class="font-weight-bold">อบรมฟรี-สัมมนาฟรี</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/news') }}">
      <span class="font-weight-bold">ข่าวประชาสัมพันธ์</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/contact') }}">
      <span class="font-weight-bold">ติดต่อ</span>
    </a>
  </li>
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>