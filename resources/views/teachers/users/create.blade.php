@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Tambah Pengguna</h1>
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
                <h3 class="card-title">Tambah Pengguna</h3>
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
            <form action="/pengguna" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo Profile</label>
                        <input name="image" type="file" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Photo">
                      </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pengguna</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama">
                     </div>

                    <div class="form-group">
                        <label for="email"></label>
                        <input required type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password"></label>
                        <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="jabatan"></label>
                        <select required class="form-control" id="jabatan" name="jabatan">
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
