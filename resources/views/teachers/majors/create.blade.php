@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Tambah Jurusan</h1>
                </div>
                <div class="">
                    {{ \Carbon\Carbon::now()->toDateString() }}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="px-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Jurusan</h3>
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
            <form action="/jurusan" method="post">
                @method('post')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="major">Jurusan</label>
                        <input required type="text" class="form-control" id="major" name="major" placeholder="Jurusan">
                    </div>
                    @error('major')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <!-- /.card-body -->
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
