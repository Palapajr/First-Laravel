@extends('layout.main')

@section('title', 'Daftar Mahasiswa')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-8">
                
                <h2 class="mt-3">Tabel Daftar Students</h2>

                <a href="/students/create" class="btn btn-success my-3">Add Data</a>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
                <ul class="list-group">
                    @foreach ( $students as $sdn )
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                       
                        {{ $sdn->nama }}

                        <a href="/students/{{ $sdn->id }}" class="badge badge-info">Detail</a>
                    </li>
                    @endforeach
                </ul>
            
            </div>
        </div>
    </div>
@endsection