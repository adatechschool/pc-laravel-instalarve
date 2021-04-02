<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
<div class="min-h-screen bg-gray-100">
    @include('../layouts.navigation')

      <div class="flex flex-col items-center">
    <?php foreach ($posts as $post): ?>
      <div class=" rounded overflow-hidden border w-full lg:w-6/12 md:w-6/12 bg-white mx-3 md:mx-0 lg:mx-0 justify-self-center  my-4">
    <div class="w-full flex justify-between p-3">
      <div class="flex">
        <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
          <img src="https://avatars0.githubusercontent.com/u/38799309?v=4" alt="profilepic">
        </div>
        <span class="pt-1 ml-2 font-bold text-sm"><a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></span>
      </div>

    </div>

    <a href="/posts/{{ $post->id }}">
    <img class="w-full bg-cover" src="{{ $post->img_url }}">
  </a>
    <div class="px-3 pb-2">
      <div class="pt-2">
        <i class="far fa-heart cursor-pointer"></i>
        <span class="text-sm text-gray-400 font-medium">x likes</span>
        <!-- TODO: Ajouter systeme de likes et display -->
      </div>
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-bold mr-2">{{$post->user->name}}</span>{{$post->description}}
        </div>
      </div>
      <!-- TODO: Commentaires -->
      <!-- <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all 14 comments</div>
      <div class="mb-2">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">razzle_dazzle</span> Dude! How cool! I went to New Zealand last summer and had a blast taking the tour! So much to see! Make sure you bring a good camera when you go!
        </div>
      </div> -->
    </div>
  </div>
    <?php endforeach; ?>
  </div>
</div>


</body>
</html>