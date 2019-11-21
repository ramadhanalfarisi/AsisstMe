@extends('admin.dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>User</h1>
            <br />
            <a class="btn btn-primary btn-sm" href="{{url('/add')}}">
            <i class="fas fa-plus"></i>
            Add
            </a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
            </ol>
            <br>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">User</h3>
        </div>
        <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                No
                </th>
                <th>
                Username
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $key => $u)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$u->nama}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#check_document_{{$u->id}}">
                    <i class="fas fa-folder">
                    </i>
                    View
                </a>
                <div class="modal fade" id="check_document_{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-body">
                    <form action="" method="post">
                    <input type="text" name="rating" class="form-control" placeholder="Berikan rating">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                        <h3>Foto CV</h3>
                        <img src="{{ asset('images/cv/'.$u->foto_cv) }}" alt="" height="50%" width="450px">
                        <h3>Foto Portfolio</h3>
                        <img src="{{ asset('images/portofolio/'.$u->portfolio) }}" alt="" height="50%" width="450px">
                    </div>
                    <div class="modal-footer">
                    </div>
                    </div>
                </div>
                </div>
                <a class="btn btn-info btn-sm" href="{{url('/edit')}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                </a>
                <a class="btn btn-danger btn-sm" href="#">
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