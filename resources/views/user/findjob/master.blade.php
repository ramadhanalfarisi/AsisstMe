<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Assist Me</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{route('home')}}" class="navbar-brand">
        <img src="{{asset('img/logo.png')}}" alt="AssistMe Logo"
             style="height: 60px;">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <form action="{{route('searchByQuery')}}" method="GET" class="form-inline">
            <input type="text" class="form-control" style="width: 750px;" name="cari" placeholder="Masukan nama / alamat / bio asisten...">
            <button type="submit" class="btn btn-link" style="margin-left: 5px;"><i class="fa fa-search"></i></button>
          </form>
        </ul>
      </div>
      @if(Auth::user() == null)
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item" style="margin-right: 5px;">
          <!-- Button trigger modal -->
          <button type="" class="btn btn-link" data-toggle="modal" data-target="#register">
            Register
          </button>
        </li>
        <li class="nav-item dropdown">
          <button type="" class="btn btn-link" data-toggle="modal" data-target="#login">
            Login
          </button>  
        </li>
      </ul>
      @else
        <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{ Auth::user()->nama }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('/images/formal/'. Auth::user()->foto_profil ) }}" class="img-circle" alt="Image">
                <p>
                  {{ Auth::user()->nama }} <br><small>{{ is_null(Auth::user()->kategori_id) ? '' : Auth::user()->kategori->name }}</small>
                  @if(Auth::user()->kategori_id == null)
                  <small><a href="" data-toggle="modal" data-target="#lengkap">Silahkan lengkapi data anda</a></small>
                  @endif
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left" style="float: left;">
                  <a href="{{ route('profile')}}" class="btn btn-default btn-flat">Profile  </a>
                </div>
                <div class="pull-right" style="float: right;">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
      </ul>
      @endif
    </div>
  </nav>
  <!-- /.navbar -->
  
  @yield('content')

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('register')}}" method="post">
        {{ csrf_field() }}
          <label for="">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama">
          @if($errors->has('nama'))
          <div class="text-danger">
              {{ $errors->first('nama')}}
          </div>
          @endif
          <label for="">Jenis Kelamin</label>
          <select name="kelamin" id="" class="form-control">
            <option value="1">Pria</option>
            <option value="2">Wanita</option>
          </select>
          @if($errors->has('kelamin'))
          <div class="text-danger">
              {{ $errors->first('kelamin')}}
          </div>
          @endif
          <label for="">Email</label>
          <input type="email" class="form-control" name="email">
          @if($errors->has('email'))
          <div class="text-danger">
              {{ $errors->first('email')}}
          </div>
          @endif
          <label for="">Password</label>
          <input type="password" class="form-control" name="password">
          @if($errors->has('password'))
          <div class="text-danger">
              {{ $errors->first('password')}}
          </div>
          @endif
          <label for="">Ketik ulang password</label>
          <input type="password" class="form-control" name="retype">
          @if($errors->has('retype'))
          <div class="text-danger">
              {{ $errors->first('retype')}}
          </div>
          @endif
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if(Auth::user() != null)
<div class="modal fade" id="lengkap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mohon lengkapi data anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('lengkapDocument', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="">Nomor Telepon</label>
          <input type="text" class="form-control" name="nomor">
          @if($errors->has('nomor'))
          <div class="text-danger">
              {{ $errors->first('nomor')}}
          </div>
          @endif
          <label for="">Kategori</label>
          <select id="" class="form-control" name="kategori">
            <option value="">Pilih kategori</option>
            @foreach(\App\Kategori::all() as $k)
            <option value="{{$k->id}}">{{$k->name}}</option>
            @endforeach
          </select>
          @if($errors->has('kategori'))
          <div class="text-danger">
              {{ $errors->first('kategori')}}
          </div>
          @endif
          <label for="">Provinsi</label>
          <input type="text" class="form-control" name="provinsi">
          @if($errors->has('provinsi'))
          <div class="text-danger">
              {{ $errors->first('provinsi')}}
          </div>
          @endif
          <label for="">Kota</label>
          <input type="text" class="form-control" name="kota">
          @if($errors->has('kota'))
          <div class="text-danger">
              {{ $errors->first('kota')}}
          </div>
          @endif
          <label for="">Alamat</label>
          <input type="text" class="form-control" name="alamat">
          @if($errors->has('alamat'))
          <div class="text-danger">
              {{ $errors->first('alamat')}}
          </div>
          @endif
          <label for="">Ceritakan tentang diri anda</label>
          <textarea name="bio" id="" cols="30" rows="5" class="form-control"></textarea>
          @if($errors->has('bio'))
          <div class="text-danger">
              {{ $errors->first('bio')}}
          </div>
          @endif
          <label for="">Foto Formal</label>
          <input type="file" name="formal" id="" class="form-control" style="margin-bottom: 5px;">
          @if($errors->has('formal'))
          <div class="text-danger">
              {{ $errors->first('formal')}}
          </div>
          @endif
          <label for="">Foto CV</label>
          <input type="file" name="cv" id="" class="form-control" style="margin-bottom: 5px;">
          @if($errors->has('cv'))
          <div class="text-danger">
              {{ $errors->first('cv')}}
          </div>
          @endif
          <label for="">Foto Portofolio</label>
          <input type="file" name="portofolio" id="" class="form-control">
          @if($errors->has('portofolio'))
          <div class="text-danger">
              {{ $errors->first('portofolio')}}
          </div>
          @endif
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="margin-top: 12.5%;">
  <div class="modal-dialog" role="document" style="width: 385px;">
    <div class="modal-content">
      <div class="modal-body">
        <form method="post" action="login">
        {{ csrf_field() }}
          <label for="">Email</label>
          <input type="email" class="form-control" name="email">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>

<script>

function load_second(){
  $('#lengkap').modal('show');
}

</script>
</body>
</html>
