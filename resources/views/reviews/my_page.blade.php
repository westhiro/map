<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/my_page.css') }}">
    </head>
    <body>
        <h1>マイページ</h1>
        <div class='back'>
            <a href="/">トップページへ</a>
        </div>
        <p>名前:{{ $my_user->name }}</p>
        <p>メールアドレス:{{ $my_user->email }}</p>
        <div class='content'>
            <div class="own_reviews">
                @foreach($own_reviews as $review)
                    <p>{{ $review->spot_name }}</p>
                    <p>{{ $review->city_name }}</p>
                    <p>{{ $review->date }}</p>
                    <p>{{ $review->body }}</p>
                    <div class="edit">
                        <a href="/reviews/{{ $review->id }}/edit">編集</a>
                    </div>
                    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteReview({{ $review->id }})">delete</button> 
                    </form>
                @endforeach
            </div>
            <div class='nices'>
                @foreach($nices as $nice)
                    <div class='nice'>
                        <p>{{ $nice->spot_name }}</p>
                        <p>{{ $nice->city_name }}</p>
                        <p>{{ $review->date }}</p>
                        <p>{{ $review->body }}</p>
                    </div>
                @endforeach
            </div>
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

</x-app-layout>