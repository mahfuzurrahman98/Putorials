@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('main-content')
    <div class="container-fluid">
        <form action="/admin/store" method="post">
            @csrf
            <div class="mt-3">
                <div class="row">
                    <div class="col-12 col-lg-4 mt-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter the title" required>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <label for="">Category</label>
                        <select name="category" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->Id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <label for="">Author</label>
                        <input type="text" class="form-control" name="author" placeholder="Enter the author name"
                            required>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="">Content</label>
                        <textarea class="form-control" name="content" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
