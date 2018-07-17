@extends('layouts.app')

@section('content')
    <h1 class="mb-2">Add new film</h1>

    <div class="row">

        <div class="col-12 col-md-6">
            <form class="form-horizontal" method="POST" action="/films/create">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" id="name" placeholder="Film name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea type="text" class="form-control" id="description" placeholder="Description" name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="release_date">Release Date: </label>
                    <input type="date" class="form-control" id="release_date" placeholder="Release Date" name="release_date" required>
                </div>

                <div class="form-group">
                    <label for="rating">Rating: </label>
                    <input type="number" class="form-control" id="rating" placeholder="Rating" name="rating" required>
                </div>

                <div class="form-group">
                    <label for="ticket_price">Ticket Price: </label>
                    <input type="number" class="form-control" id="ticket_price" placeholder="Ticket Price" name="ticket_price" required>
                </div>

                <div class="form-group">
                    <label for="country">Country: </label>
                    <input type="text" class="form-control" id="country" placeholder="Country" name="country" required>
                </div>

                <div class="form-group">
                    <label for="genres">Genres: </label>
                    <select class="form-control" id="genres" name="genres[]" multiple>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="country">Photo Url: </label>
                    <input type="text" class="form-control" id="photo" placeholder="Photo" name="photo" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" value="Send">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
