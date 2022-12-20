

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/TopPage.css') }}">
    </head>
    <body>
        <h1>タイトル</h1>
        <div>
          <form action="/search" method="GET">
        
          @csrf
        
            <input type="text" name="keyword"  placeholder="観光名所名">
            <input type="submit" value="検索">
          </form>
        </div>
        
        <a href="/my_page">マイページ</a>
            @foreach ($prefectures as $prefecture)
                <div class='prefecture'>
                   <a href="/reviews/{{ $prefecture->id }}">{{ $prefecture->name }}</a>
                </div>
            @endforeach
        <a href="/reviews/create">新規投稿</a>
    </body>
</html>


