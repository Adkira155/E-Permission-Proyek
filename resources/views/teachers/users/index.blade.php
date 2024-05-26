@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Data Pengguna</h1>
                </div>
                <div class="btn btn-secondary sub-color2 mx-2 ">
                    {{ \Carbon\Carbon::now()->toDateString() }}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="px-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm m-1" style="width: 150px;">
                        <form action="/cariPengguna" class="input-group input-group-sm">
                            <input type="text" id="email" name="email" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="px-3 py-1 m-1">
                    <a href="/pengguna/create" class="btn btn-primary">Tambah Pengguna</a>
                </div>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><img src="{{asset('storage/photo-user/'.$user->image)}}" width="80" alt="Gambar"></td>
                            <td>{{ $user->jabatan }}</td>
                            <td class="d-flex align-items-center m-1">
                                <a class="btn btn-warning mr-1" href="/pengguna/{{ $user->id }}/edit"><i class="fas fa-pen"></i> edit</a>
                                <form action="/pengguna/{{ $user->id }}" method="post">
                                @method('delete')
                                @csrf
                                    <button class="btn btn-danger" onclick="return confirm('yakin mau hapus data ini?')"><i class="fas fa-trash-alt"></i> hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
