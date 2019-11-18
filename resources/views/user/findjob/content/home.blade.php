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
    <div class="container">
    <div class="row">
        <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title" style="margin-bottom: 30px;">Pilih kriteria</h5>

            <form action="" method="post">
                <select name="" id="" class="form-control" style="margin-bottom: 10px;">
                    <option value="">Pilih kategori</option>
                    @foreach($kategori as $k)
                    <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
                <select name="" id="" class="form-control" style="margin-bottom: 10px;">
                    <option value="">Pilih rating</option>
                    <option value="">Low Rating</option>
                    <option value="">Medium Rating</option>
                    <option value="">High Rating</option>
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
                @php $checker = false; @endphp
                @foreach($asisten as $u)
                <ul>
                @if($u->rating > 3)
                @php $checker = true; @endphp
                    <li><a href="#" class="card-link">{{$u->nama}}</a></li>
                @endif
                </ul>
                @endforeach
                @if($checker == false)
                   <p style="text-align: center;">--- <br>Sementara ini belum terdapat asisten dengan rating tinggi <br>---</p>
                @endif
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
                            <a href="" class="nav-link" style="text-decoration: {{(request()->is('assist-search')) ? 'underline;' : 'none;'}}">Semua</a>
                        </li>
                        @foreach($kategori as $key => $k)
                        @if($key < 4)
                        <li class="nav-item">
                            <a href="{{route('searchByKategori', $k->id)}}" class="nav-link">{{$k->name}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>

        @foreach($asisten as $as)
        <div class="card card-primary card-outline">
            <div class="card-body">
            <h5>{{$as->nama}}</h5>
            <p class="card-text">
            <img src="{{ asset('/images/formal/'. $as->foto_profil ) }}" class="img-circle" alt="foto asisten" style="float: right; height: 100px; width: 100px;">
                <i class="fa fa-map-marker"></i> {{$as->alamat}} <br>
                <i class="fa fa-tag"></i> {{$as->kategori['name']}} <br><br>
                {{$as->bio}}.
            </p>
            <a href="#" class="btn btn-info">Hire me</a>
            </div>
        </div>
        @endforeach
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