@extends('dashboard.layouts.main')
@section('content')
<main id="main" class="main">
    <div class="container mt-5">
        <div class="row justify-content-center mb-3">
            <div class="card col-lg-12">
                <div class="card-title text-center mt-4">
                    <h5>Tambahkan Kategori Baru</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('categories.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="name" class="form-control" id="nama_kategori" name="nama_kategori" autofocus value="{{ old('nama_kategori') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->