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
            <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('request') }}">Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('document') }}">Document</a>
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
                <div class="col-lg-6">
                    <h3 style="text-align: center;">Dokumen CV <a href="" data-toggle="modal" data-target="#cv" class="btn btn-link" style="text-align: center;"><small>Upload</small></a></h3>
                    
                    <img src="{{asset('images/cv/'. $document->foto_cv)}}" alt="" width="400px;" style="padding: 10px;">
                </div>
                <div class="col-lg-6">
                    <h3 style="text-align: center;">Dokumen Portofolio <a href="" data-toggle="modal" data-target="#portofolio" class="btn btn-link" style="text-align: center;"><small>Upload</small></a></h3>
                    
                    <img src="{{asset('images/portofolio/'. $document->portfolio)}}" alt="" width="400px;" style="padding: 10px;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <h3 style="text-align: center;">Foto Profil <a href="" data-toggle="modal" data-target="#formal" class="btn btn-link" style="text-align: center;"><small>Upload</small></a></h3>
                    
                    <img src="{{asset('images/formal/'. $document->foto_profil)}}" alt="" width="400px;" style="padding: 10px; margin-left: -60px;">
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
<div class="modal fade" id="cv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mengubah CV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('documentUpdate', 1) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="">Foto CV</label>
          <input type="file" name="cv" id="" class="form-control" style="margin-bottom: 5px;">
          @if($errors->has('cv'))
          <div class="text-danger">
              {{ $errors->first('cv')}}
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

<div class="modal fade" id="portofolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mengubah Portofolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('documentUpdate', 2) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="">Foto Portofolio</label>
          <input type="file" name="portofolio" id="" class="form-control" style="margin-bottom: 5px;">
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

<div class="modal fade" id="formal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mengubah Foto Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('documentUpdate', 3) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="">Foto Profil</label>
          <input type="file" name="formal" id="" class="form-control" style="margin-bottom: 5px;">
          @if($errors->has('formal'))
          <div class="text-danger">
              {{ $errors->first('formal')}}
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
@endsection