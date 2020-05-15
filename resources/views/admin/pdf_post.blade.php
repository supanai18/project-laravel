<html>
<head>
    <title>ออกรายงานการโพสต์</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
        th , td {
            font-size: 20px;
        }
        tr {
            line-height: 10px;
        }
        .right {
          text-align: right
        }
        .right-margin {
          margin-left: 450px;
        }
    </style>
</head>
<body>
<div>
    <div>
      <span>วันที่ {{  date('Y-m-d H:i:s' , strtotime("+7 Hours")) }}</span>
    </div>
    <center>
        <img src="{{ asset("/upload/image/pnu.png") }}" alt="logo" width="150px">
        <h3>ออกรายงานการโพสต์</h3>
        <h4>คณะวิทยาการจัดการ มหาวิทยาลัยนราธิวาสราชครินทร์</h4>
    </center>
    <center>
    <div class="table-responsive">
        <table autosize="1" class="table table-bordered" cellspacing="0" style="text-align:center;">
            <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="10%">รูป</th>
                  <th width="10%">หัวข้อ</th>
                  <th width="10%">สถานะ</th>
                  <th width="20%">ผู้โพสต์</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post as $key=>$data)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td><img src="{{ asset('upload/post/'.$data->post_image) }}" width="50px" /></td>
                  <td>{{ $data->post_title }}</td>
                  <td>{{ $data->post_status }}</td>
                  <td>{{ $data->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </center>
    <div>
        <h5>หมายเหตุ:</h5>
        <span>................................................................................................................................................................................................................................................................................</span>
        <span>................................................................................................................................................................................................................................................................................</span>
    </div>
    <br>
    <div class="right-margin">
      <center>
        <h4>ลงชื่อผู้ปฏิบัติงาน</h4>
        <h5>(...................................)</h5>
        <h5>...................................</h5>
        <h5>วันที่............เดือน............ปี............</h5>
      </center>
    </div>
</div>
 
</body>
</html>