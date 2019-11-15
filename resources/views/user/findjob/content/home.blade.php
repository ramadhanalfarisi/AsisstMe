@extends('user.findjob.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    @if (Session::has('alert-success'))
    <div class="alert alert-success alert-dismissible" style="margin-top: 10px; margin-bottom: -10px;">
        <a href=""><button type="button" class="close" data-dismiss="alert">&times;</button></a>
        {{Session::get('alert-success')}}
    </div>
    @endif
    @if (Session::has('alert-danger'))
    <div class="alert alert-danger alert-dismissible" style="margin-top: 10px; margin-bottom: -10px;">
        <a href=""><button type="button" class="close" data-dismiss="alert">&times;</button></a>
        {{Session::get('alert-danger')}}
    </div>
    @endif
    <div class="row mb-2">
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
    <div class="row">
        <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title" style="margin-bottom: 30px;">Pilih kriteria</h5>

            <form action="" method="post">
                <select name="" id="" class="form-control" style="margin-bottom: 10px;">
                    <option value="">Pilih kategori</option>
                </select>
                <select name="" id="" class="form-control" style="margin-bottom: 10px;">
                    <option value="">Pilih rating</option>
                </select>
                <input type="text" class="form-control" placeholder="Lokasi" style="margin-bottom: 20px;">
                <button type="submit" class="btn btn-info btn-block">Cari Asisten</button>
            </form>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Asisten dengan rating tinggi</h5>
                
                <div style="margin-top: 30px;">
                <ul>
                    <li><a href="#" class="card-link">Card link</a></li>
                    <li><a href="#" class="card-link">Card link</a></li>
                    <li><a href="#" class="card-link">Card link</a></li>
                    <li><a href="#" class="card-link">Card link</a></li>
                </ul>
                </div>
            </div>
        </div><!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-9">
        <div class="card">
            <div class="card-header" >
                <nav class="navbar navbar-expand-sm">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Semua</a>
                        </li>
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Asisten Pribadi</a>
                        </li>
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Asisten Keuangan</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        @for($i = 0; $i < 10; $i++)
        <div class="card card-primary card-outline">
            <div class="card-body">
            <h5>Nama Asisten</h5>
            <p class="card-text">
                <i class="fa fa-map-marker"></i> Lokasi Asisten <br>
                <i class="fa fa-tag"></i> Kategori Asisten <br><br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque saepe nulla voluptas aut veniam, similique distinctio odit iusto voluptates rerum perspiciatis dignissimos illum sed suscipit in, aliquid nam. Corrupti, ex.
            </p>
            <a href="#" class="btn btn-info">Hire me</a>
            </div>
        </div>
        @endfor
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection