@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Edit Pengguna</h1>
                </div>
                <div class="">
                    {{ \Carbon\Carbon::now()->toDateString() }}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="px-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Pengguna</h3>
            </div>
            @if(session('success'))
            <div class="px-3 pt-4">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/pengguna/{{ $user->id }}" method="post">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ $user->password }}">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select required class="form-control" id="jabatan" name="jabatan">
                            <option value="{{ $user->jabatan }}">{{ $user->jabatan }}</option>
                            <option value="siswa">Siswa</option>
                            <option value="guru">Guru</option>
                        </select>
                    </div>
                    @error('subject')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <!-- /.card-body -->
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
