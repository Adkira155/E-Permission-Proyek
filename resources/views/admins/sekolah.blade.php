@extends('layout.guru')
@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Data Sekolah</h1>
                </div>
                <div class="btn btn-secondary">
                    {{ \Carbon\Carbon::now()->toDateString() }}
                </div>
            </div>
        </div><!-- /.container-fluid -->

         <!-- About Me Box -->
      <div class="card">
        <div class="card-header sub-color">
          <h3 class="card-title">About School</h3>
        </div>
        <!-- /.card-header -->
        @foreach ($data as $d)

        <div class="card-body">
          <strong><i class="fas fa-school mr-1"></i>Nama Sekolah</strong>
          <p class="text-muted">
           {{ $d -> namasekolah}}
          </p>

          <hr>

          <strong><i class="fas fa-info mr-1"></i>NPSN</strong>
          <p class="text-muted">{{ $d -> npsn}}</p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
          <p class="text-muted">
            <span class="tag tag-primary">{{ $d -> alamat}}</span>
          </p>

          <hr>

          <strong><i class="fas fa-thumbtack mr-1"></i>Kode Post</strong>
          <p class="text-muted">{{ $d -> kodepost}}</p>

          <strong><i class="fas fa-envelope mr-1"></i>Email</strong>
          <p class="text-muted">{{ $d -> email}}</p>

          <strong><i class="far fa-file-alt mr-1"></i>Kelurahan</strong>
          <p class="text-muted">{{ $d -> kelurahan}}</p>

          <strong><i class="far fa-file-alt mr-1"></i>Kecamatan</strong>
          <p class="text-muted">{{ $d -> kecamatan}}</p>

          <strong><i class="far fa-file-alt mr-1"></i>Provinsi</strong>
          <p class="text-muted">{{ $d -> provinsi}}</p>

          <strong><i class="fas fa-hashtag mr-1"></i>Sosial Media</strong>
          <p class="text-muted">{{ $d -> sosmed}}</p>
        </div>

        @endforeach
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

@endsection
