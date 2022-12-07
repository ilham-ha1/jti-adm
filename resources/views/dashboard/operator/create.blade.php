@extends('dashboard.layouts.main')
@section('content')
<main id="main" class="main">
    <div class="container mt-5">
        <div class="row justify-content-center mb-3">
            <div class="card col-lg-6">
                <div class="card-title text-center mt-4">
                    <h5>Tambahkan User Baru</h5>
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
                    <form method="post" action="{{ route('operators.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama
                            </label>
                            <input type="name" class="form-control" id="name" name="name" autofocus  value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label><br>
                            <select name="type" class="form-select"  >
                               <option value="0">Operator</option>
                               <option value="1">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <a class="btn btn-success"  href="{{ route('operators.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->