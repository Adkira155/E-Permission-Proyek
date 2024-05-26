@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="btn btn-secondary">
                    {{ \Carbon\Carbon::now()->toDateString() }}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="px-3">
        <div class="card">
            {{-- <h5 class="card-header">Selamat Datang {{ auth()->user()->teacher->name }}</h5> --}}
            <div class="card-body">
                <h5 class="card-title">Dashboard</h5>
                <p class="card-text">Apakah kamu tertarik menelusuri Dashboard?.</p>
            </div>
        </div>
        <div class="d-flex">
            <div class="small-box bg-info w-50">
                <div class="inner">
                    <h3>{{ $countStudents }}</h3>
                    <p>Jumlah Siswa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Lebih <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            <div class="mx-2"></div>
            <div class="small-box bg-gradient-success w-50">
                <div class="inner">
                    <h3>{{ $countClass }}</h3>
                    <p>Jumlah Kelas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Lebih <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Guru</h3>
              <div class="card-tools">
                <form action="/cariGuru" method="get" class="input-group input-group-sm" style="width: 150px;">
                  @method('get')
                  @csrf
                  <input type="text" name="email" id="email" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <div class="px-3 py-1">
                <a href="/guru/create" class="btn btn-primary">Verifikasi Data Guru</a>
              </div>
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Guru</th>
                    <th>Email</th>
                    <th>Mapel</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($teachers as $teacher)
                  <tr>
                    <td>{{ $teacher->id }}</td>
                    @if(isset($teacher->teacher->name))
                      <td>{{ $teacher->teacher->name }}</td>
                    @else
                      <td>undefined</td>
                    @endif
                    <td>{{ $teacher->email }}</td>
                    @if(isset($teacher->teacher->subject))
                      <td>{{ $teacher->teacher->subject }}</td>
                    @else
                      <td>undefined</td>
                    @endif
                    <td class="d-flex align-items-center">
                        <a href="/guru/{{ $teacher->id }}/edit">edit</a>
                        <form action="/guru/{{ $teacher->id }}" method="post">
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
