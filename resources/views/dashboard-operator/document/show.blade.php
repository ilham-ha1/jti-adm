@extends('dashboard-operator.layouts.main')
@section('content')
<main id="main" class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show Dokumen </h5>
                    <form class="row g-3">
                        <div class="col-md-12">
                            <label for="inputEmail5" class="form-label">Kategori Dokumen</label>
                            <select class="form-control" name="kategori_id" disabled>
                                <option>{{ $dokumen->kategori->nama_kategori }}</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Kode Dokumen</label>
                            <input type="text" class="form-control" value="{{ $dokumen->kode }}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail5" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" value="{{ $dokumen->nomor_surat }}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword5" class="form-label">NIM</label>
                            <input type="text" class="form-control" value="{{ $dokumen->nim }}" disabled>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress5" class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ $dokumen->nama }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label">Lulus</label>
                            <input type="text" class="form-control" value="{{ $dokumen->lulus }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Oerdner</label>
                            <input type="text" class="form-control" value="{{ $dokumen->oerdner }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Map</label>
                            <input type="text" class="form-control" value="{{ $dokumen->map }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="inputName5" class="form-label">Tanggal</label>
                            <input type="text" class="form-control"
                                value="{{ date('d-m-Y', strtotime($dokumen->created_at)) }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail5" class="form-label">Dibuat Oleh</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="col-md-12 embed-responsive">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                            <iframe src="{{ asset('storage/'.$dokumen->file) }}"
                                width="100%" height="800px" capture download from browsers>
                            </iframe>
                        </div>
                        <div class="text-center">
                            <a href="/operator/document" class="btn btn-success">Kembali</a>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->