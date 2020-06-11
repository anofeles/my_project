@extends('thems.layout.index')
@section('section')
    {{--    @dd($testquiz[0]->value)--}}
    <div class="content-wrapper">
            <div class="row">
                @foreach($testquiz as $testquizitem)
                <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                    <a class="nav-link" href="{{route(''.$testquizitem->key.'.add')}}">
                        <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                            <div class="card-body">
                                <h2 class="mb-0">{{$testquizitem->value}}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <a class="nav-link" href="{{route('momxmar')}}" target="_blank">
                            <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                                <div class="card-body">
                                    <h2 class="mb-0">დარეგისტრირებული მომხმარებლები</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                    <a class="nav-link" href="{{assets('frontbild/')}}" target="_blank">
                        <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                            <div class="card-body">
                                <h2 class="mb-0">ტესტის ჩვენება</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                    <a class="nav-link" href="{{route('registration')}}">
                        <div class="card bg-gradient-info text-white text-center card-shadow-info">
                            <div class="card-body">
                                <h2 class="mb-0">რეგისტრაცია</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
    </div>
@endsection
