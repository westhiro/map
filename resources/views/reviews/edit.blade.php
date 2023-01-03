<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
   <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/reviews/{{ $review->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='content__spot_name'>
                <h2>観光名所名</h2>
                <input type='text' name='review[spot_name]' value="{{ $review->spot_name }}">
            </div>
            <div class='content__city_name'>
                <h2>市町村</h2>
                <input type='text' name='review[city_name]' value="{{ $review->city_name}}">
            </div>
            <div class='content__date'>
                <h2>日付</h2>
                <input type='text' name='review[date]' value="{{ $review->date}}">
            </div>
            <div class='content__body'>
                <h2>内容</h2>
                <input type='text' name='review[body]' value="{{ $review->body }}">
            </div>
            @if($review->image_path)
                <h2>画像</h2>
                <img src="{{ $review->image_path }}"　width="150" height="150">
            @endif
            <div class ="image"></div>
                <input type="file" name="image">
            
                
            <div class='content__evaluation'>
                <h2>5段階評価</h2>
                 <span>
                  <input  type="radio" name="review[evaluation]" value="1"><label for="review01">★</label>
                  <input  type="radio" name="review[evaluation]" value="2"><label for="review02">★★</label>
                  <input  type="radio" name="review[evaluation]" value="3"><label for="review03">★★★</label>
                  <input  type="radio" name="review[evaluation]" value="4"><label for="review04">★★★★</label>
                  <input  type="radio" name="review[evaluation]" value="5"><label for="review05">★★★★★</label>
                </span>
            </div>
            <input type="submit" value="保存">
        </form>
        <form action='/reviews/deleteimage/{{ $review->id }}' method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="画像を削除">
        </form>
         <div class="back">[<a href="/reviews/{{ $prefecture->id }}/{{ $review->id }}">戻る</a>]</div>
    </div>
</body>
</html>

</x-app-layout>