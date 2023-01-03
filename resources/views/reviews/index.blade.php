<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    </head>
    <body>
        <div class="prefecture">
            <h1>{{ $prefecture->name }}</h1>
        </div>
            <div class="search">
                
              <form action="/search/{{ $prefecture->id }}" method="GET">
              @csrf
                <input type="text" name="keyword" placeholder="観光名所名"> 
                <input type="hidden" name="prefecture_id" value="{{ $prefecture->id }}">
                <input type="submit" value="検索">
                <p class="search__error" style="color:red">{{ $errors->first('keyword') }}</p>
              </form>
            </div>
            <div class="create">
                <a href='/reviews/create'>新規投稿</a>
            </div>
            <div class="back">[<a href="/">戻る</a>]</div>
            <div class='reviews'>
                <h2>タイムライン</h2>
                @foreach ($reviews as $review)
                    <div class='review'>
                       <p>ユーザー名:{{ $review->user->name }}さん</p>
                        <a href="/reviews/{{ $prefecture->id }}/{{ $review->id }}">観光名所名:{{ $review->spot_name }}</a>
                        <p class='city_name'>市町村:{{ $review->city_name }}</p>
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
                @endforeach
            </div>
                {{ $reviews->links() }}
    </body>
</html>

</x-app-layout>