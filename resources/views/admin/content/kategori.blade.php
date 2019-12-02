@extends('admin.dashboard')

@section('content')
<div class="modal fade" id="post_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" >Tambah kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{route('addKategori')}}" method="post">
        {{csrf_field()}}
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
    </div>
    </div>
</div>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Kategori</h1>
            <br />
            <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#post_kategori">
            <i class="fas fa-plus"></i>
            Add
            </a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
            </ol>
            <br>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    @if (Session::has('alert-success'))
    <div class="alert alert-success alert-dismissible" style="margin-top: 10px; margin-bottom: -10px;">
        <a href=""><button type="button" class="close" data-dismiss="alert">&times;</button></a>
        {{Session::get('alert-success')}}
    </div>
    @endif
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th style="width: 2%">
                No
                </th>
                <th style="width: 50%">
                Kategori Name
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($kategori as $key => $k)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $k->name }}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#edit_kategori_{{$k->id}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                </a>
                <!-- Edit modal -->
                <div class="modal fade" id="edit_kategori_{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Edit kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('editKategori', $k->id)}}" method="post">
                        {{csrf_field()}}
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$k->name}}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
                <a class="btn btn-danger btn-sm" href="{{route('deleteKategori', $k->id)}}">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection