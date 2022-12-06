@extends('dashboard-operator.layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>General Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/operator/home' }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Document</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="/operator/document">
                @if(request('kategori'))
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for document" name="search">
                    <button type="submit" class="input-group-text bg-transparent text primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="col-lg-6">
            @if(request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
            @endif
            <select class="form-control" placeholder="Filter Data Berdasarkan Kategori"
                onchange="location = this.value;">
                <option value="">Filter Data Berdasarkan Kategori</option>
                @foreach($kategori as $kat)
                <option value="/operator/document?kategori={{ $kat->nama_kategori }}">
                    <a href="/operator/document?kategori={{ $kat->nama_kategori }}" class="mb-4">
                        {{ $kat->nama_kategori }}
                    </a>
                </option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="float-right my-2">
        @if(request('kategori') OR request('search'))
        <a class="btn btn-success mb-2" href="{{ route('document.create') }}">Tambahkan Dokumen</a>
        <a class="btn btn-secondary mb-2" href="{{ route('document.index') }}">Kembali</a>
        @else
        <a class="btn btn-success mb-2" href="{{ route('document.create') }}">Tambahkan Dokumen</a>
        @endif
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Documents Table</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokumen as $dok)
                                <tr>
                                    <td>{{ $dok->kode }}</td>
                                    <td>{{ date('d-m-Y', strtotime($dok->created_at)) }}</td>
                                    <td>{{ $dok->nomor_surat }}</td>
                                    <td>{{ $dok->nim }}</td>
                                    <td>{{ $dok->nama }}</td>
                                    <td>{{ $dok->kategori->nama_kategori }}</td>
                                    <td>
                                        <form action="{{ route('document.destroy',$dok->id) }}" method="POST">
                                            <a class="btn btn-warning"
                                                href="{{ route('document.show',$dok->id) }}">Tampilkan</a>
                                            <a class="btn btn-primary"
                                                href="{{ route('document.edit',$dok->id) }}">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                        <div class="pagination">
                            {{ $dokumen->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->