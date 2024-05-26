@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Kelas</h1>
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
                <h3 class="card-title">Kelas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="px-3 py-1">
                    <a href="/kelas/create" class="btn btn-primary">Tambah Kelas</a>
                </div>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($class as $class)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $class->tingkat_kelas }} {{ $class->major->major }} {{ $class->alphabet }}</td>
                            <td>{{ $class->walikelas->name }}</td>
                            <td class="d-flex align-items-center">
                                <a class="btn btn-warning mr-1" href="/kelas/{{ $class->id_kelas }}/edit">edit</a>
                                <form action="/kelas/{{ $class->id_kelas }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"  onclick="return confirm('yakin mau hapus data ini?')">hapus</button>
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
