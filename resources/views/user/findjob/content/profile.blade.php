@extends('user.findjob.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container" style="height: 500px;">
    <div class="row">
        <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
            <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('request') }}">Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('document') }}">Document</a>
            </li>
            </ul>
            </div>
        </div>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-9">
        <div class="card card-primary card-outline">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                <img src="{{ asset('/images/formal/'. Auth::user()->foto_profil ) }}" class="img-circle" alt="Image" height="220px" width="220px">
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col-md-6" style="border-top: 2px solid #808080; border-right: 2px solid #808080; border-bottom: 2px solid #808080;">
                Nama Lengkap
                </div>
                <div class="col-md-6" style="border-top: 2px solid #808080; border-bottom: 2px solid #808080;">
                {{Auth::user()->nama}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="border-right: 2px solid #808080; border-bottom: 2px solid #808080;">
                Alamat
                </div>
                <div class="col-md-6" style="border-bottom: 2px solid #808080;">
                {{Auth::user()->alamat}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="border-right: 2px solid #808080; border-bottom: 2px solid #808080;">
                Email
                </div>
                <div class="col-md-6" style="border-bottom: 2px solid #808080;">
                {{Auth::user()->email}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="border-right: 2px solid #808080; border-bottom: 2px solid #808080;">
                Nomor Telepon
                </div>
                <div class="col-md-6" style="border-bottom: 2px solid #808080;">
                {{Auth::user()->no_telp}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="border-right: 2px solid #808080; border-bottom: 2px solid #808080;">
                Bio
                </div>
                <div class="col-md-6" style="border-bottom: 2px solid #808080;">
                {{Auth::user()->bio}}
                </div>
            </div>
        </div>
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