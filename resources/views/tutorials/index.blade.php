@extends('layouts.master')

@section('title', 'Tutorials - ELog')
@section('tut-active', 'active')

@section('main-content')
    <div class="container-fluid">
        <div class="text-center my-5">
            <span class="text-dark"><i class="fas fa-book fa-2x"></i></span>
            <span class="text-success fw-bold h3"> Tutorials</span>
        </div>

        <div class="mx-lg-5 px-lg-5">
            <form action="tutorials" method="get">
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
                        <a href="/tutorials" class="btn btn-danger rounded-pill">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    </div>
                </div>
            </form>
            <table class="table rounded">
                <tbody class="">
                    @foreach ($tutorials as $tut)
                        <tr>
                            <td>
                                <div class="px-4 px-lg-5 py-2 shadow shadow-lg bg-white rounded-pill">
                                    <div>
                                        <a href="tutorial/{{ $tut->id }}"
                                            class="h4 text-decoration-none">{{ $tut->title }}</a>
                                    </div>
                                    <div>
                                        <i class="fas fa-book-open"></i>
                                        <span class="text-dark ml-1 mr-5">{{ $tut->name }} </span>
                                    </div>
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="text-info">
                                        {{ date(' M j Y g:i A', strtotime($tut->created_at)) }}
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tutorials->links() }}
        </div>
    </div>
@endsection()
