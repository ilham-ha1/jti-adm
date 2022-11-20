@extends('dashboard.layouts.main')
@section('content')
<main id="main" class="main">
    <div class="container mt-5">
        <div class="row justify-content-center mb-3">
            <div class="card col-lg-6">
                <div class="card-title text-center mt-4">
                    <h5>Edit User</h5>
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $operator ->name}}</td>
                                    <td>{{ $operator ->email}}</td>
                                    <td>{{ $operator ->type}}</td>
                                    <td>{{ $operator ->created_at}}</td>
                                    <td>{{ $operator ->updated_at}}</td>
                                </tr>
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->
                                   
                    <form method="POST" action="{{ route('operators.update', $operator->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama User*
                            </label>
                            <input type="name" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Choose Type</label><br>
                            <select name="type" class="form-check">
                                <option value="0">operator</option>
                               <option value="1">admin</option>
                            </select>
                        </div>
                        <div>
                            *<b>Aturan penamaan:</b> Admin/Operator nama <br>
                            <b>Contoh:</b> Operator Riski
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->