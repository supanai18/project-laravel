<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">

<!-- Custom style app -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

@yield('script')

<script>
    $(document).ready(function(){
        $("#post_price").hide();
        $("#post_payment").hide();
        $("#post_start_date").hide();
        $("#post_start_time").hide();
        $("#post_end_date").hide();
        $("#post_end_time").hide();
    })
</script>

<script>
$("#selected_post").change(function() {
    var selected = $(this).find("option:selected").val();
    if(selected == 'ฟรี') {
        $("#post_price").hide();
        $("#post_payment").hide();
    } else {
        $("#post_price").show();
        $("#post_payment").show();
    }
    
});
</script>

<script>
$("#selected_post_date").change(function() {
    var selected = $(this).find("option:selected").val();
    if(selected <= '1') {
        $("#post_start_date").show();
        $("#post_start_time").show();
        $("#post_end_date").hide();
        $("#post_end_time").show();
    } else {
        $("#post_start_date").show();
        $("#post_start_time").show();
        $("#post_end_date").show();
        $("#post_end_time").show();
    }
});
</script>