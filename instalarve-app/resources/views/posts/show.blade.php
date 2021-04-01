<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
<div class="min-h-screen bg-gray-100">
    @include('../layouts.navigation')
    <article>
      <?php  if($post->user_id == $id_log): ?>
          <form  action="{{ route('posts.destroy',$post) }}" method="get">
            {!! method_field('delete') !!}
            <button type="submit" name="button">suppr</button>
          </form>
      <?php endif ?>
      {{$post->user->name}}:
      {{$post->description}}
      <img src="{{ $post->img_url }}">
    </article>
</div>


</body>
</html>
