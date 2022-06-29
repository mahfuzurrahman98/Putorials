@extends('layouts.master')

@section('title', 'Home-Elog')
@section('home-active', 'active')
@section('main-content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3">
            @foreach ($tutorials as $tut)
                <div class="col-11 col-md-5 col-lg-3 my-2 mx-3 mx-md-2 mx-lg-4 shadow shadow lg rounded bg-light p-2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quo officiis? Sed iusto obcaecati
                        nulla
                        quidem officia vitae minima, dolorem, nemo quasi animi temporibus vel, blanditiis eligendi aut
                        voluptatem dicta ab recusandae doloribus repellat natus neque! Sapiente, vitae! Quisquam, mollitia.
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection()
