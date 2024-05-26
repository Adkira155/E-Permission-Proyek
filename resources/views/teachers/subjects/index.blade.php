@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Mata Pelajaran</h1>
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
                <h3 class="card-title">Mata Pelajaran</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <form action="/cariMapel" class="input-group input-group-sm">
                            <input type="text" id="subject" name="subject" class="form-control float-right" placeholder="Search">
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
                    <a href="/mapel/create" class="btn btn-primary">Tambah Mapel</a>
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
                        @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subject->subject }}</td>
                            <td class="d-flex align-items-center">
                                <a class="btn btn-warning mr-1"  href="/mapel/{{ $subject->id }}/edit">edit</a>
                                <form action="/mapel/{{ $subject->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('yakin mau hapus data ini?')">hapus</button>
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
