@extends('dashboard.layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>General Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Operator</li>
            </ol>
        </nav>
    </div>
    <div class="float-right my-2">
        <a class="btn btn-success" href="{{ route('operators.create') }}">Tambahkan User</a>
    </div>
    <form class="search-form" action="{{ route('opt-search') }}" method="GET">
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
                        <h5 class="card-title">Tabel Operator</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Tanggal Dibuat</th>
                                    <th scope="col">Tanggal Dirubah</th>
                                    <th width="280px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($operator as $opt)
                                    <tr>
                                        <td>{{ $opt ->name}}</td>
                                        <td>{{ $opt ->email}}</td>
                                        <td>{{ $opt ->type}}</td>
                                        <td>{{ $opt ->created_at}}</td>
                                        <td>{{ $opt ->updated_at}}</td>
                                        <td>
                                            <form action="{{ route('operators.destroy',$opt->id) }}" method="POST">
                                                <a data-id="edit-operators" class="btn btn-primary" href="{{ route('operators.edit',$opt->id) }}">Edit</a>
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
                            {{ $operator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->