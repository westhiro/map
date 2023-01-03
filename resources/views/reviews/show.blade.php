<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reviews</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/show.css') }}">
    </head>
    <body>
        <div class="content">
            <p>{{ $review->user->name }}さん</p>
             <div class="content__review">
                <h1 class="spot_name">
                     <h2>観光名所名</h2>
                    {{ $review->spot_name }}
                </h1>
                <div class ='city_name'>
                    <h2>市町村</h2>
                    <p>{{ $review->city_name }}</p>
                </div>
                <div class ='date'>
                    <h2>日付</h2>
                    <p>{{ $review->date }}</p>
                </div>
                <div class ='body'>
                    <h2>内容</h2>
                    <p>{{ $review->body }}</p>
                </div>
                <div class ='evaluation'>
                    <h2>5段階評価</h2>
                    <div class="stars">
                        @if (($review->evaluation) == 1) 
                        <p>★
                        @elseif (($review->evaluation) == 2)
                            <p>★★
                        @elseif (($review->evaluation) == 3) 
                            <p>★★★
                        @elseif (($review->evaluation) == 4)
                            <p>★★★★
                        @else
                            <p>★★★★★</p>
                        @endif
                    </div>
                </div>
                <div class ='image_path'>
                    @if($review->image_path)
                    <h2>画像</h2>
                    <img src="{{ $review->image_path }}"　width="150" height="150">
                    @endif
                </div>
            </div>
             <span>
                    @if($nice)
                    	<a href="/reply/unnice/{{ $review->id }}" class="btn btn-success btn-sm">
                    		いいね
                    		<span class="badge">
                    			{{ $review->nices->count() }}
                    		</span>
                    	</a>
                    @else
                    	<a href="/reply/nice/{{ $review->id }}" class="btn btn-secondary btn-sm">
                    		いいね
                    		<span class="badge">
                    			{{ $review->nices->count() }}
                    		</span>
                    	</a>
                    @endif
                    </span>
        </div>
        <div class="footer">
            <a href="/reviews/{{ $prefecture->id }}">戻る</a>
        </div>
    </body>
</html>

</x-app-layout>