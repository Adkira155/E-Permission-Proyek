@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Data Izin</h1>
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
                <h3 class="card-title">Data Izin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->user->email }}</td>
                            <td>{{ $permission->tanggal }}</td>
                            <td class="d-flex align-items-center">
                                <a href="/izin/{{ $permission->id }}">detail</a>
                                <form action="/izin/{{ $permission->id }}/accept" method="get">
                                @method('get')
                                @csrf
                                    <input type="hidden" name="status" value="confirmed">
                                    <button class="btn btn-link" onclick="return confirm('yakin mau menyetujui?')">setuju</button>
                                </form>
                                <form action="/izin/{{ $permission->id }}/reject" method="get">
                                @method('get')
                                @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button class="btn btn-link" onclick="return confirm('yakin mau menolak?')">tolak</button>
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
