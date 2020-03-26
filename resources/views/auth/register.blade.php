<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ระบบสมัครอบรมออนไลน์ - สมัครสมาชิก</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">สร้างบัญชีผู้ใช้</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="ระบุชื่อ" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="ระบุอีเมล์" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="ระบุรหัสผ่าน" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="ระบุรหัสผ่านอีกครั้ง" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  ดำเนินการต่อ
                </button>
                <hr>
                <a href="{{ url('/auth/google') }}" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> สมัครสมาชิกด้วย Google
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small">ลืมรหัสผ่าน?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{ url('/login') }}">มีบัญชีผู้ใช้แล้ว? เข้าสู่ระบบเลย!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
