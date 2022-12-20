
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>検索結果</h1>
        @foreach($reviews as $review)
        {{ $review->user->name }}さん
        <h2>{{ $review->spot_name }}</h2>
        <h2>{{ $review->body }}</h2>
        <h2>市町村</h2>
                <p>{{ $review->city_name }}</p>
                <h2>日付</h2>
                <p>{{ $review->date }}</p>
                <h2>内容</h2>
                <p>{{ $review->body }}</p>
                <h2>評価</h2>
                <p>{{ $review->evaluation }}</p>
                @if($review->image_path)
                <h2>画像</h2>
                <img src="{{ $review->image_path }}">
                @endif
        @endforeach
        <div class="back">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
