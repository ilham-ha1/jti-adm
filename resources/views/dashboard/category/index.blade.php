@extends('dashboard.layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>General Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div>

    <div class="float-right my-2">
        <a class="btn btn-success" href="{{ route('categories.create') }}">Tambahkan Kategori</a>
    </div>

    <form class="search-form" action="{{ route('searchs') }}" method="GET">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Cari disini" title="Search here">
            <button type="submit" class="input-group-text bg-transparent text primary">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form> 

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table Kategori</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Tanggal Dibuat</th>
                                    <th scope="col">Tanggal Dirubah</th>
                                    <th width="280px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $ktg)
                                    <tr>
                                        <td>{{ $ktg ->nama_kategori}}</td>
                                        <td>{{ $ktg ->created_at}}</td>
                                        <td>{{ $ktg ->updated_at}}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy',$ktg->id) }}" method="POST">
                                                <a data-id="edit-categories" class="btn btn-primary" href="{{ route('categories.edit',$ktg->id) }}">Edit</a>
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
                            {{ $kategori->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

</main><!-- End #main -->