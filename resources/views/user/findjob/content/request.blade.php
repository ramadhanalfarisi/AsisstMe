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
                <a class="nav-link" href="{{ url('document') }}">Document</a>
            </li>
            </ul>
            </div>
        </div>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-9">
        @if(Auth::user()->status_hire == 0)
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
                        <a href="{{ route('requestAction', [$r->id, 0]) }}" class="btn btn-danger" style="padding-right: 15px; padding-left: 15px;"><i class="fa fa-times"></i></a>
                        <a href="{{ route('requestAction', [$r->id, 1]) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                    @endforeach
               </table>
            </div>
        </div>
        @else
        <div class="card card-primary card-outline">
            <div class="card-body">
            @php $company = \App\RequestHire::where('status', 1)->where('email_penyedia', Auth::user()->email)->first() @endphp
            <h1>You're already hired to {{ $company->email_pencari }}</h1>
            </div>
        </div>
        @endif
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