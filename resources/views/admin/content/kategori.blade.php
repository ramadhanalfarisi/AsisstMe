@extends('admin.dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Kategori</h1>
            <br />
            <a class="btn btn-primary btn-sm" href="{{url('/add')}}">
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
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Kategori</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
        </div>
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
            <tr>
                <td>
                1
                </td>
                <td>
                <a> Ramadhan </a>
                <td class="project-actions text-right">
                {{-- <a class="btn btn-primary btn-sm" href="{{url('/detail')}}">
                    <i class="fas fa-folder">
                    </i>
                    View
                </a> --}}
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