<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman Login</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('lte/plugins/origin-css/style.css') }}">
    </head>

    <body class="hold-transition login-page color-ori">
        <div class="login-box">
          <div class="login-logo">
            <a href="{{ route('login') }}">E-PERMISSION</a>
          </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body rounded">
      <p class="login-box-msg">Masukkan Data Di sini</p>

      <form action="" method="post">
        @method('post')
        @csrf

 @error('password')
        <div class="alert alert-danger" role="alert">
            <small>{{ $message }}</small>
        </div>
    @enderror

        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text color-white">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-outline-secondary bg-biru btn-block">Masuk</button>
          </div>
          <!-- /.col -->

        </div>
      </form>

      <p class="col-12 m-2 mt-3 text-center">
        <a href="{{route('forgot')}}" class="link-col">Lupa Password?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($message = Session::get('failed'))
<script>
    Swal.fire('{{$message }}');
</script>
@endif

@if($message = Session::get('success'))
<script>
    Swal.fire('{{$message }}');
</script>
@endif
</body>
</html>
