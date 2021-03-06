<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->
  <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="ค้นหา" aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form> -->

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    @guest
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="{{ url('/login') }}">
        <span class="mr-2 d-lg-inline small font-weight-bold">เข้าสู่ระบบ</span>
      </a>
    </li>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="{{ url('/register') }}">
        <span class="mr-2 d-lg-inline small font-weight-bold">สมัครสมาชิก</span>
      </a>
    </li>
    @else
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{ Auth::user()->avatar }}" width="40px" height="40px" class="rounded-circle" />
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        @if(Auth::user()->status == 'admin')
        <a class="dropdown-item" href="{{ url('/dashboard') }}">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          หน้าควบคุม
        </a>
        @else
        <a class="dropdown-item" href="{{ url('/profile') }}">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          โปรไฟล์
        </a>
        <a class="dropdown-item" href="{{ url('/cart') }}">
          <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>
          รถเข็นของฉัน
        </a>
        <a class="dropdown-item" href="{{ url('/list') }}">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          รายการของฉัน
        </a>
        @endif
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          ออกจากระบบ
        </a>
      </div>
    </li>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ยืนยันการออกจากระบบ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ยืนยัน" เพื่อดำเนินการต่อ</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
            ยืนยืน
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
          </div>
        </div>
      </div>
    </div>
    @endguest

  </ul>

</nav>
<!-- End of Topbar -->