@extends('dashboard-operator.layouts.main')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Dokumen</h5>
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
                    <form class="row g-3" method="POST" action="/operator/document/{{ $dokumen->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="inputEmail5" class="form-label">Kategori Dokumen</label>
                            <select class="form-control" name="kategori_id" autofocus>
                                @foreach($kategori as $kat)
                                @if(old('kategori_id', $dokumen->kategori_id) == $kat->id)
                                <option value="{{ $kat->id }}" selected>{{ $kat->nama_kategori }}</option>
                                @else
                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Kode Dokumen</label>
                            <input type="text" class="form-control" id="kode" name="kode"
                                value="{{old('kode',$dokumen->kode)}}">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail5" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat"
                                value="{{old('nomor_surat',$dokumen->nomor_surat)}}">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword5" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{old('nim',$dokumen->nim)}}">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress5" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{old('nama',$dokumen->nama)}}">
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label">Lulus</label>
                            <input type="text" class="form-control" id="lulus" name="lulus"
                                value="{{old('lulus',$dokumen->lulus)}}">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Oerdner</label>
                            <input type="text" class="form-control" id="oerdner" name="oerdner"
                                value="{{old('oerdner',$dokumen->oerdner)}}">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Map</label>
                            <input type="text" class="form-control" id="map" name="map"
                                value="{{old('map',$dokumen->map)}}">
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" name="oldFile" value="{{ $dokumen->file }}">
                            @if($dokumen->file)
                            <label for="">Old File</label>
                            <br>
                            <iframe src="{{ asset('storage/'.$dokumen->file) }}" width="50%" height="500px" capture
                                download from browsers>
                            </iframe>
                            @endif
                            <br>
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