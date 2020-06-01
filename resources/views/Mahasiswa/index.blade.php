@extends('layout.main')

@section('title', 'Daftar Mahasiswa')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">
                
                <h2 class="mt-3">Tabel Daftar Mahasiswa</h2>

                <table class="table">
                    <thead class="thead-dark">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    
                    <tbody>

                        @foreach( $mahasiswa as $mhs )

                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->nip }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->jurusan }}</td>
                            <td>
                                <a href="" class="badge badge-success">Edit</a>
                                <a href="" class="badge badge-danger">Hapus</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection