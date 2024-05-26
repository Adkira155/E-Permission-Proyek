@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Izin Siswa</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="px-3">
        <div class="card">
            <h5 class="card-header">Izin Siswa</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $permission->user->email }}</h5>
                <p class="card-text">{{ $permission->keterangan }}</p>
            </div>
        </div>
    </div>
@endsection
