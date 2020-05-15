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
  <li class="nav-item">
    <a class="{{ Request::url() == url('/dashboard') ? 'active-link nav-link collapsed' : 'nav-link collapsed' }}" href="{{ url('/dashboard') }}">
      <span class="font-weight-bold">ควบคุม</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manage" aria-expanded="true" aria-controls="manage">
      <span class="font-weight-bold">จัดการ</span>
    </a>
    <div id="manage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="{{ Request::url() == url('/dashboard/post') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/dashboard/post') }}">อบรม-สัมมนา</a>
        <a class="{{ Request::url() == url('/dashboard/news') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/dashboard/news') }}">ข่าวประชาสัมพันธ์</a>
        <a class="{{ Request::url() == url('/dashboard/comments') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/dashboard/comments') }}">ความคิดเห็น</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report" aria-expanded="true" aria-controls="report">
      <span class="font-weight-bold">รายงาน</span>
    </a>
    <div id="report" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="{{ Request::url() == url('/dashboard/post-report') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/dashboard/post-report') }}">สรุปรายงานโพสต์</a>
        <a class="{{ Request::url() == url('/dashboard/new-report') ? 'active-link collapse-item' : 'collapse-item' }}" href="{{ url('/dashboard/new-report') }}">สรุปรายงานข่าวประชาสัมพันธ์</a>
      </div>
    </div>
  </li>
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>