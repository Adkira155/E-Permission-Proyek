@extends('layout.guru')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1>Tambah Kelas</h1>
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
                <h3 class="card-title">Tambah Kelas</h3>
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
            <form action="/kelas" method="post">
                @method('post')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="tingkat_kelas">Tingkat Kelas</label>
                        <select required type="text" class="form-control" id="tingkat_kelas" name="tingkat_kelas" placeholder="Jurusan">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                        </select>
                    </div>
                    @error('tingkat_kelas')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="alphabet">Alphabet</label>
                        <select required type="text" class="form-control" id="alphabet" name="alphabet" placeholder="Jurusan">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>
                        </select>
                    </div>
                    @error('alphabet')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="major">Jurusan</label>
                        <select required type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}">{{ $major->major }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('jurusan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="wali_kelas">ID Wali Kelas</label>
                        <input required type="text" class="form-control" id="wali_kelas" name="wali_kelas" placeholder="ID Wali Kelas, 1, 2, 3">
                    </div>
                    @error('wali_kelas')
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
