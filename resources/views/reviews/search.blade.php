<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/search.css') }}">
    </head>
    <body>
        <div class="search">
          <form action="/search/{{ $prefecture->id }}" method="GET">
          @csrf
            <input type="text" name="keyword" placeholder="観光名所名"> 
            <input type="hidden" name="prefecture_id" value="{{ $prefecture->id }}">
            <input type="submit" value="検索">
          </form>
        </div>
        <div class='reviews'>
            <h1>検索結果</h1>
                @foreach($reviews as $review)
                    <div class='review'>
                        <p>{{ $review->user->name }}さん</p>
                        <h2>観光名所名</h2>
                        <P>観光名所名:{{ $review->spot_name }}</p>
                        <h2>市町村</h2>
                        <p>{{ $review->city_name }}</p>
                        <h2>日付</h2>
                        <p>{{ $review->date }}</p>
                        <h2>内容</h2>
                        <p>{{ $review->body }}</p>
                        <h2>評価</h2>
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
                        @if($review->image_path)
                        <h2>画像</h2>
                        <img src="{{ $review->image_path }}" width="150" height="150">
                        @endif
                     </div>
                @endforeach
        </div>
            <div class="back">
            <a href="/">戻る</a>
        </div>
    </body>
</html>

</x-app-layout>