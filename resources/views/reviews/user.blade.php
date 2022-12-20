@extends('layouts.app')

@section('content')
    <div class="own_reviews">
        @foreach($own_reviews as $review)
            <div>
                <h4><a href="/reviews/{{ $review->id }}">{{ $review->spot_name }}</a></h4>
                <small>{{ $review->user->name }}</small>
                <p>{{ $review->body }}</p>
            </div>
        @endforeach
   
        <div class='paginate'>
            {{ $own_reviews->links() }}
        </div>
    </div>

@endsection