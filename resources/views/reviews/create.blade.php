<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link rel="stylesheet" href="{{ asset('/css/create.css') }}">
    </head>
    <body>
        <h1>新規投稿作成</h1>
        <form action="/reviews" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="review">
            <div class="prefecture">
                  <h2>都道府県選択</h2>
                  <select class="prefecture_name" name="review[prefecture_id]">
                        @foreach($prefectures as $prefecture)
                          <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                        @endforeach
                  </select>
            </div>
            <div class="spot">
                <h2>観光名所名</h2>
                <input class ="spot_name" type="text" name="review[spot_name]" placeholder="観光名所名" value="{{ old('review.spot_name') }}"/>
                <p class="spot_name__error" style="color:red">{{ $errors->first('review.spot_name') }}</p>
            </div>
             <div class="city">
                <h2>市町村</h2>
                <input class="city_name" type="text" name="review[city_name]" placeholder="○○市" value="{{ old('review.city_name') }}"/>
            　　<p class="city_name__error" style="color:red">{{ $errors->first('review.city_name') }}</p>
            </div>
            <div class="date">
                <h2>日付</h2>
                <input class="spot_date" type="text" name="review[date]" placeholder="0000-00-00" value="{{ old('review.date') }}"/>
            　　<p class="date__error" style="color:red">{{ $errors->first('review.date') }}</p>
            </div>
            <div class="body">
                <h2>内容</h2>
                <textarea class="spot_body" name="review[body]">{{ old('review.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
                <input type="file" name="image">
            <div class="evaluation">
              <h2>5段階評価</h2>
              <div class="stars" name="review[evaluation]">
              <p class="evaluation__error" style="color:red">{{ $errors->first('review.evaluation') }}</p>
                  <input  type="radio" name="review[evaluation]" value="1"><label for="review01">★</label>
                  <input  type="radio" name="review[evaluation]" value="2"><label for="review02">★★</label>
                  <input  type="radio" name="review[evaluation]" value="3"><label for="review03">★★★</label>
                  <input  type="radio" name="review[evaluation]" value="4"><label for="review04">★★★★</label>
                  <input  type="radio" name="review[evaluation]" value="5"><label for="review05">★★★★★</label>
              </div>
            </div>
        </div>
            <div class="submit">
                <input type="submit" value="保存"/>
            </div>
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
        

    </body>
</html>

</x-app-layout>