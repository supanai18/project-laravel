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
    <a class="nav-link collapsed" href="{{ url('/dashboard') }}">
      <span class="font-weight-bold">ควบคุม</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <span class="font-weight-bold">จัดการ</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ url('/dashboard/post') }}">อบรม-สัมมนา</a>
        <a class="collapse-item" href="{{ url('/dashboard/news') }}">ข่าวประชาสัมพันธ์</a>
        <a class="collapse-item" href="{{ url('/dashboard/comments') }}">ความคิดเห็น</a>
      </div>
    </div>
  </li>
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>