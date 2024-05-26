@extends('layout.guru')

@section('container')

{{-- Conten Data Izin Untuk Admin --}}
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Izin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/showizin">Data Izin</a></li>
              <li class="breadcrumb-item active">Khusus Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

         <!-- /.row -->
         <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-tools">
                    <form action="" method="GET">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search" value="">
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                         <th>No</th>
                         <th>Nama Siswa</th>
                         <th>Tanggal</th>
                         <th>Keterangan</th>
                         <th>Status</th>
                         <th>Bukti</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $izin)
                    <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $izin -> id_siswa}}</td>
                      <td>{{ $izin -> tanggal}}</td>
                      <td>{{ $izin -> keterangan}}</td>
                      <td>{{ $izin -> status}}</td>
                      <td>{{ $izin -> image}}</td>
                        @endforeach
                    </tr>
                  </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

{{-- Conten Data Izin --}}
@endsection

