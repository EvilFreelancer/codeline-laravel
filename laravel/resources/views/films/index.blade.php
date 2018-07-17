@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($films as $film)
            <div class="col-12 col-md-4 mb-4">
                <a class="card" href="/films/{{ $film->slug }}">
                    <img class="card-img-top" src="{{ $film->photo }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-text">{{ $film->name }} <span
                                    class="text-right">{{ $film->release_date }}</span></h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
