@extends('layouts.main')

@section('title', 'Ubah Pengguna')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">pengguna</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Data Pengguna</a></li>
        <li class="breadcrumb-item active">Ubah Data pengguna</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">

    <div class="col-md-8">

        <div class="card card-default">
            <div class="card-header d-flex">
                <h3 class="card-title">Form Ubah Pengguna {{$pengguna->name}}</h3>
            </div>

            <form action="{{ route('pengguna.simpan_perbarui', ['id' => $pengguna->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="form-group">
                        <label>Role <b style="color:Tomato;">*</b></label>
                        <select class="form-control select2bs4 @error('role') is-invalid @enderror" name="role" style="width: 100%;">
                            <option hidden disabled selected value>Pilih Role</option>
                            <option value="Super Admin" @php if(($pengguna->role)=='Super Admin') echo 'selected' @endphp>Super Admin</option>
                            <option value="Admin" @php if(($pengguna->role)=='Admin') echo 'selected' @endphp>Admin</option>
                        </select>
                        @error('role')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pengguna.index')}}" class="btn btn-default">Kembali</a>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection
