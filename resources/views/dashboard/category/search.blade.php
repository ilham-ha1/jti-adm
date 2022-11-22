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

    <a class="btn btn-success mt-3" style="margin-left: 10px;" href="{{ route('categories.index') }}">Back</a>
    <form class="search-form" action="{{ route('searchs') }}" method="GET">
        <input type="search" id="search" name="search" class="form-control" placeholder="Search Here" title="Search here">
    </form>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category Table</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th width="280px">Action</th>
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
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->