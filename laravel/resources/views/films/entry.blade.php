@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <img class="card-img-top" src="{{ $film->photo }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $film->name }} <span class="text-right">{{ $film->release_date }}</span>
                    </h5>
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        {{ $film->description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="list-group">
                @foreach ($comments as $comment)
                    <div class="list-group-item">
                        <small>{{ $comment->name }}:</small>
                        <br/>
                        {{ $comment->comment }}
                    </div>
                @endforeach
            </div>
            @auth
                <div class="">
                    <form action="/comment/{{ $film->id }}" method="post">
                        {{ csrf_field() }}
                        <textarea class="form-control mt-3 mb-3" name="comment" placeholder="Your message"></textarea>
                        <button type="submit" class="btn btn-primary">Submit message</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>

@endsection
