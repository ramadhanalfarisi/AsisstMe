@extends('admin.dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>User</h1>
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
                <!-- Rating modal -->
                <div class="modal fade" id="check_document_{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-body">
                        <h3>Foto CV</h3>
                        <img src="{{ asset('images/cv/'.$u->foto_cv) }}" alt="" height="50%" width="465px">
                        <h3 style="margin-top: 10px;">Foto Portfolio</h3>
                        <img src="{{ asset('images/portofolio/'.$u->portfolio) }}" alt="" height="50%" width="465px">

                        <form action="{{route('postRating', $u->id)}}" method="post" style="margin-top: 30px;">
                        {{csrf_field()}}
                            <input type="text" name="rating" class="form-control" placeholder="Berikan rating">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                    </div>
                </div>
                </div>
                <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#edit_user_{{$u->id}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                </a>
                <!-- Edit modal -->
                <div class="modal fade" id="edit_user_{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Edit user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('editUser', $u->id)}}" method="post">
                        {{csrf_field()}}
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$u->nama}}" required>
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{$u->email}}" required>
                            <label for="">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="{{$u->no_telp}}" required>
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control" required>
                                <option value="1" {{ $u->jenis_kelamin == 'Pria' ? 'selected' : ''}}>Pria</option>
                                <option value="2" {{ $u->jenis_kelamin == 'Wanita' ? 'selected' : ''}}>Wanita</option>
                            </select>
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{$u->alamat}}" required>
                            <label for="">Bio</label>
                            <textarea name="bio" id="" cols="30" rows="10" class="form-control" required>{{$u->bio}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
                <a class="btn btn-danger btn-sm" href="{{route('deleteUser', $u->id)}}">
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