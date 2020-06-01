@extends('layout.main')

@section('title', 'Tambah Data Mahasiswa')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-8">
                
                <h2 class="mt-3">Form Add Data Students</h2>
                
                <form method="post" action="/students">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama" name="nama" value="{{ old('nama') }}">
                        @error ('nama')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="11xxxxxx" name="nip" value="{{ old('nip') }}">
                        @error ('nip')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email@mail.com" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" placeholder="Teknik " name="jurusan" value="{{ old('juruusan') }}">
                    </div>
                    
                    <button class="btn btn-success" type="submit">Add Data</button>
                </form>
                
            
            </div>
        </div>
    </div>
@endsection