@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Jurusan</h1>
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
                <h3 class="card-title">Jurusan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <form action="/cariJurusan" class="input-group input-group-sm">                        
                            <input type="text" id="jurusan" name="jurusan" class="form-control float-right" placeholder="Search">
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
                    <a href="/jurusan/create" class="btn btn-primary">Tambah Jurusan</a>
                </div>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mapel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($majors as $major)                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $major->major }}</td>
                            <td class="d-flex align-items-center">
                                <a href="/jurusan/{{ $major->id }}/edit">edit</a> 
                                <form action="/jurusan/{{ $major->id }}" method="post">
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
