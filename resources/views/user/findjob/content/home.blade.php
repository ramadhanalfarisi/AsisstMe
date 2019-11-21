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

            <form action="{{route('searchByMenu')}}" method="get">
                <select name="kategori" id="" class="form-control" style="margin-bottom: 10px;">
                    <option value="">Pilih kategori</option>
                    @foreach($kategori as $k)
                    <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
                <select name="rating" id="" class="form-control" style="margin-bottom: 10px;">
                    <option value="">Pilih rating</option>
                    <option value="unrated">Unrated</option>
                    <option value="low">Low Rating</option>
                    <option value="medium">Medium Rating</option>
                    <option value="high">High Rating</option>
                </select>
                <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" style="margin-bottom: 20px;">
                <button type="submit" class="btn btn-info btn-block">Cari Asisten</button>
            </form>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Asisten dengan rating tinggi</h5>
                
                <div style="margin-top: 30px;">
                @php $checker = false; @endphp
                <ul>
                @foreach($asistenRating as $u)
                @if($u->rating > 3)
                @php $checker = true; @endphp
                    <li><a href="#" class="card-link">{{$u->nama}}</a></li>
                @endif
                @endforeach
                </ul>
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
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="{{ route('search') }}" class="nav-link {{(request()->is('assist-search')) ? 'active' : ''}}">Semua</a>
                        </li>
                        @foreach($kategori as $key => $k)
                        @if($key < 4)
                        <li class="nav-item">
                            @if(isset($id) != null && $id == $k->id)
                            <a href="{{route('searchByKategori', $k->id)}}" class="nav-link active">{{$k->name}}</a>
                            @else
                            <a href="{{route('searchByKategori', $k->id)}}" class="nav-link">{{$k->name}}</a>
                            @endif
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
            <h5>{{$as->nama}}
            @if($as->rating != null)
            @for($i = 1; $i <= $as->rating; $i++)
            <i class="fa fa-star fa-xs" style="color: red;"></i>
            @endfor
            @else
            <b>Unrated</b>
            @endif 
            </h5>
            <p class="card-text">
            @if($as->foto_profil == null)
            <i class="fa fa-user fa-3x" style="color: #888;float: right;display: inline-block;border-radius: 60px;box-shadow: 0px 0px 2px #888;padding: 0.5em 0.6em;"></i>
            @else
            <img src="{{ asset('/images/formal/'. $as->foto_profil ) }}" class="img-circle" style="float: right; height: 100px; width: 100px;">
            @endif
                <i class="fa fa-map-marker"></i> {{$as->alamat}} <br>
                <i class="fa fa-tag"></i> {{$as->kategori['name']}}<br><br>
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