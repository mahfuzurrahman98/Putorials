@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('main-content')
    <div class="container-fluid">
        @if (Session::get('success'))
            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @php
                session()->forget('success');
            @endphp
        @endif

        <div class="mt-5">
            <h2 class="text-center mb-3">
                <span class="text-dark"><i class="fas fa-book"></i></span>
                <span class="text-success fw-bold h3"> Tutorials</span>
            </h2>
            <form action="/admin" method="get">
                <div class="row mb-3 text-center">
                    <div class="col-5">
                        <input type="text" name="title" class="form-control rounded-pill"
                            value="{{ isset($_GET['title']) ? $_GET['title'] : '' }}" placeholder="Enter title">
                    </div>
                    <div class="col-4">
                        <select class="form-control rounded-pill" name="category">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->Id }}"
                                    {{ isset($_GET['category']) && $_GET['category'] == $category->Id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary rounded-pill" type="submit">
                            <i class="me-1 fa-solid fa-magnifying-glass"></i>
                        </button>
                        <a href="/admin" class="btn btn-danger rounded-pill">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    </div>
                </div>
            </form>

            <table class="table table-hover">
                <thead>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Adden On</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($tutorials as $key => $tut)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $tut->title }}</td>
                            <td>{{ $tut->tut_category }}</td>
                            <td>{{ $tut->author_alt_name }}</td>
                            <td>{{ date('Y-m-d H:i:s A', strtotime($tut->created_at)) }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="./admin/view/{{ $tut->Id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="./admin/edit/{{ $tut->Id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="./admin/delete/{{ $tut->Id }}"
                                    onclick="return confirm('Are you sure you want to delete this?');">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tutorials->links() }}
        </div>
    </div>
@endsection()
