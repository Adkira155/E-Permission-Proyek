@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Verifikasi Data Guru</h1>
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
                <h3 class="card-title">Verifikasi Data Guru</h3>
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
            <form action="/guru" method="post">
                @method('post')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">ID Akun Guru</label>
                        <input required type="number" class="form-control" id="user_id" name="user_id" placeholder="Masukkan ID Akun Guru">
                    </div>
                    <div class="form-group">
                        <label for="name"></label>
                        <input required type="text" class="form-control" id="name" name="name" placeholder="Nama Guru">
                    </div>
                    <div class="form-group">
                        <label for="gender"></label>
                        <select required class="form-control" id="gender" name="gender">
                            <option value="male">Laki-Laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Tanggal Lahir Guru</label>
                        <input required type="date" class="form-control" id="birthday" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="subject"></label>
                        <select required class="form-control" id="subject" name="subject">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->subject }}">{{ $subject->subject }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('subject')
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
