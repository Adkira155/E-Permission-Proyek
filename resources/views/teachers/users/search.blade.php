@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Data Pengguna</h1>
                </div>
                <div class="">
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
                    <div class="input-group input-group-sm" style="width: 150px;">
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
                <div class="px-3 py-1">
                    <a href="/pengguna/create" class="btn btn-primary">Tambah Pengguna</a>
                </div>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)                            
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->jabatan }}</td>
                            <td class="d-flex align-items-center">
                                <a href="/pengguna/{{ $user->id }}/edit">edit</a> 
                                <form action="/pengguna/{{ $user->id }}" method="post">
                                @method('delete')
                                @csrf
                                    <button class="btn btn-link" onclick="return confirm('yakin mau hapus data ini?')">hapus</button>
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
