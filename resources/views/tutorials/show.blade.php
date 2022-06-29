@extends('layouts.master')

@section('title', $tutorial->title . ' - ELog')

@section('main-content')
    <div class="container-fluid mt-5 px-lg-3">
        <div class="row">
            <div class="col-12 col-lg-9">
                <h3 class="my-3 mt-3 fw-bolder">
                    {{ $tutorial->title }}
                </h3>
                <div class="row">
                    <div class="col-12">
                        {{ $tutorial->tut_category }}
                    </div>
                    <div class="col-12">
                        <i class="fas fa-user-secret"></i>
                        {{ !is_null($tutorial->username) ? $tutorial->username : $tutorial['author_alt_name'] }}
                    </div>
                    <div class="col-12">
                        <div><i class="far fa-calendar-alt"></i> <span class="text-info">
                                <?php echo date('M j Y, g:i A', strtotime($tutorial->created_at)); ?></span></div>
                    </div>
                </div>
                <div class="shadow shadow-lg bg-light rounded p-4 mt-3 mb-5">
                    {!! $tutorial->content !!}
                </div>
            </div>
            <div class="col-12 col-lg-3 fs-5 mt-lg-5">
                <ul>
                    @foreach ($related_tuts as $tut)
                        @if (request()->route('id') != $tut->Id)
                            <li>
                                <a href="{{ $tut->Id }}">
                                    {{ $tut->title }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection()
