@extends('layout.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Izin</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="px-3">
      <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Pengajuan Izin</h3>
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
          <form action="" method="post">
              @csrf
              @method('post')
              <div class="card-body">
                <input type="hidden" name="id_siswa" value="{{ auth()->user()->id }}">
                  <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input type="date" id="tanggal" name="tanggal" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea id="keterangan" name="keterangan" placeholder="Keterangan" class="form-control"></textarea>
                  </div>
              </div>
              <!-- /.card-body -->
  
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      </div>
    </div>
@endsection
