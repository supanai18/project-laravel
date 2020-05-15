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

  <!-- Nav Item - Pages Collapse Menu -->
@guest
  <li class="nav-item">
    <a class="{{ Request::url() == url('/') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/') }}">
      <span class="font-weight-bold">หน้าแรก</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/training') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/training') }}">
      <span class="font-weight-bold">อบรม-สัมมนา</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/training-free') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/training-free') }}">
      <span class="font-weight-bold">อบรมฟรี-สัมมนาฟรี</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/news') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/news') }}">
      <span class="font-weight-bold">ข่าวประชาสัมพันธ์</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/contact') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/contact') }}">
      <span class="font-weight-bold">ติดต่อ</span>
    </a>
  </li>
@else
  <li class="nav-item">
    <a class="{{ Request::url() == url('/') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/') }}">
      <span class="font-weight-bold">หน้าแรก</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/training') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/training') }}">
      <span class="font-weight-bold">อบรม-สัมมนา</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/training-free') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/training-free') }}">
      <span class="font-weight-bold">อบรมฟรี-สัมมนาฟรี</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/news') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/news') }}">
      <span class="font-weight-bold">ข่าวประชาสัมพันธ์</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/cart') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/cart') }}">
      <span class="font-weight-bold">รถเข็นของฉัน</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/list') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/list') }}">
      <span class="font-weight-bold">รายการของฉัน</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manage-data" aria-expanded="true" aria-controls="manage-data">
      <span class="font-weight-bold">จัดการ</span>
    </a>
    <div id="manage-data" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="{{ Request::url() == url('/profile') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/profile') }}">
          <span>จัดการอบรมสัมมนา <br />และข่าวประชาสัมพันธ์</span>
        </a>
        <a class="{{ Request::url() == url('/manage-payment') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/manage-payment') }}">จัดการการชำระเงิน</a>
        <a class="{{ Request::url() == url('/list-user-register') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/list-user-register') }}">รายชื่อผู้สมัครอบรม</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="{{ Request::url() == url('/contact') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/contact') }}">
      <span class="font-weight-bold">ติดต่อ</span>
    </a>
  </li>
@endguest
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>