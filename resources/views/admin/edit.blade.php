{{-- @php
var_dump($tutorial);
die();
@endphp --}}

@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('main-content')
    <div class="container-fluid">
        <form action="/admin/update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $tutorial->id }}">
            <div class="mt-3">
                <div class="row">
                    <div class="col-12 col-lg-4 mt-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $tutorial->title }}"
                            placeholder="Enter the title" required>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <label for="">Category</label>
                        <select name="category" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->Id }}"
                                    {{ $tutorial->category == $category->Id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <label for="">Author</label>
                        <input type="text" class="form-control" name="author" value="{{ $tutorial->author_alt_name }}"
                            placeholder="Enter the author name" required>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="">Content</label>
                        <textarea class="form-control" name="content" cols="30" rows="10" required>{{ $tutorial->content }}</textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
