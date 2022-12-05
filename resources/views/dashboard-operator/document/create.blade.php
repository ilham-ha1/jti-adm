@extends('dashboard-operator.layouts.main')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambahkan Dokumen Baru</h5>
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
                    <form class="row g-3" method="post" action="/operator/document"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="inputEmail5" class="form-label">Kategori Dokumen</label>
                            <select class="form-control" name="kategori_id" autofocus>
                                @foreach($kategori as $kat)
                                <option value={{ $kat->id }}>{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Kode Dokumen</label>
                            <input type="text" class="form-control" id="kode" name="kode">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail5" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword5" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress5" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label">Lulus</label>
                            <input type="text" class="form-control" id="lulus" name="lulus">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Oerdner</label>
                            <input type="text" class="form-control" id="oerdner" name="oerdner">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Map</label>
                            <input type="text" class="form-control" id="map" name="map">
                        </div>
                        <div class="col-md-12">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                            <input class="form-control" type="file" id="file" name="file">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->