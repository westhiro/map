

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <p>名前:{{ $my_user->name }}</p>
       <p>メールアドレス:{{ $my_user->email }}</p>
       @foreach ($reviews as $review)
           <p>{{ $my_review->spot_name}}</p>
           <p>{{ $my_review->city_name }}</p>
           <p>{{ $my_review->body }}</p>
       @endforeach
      @if($nice)
      <p>{{ $review->spot_name }}</p>
      @endif
      
       <a href="/">戻る</a>
    </body>
</html>
