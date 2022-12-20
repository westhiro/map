
    
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2>タイムライン</h2>
        <div>
          <form action="/search" method="GET">
        
          @csrf
        
            <input type="text" name="keyword">
            <input type="submit" value="検索">
          </form>
        </div>
        <div class='reviews'>
          @foreach ($reviews as $review)
               <a href =" {{ url('/user') }}">{{ $review->user->name }}さん</a>
                <div class='review'>
                   <h3 class='spot_name'>
                    <a href="/reviews/{{ $prefecture->id }}/{{ $review->id }}">{{ $review->spot_name }}</a>
                    </h3>
                    <p class='city_name'>{{ $review->city_name }}</p>
                    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteReview({{ $review->id }})">delete</button> 
                    </form>
                </div>
          @endforeach
           <a href='/reviews/create'>新規投稿</a>
           <div class="back">[<a href="/">戻る</a>]</div>
        </div>
    　 <script>
            function deleteReview(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
        　　}
        </script>
    </body>
</html>
