@extends('dashboard.layouts.main')
@section('content')
<main id="main" class="main">
    <div class="container mt-5">
        <div class="row justify-content-center mb-3">
            <div class="card col-lg-6">
                <div class="card-title text-center mt-4">
                    <h5>Edit Kategori</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Eror!</strong> Tolong cek kembali data yang dimasukkan!<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Tanggal Dibuat</th>
                                <th scope="col">Tanggal Dirubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $kategori ->nama_kategori}}</td>
                                <td>{{ $kategori ->created_at}}</td>
                                <td>{{ $kategori ->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->
                                   

                    <form method="POST" action="{{ route('categories.update', $kategori->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Masukkan Nama Kategori Baru</label>
                            <input type="name" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori',$kategori ->nama_kategori) }}">
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <a class="btn btn-success" href="{{ route('categories.index') }}">Kembali</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->