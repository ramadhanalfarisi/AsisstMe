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
                <a class="nav-link" href="{{ url('profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('request') }}">Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Document</a>
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
               <table class="table table-striped">
                    <tr>
                        <th>Email Pelamar</th>
                        <th>Lokasi Pelamar</th>
                        <th>Nomor Telepon Pelamar</th>
                        <th>Penawaran Gaji</th>
                        <th></th>
                    </tr>
                    @foreach($request as $r)
                    <tr>
                        <td>{{$r->email_pencari}}</td>
                        <td>{{$r->lokasi_pencari}}</td>
                        <td>{{$r->notelp_pencari}}</td>
                        <td>{{$r->gaji}}</td>
                        <td>
                        <a href="" class="btn btn-danger" style="padding-right: 15px; padding-left: 15px;"><i class="fa fa-times"></i></a>
                        <a href="" class="btn btn-success"><i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                    @endforeach
               </table>
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