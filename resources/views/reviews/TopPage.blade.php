<x-app-layout>

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
            <p class="search__error" style="color:red">{{ $errors->first('keyword') }}</p>
          </form>
        </div>
        <div class="mypage">
            <a href="/my_page">マイページ</a>
        </div>
        <div class="create">
            <a href="/reviews/create">新規投稿</a>
        </div>
        {{--<div class='prefecture_rank'>
            <p>平均評価が3.5以上の都道府県</p>
                @foreach ($prefecture_averages as $prefecture_average)
                    {{ $prefecture_average->prefecture->name }}
                    {{ $prefecture_average->evaluate }}
                @endforeach
        </div>
        <div class='spot_rank'>
            <p>平均評価が3.5以上の観光名所</p>
                @foreach ($spot_averages as $spot_average)
                    {{ $spot_average->spot_name }}
                    {{ $spot_average->evaluate }}
                @endforeach
        </div>--}}
        @foreach ($prefectures as $prefecture)
        @if ( $prefecture->name == '北海道') 
            <p>北海道・東北地方</p>
        @elseif ( $prefecture->name == '茨城県')
            <p>関東地方</p>
        @elseif ( $prefecture->name == '新潟県')
            <p>中部地方</p>
        @elseif ( $prefecture->name == '滋賀県')
            <p>近畿地方</p>
        @elseif ( $prefecture->name == '鳥取県')
            <p>中国・四国地方</p>
        @elseif ( $prefecture->name == '福岡県')
            <p>九州地方・沖縄県</p>
        @endif
        <div class='prefecture'>
            <a href="/reviews/{{ $prefecture->id }}">{{ $prefecture->name }}</a>
        </div>
        @endforeach
    </body>
</html>

</x-app-layout>