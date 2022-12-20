

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reviews</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        {{ $review->user->name }}
        <h1 class="spot_name">
             <h2>観光名所名</h2>
            {{ $review->spot_name }}
        </h1>
        <div class="content">
            <div class="content__review">
                <h2>市町村</h2>
                <p>{{ $review->city_name }}</p>
                <h2>日付</h2>
                <p>{{ $review->date }}</p>
                <h2>内容</h2>
                <p>{{ $review->body }}</p>
                <h2>5段階評価</h2>
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
               @if($review->image_path)
                <h2>画像</h2>
                <img src="{{ $review->image_path }}">
                @endif
            </div>
             <span>
                    <img src="{{asset('img/nicebutton.png')}}" width="30px">
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
        <div class="edit">
            <a href="/reviews/{{ $prefecture->id }}/{{ $review->id }}/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/reviews/{{ $prefecture->id }}">戻る</a>
        </div>
    </body>
</html>
