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
    <header class="flex flex-wrap items-center p-4 md:py-8">

          <div class="md:w-3/12 md:ml-16">
            <!-- profile image -->
            <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full
                         border-2 border-pink-600 p-1" src="{{$user->profil_pic}}" alt="profile">
          </div>

          <!-- profile meta -->
          <div class="w-8/12 md:w-7/12 ml-4">
            <div class="md:flex md:flex-wrap md:items-center mb-4">
              <h2 class="text-3xl inline-block font-light md:mr-2 mb-2 sm:mb-0">
                {{$user->name}}
              </h2>

              <!-- follow button -->
              <a href="#" class="bg-blue-500 px-2 py-1
                            text-white font-semibold text-sm rounded block text-center
                            sm:inline-block block">Follow</a>
            </div>

    <p>{{ $user->biography }} ! </p>
  </div>
  </header>
    <div class="container mx-auto p-8">
      <div class="flex flex-row flex-wrap -mx-2 items-center">

    <?php foreach ($posts as $post): ?>
      <div class="w-full sm:w-1/3 h-32 w:32 md:h-1/3 px-2 py-2 rounded overflow-hidden border bg-white mx-3 md:mx-0 lg:mx-0 justify-self-center  my-4 mx-4">

    <a href="/posts/{{ $post->id }}">
    <img class="w-full bg-cover" src="{{ $post->img_url }}">
  </a>
  <div class="w-f flex gap-5">
  <div class="pt-2">
    <i class="far fa-heart cursor-pointer"></i>
    <span class="text-sm text-gray-400 font-medium">x likes</span>
    <!-- TODO: Ajouter systeme de likes et display -->
  </div>
  <div class="pt-2">
    <a href="/posts/{{ $post->id }}">
      <i class="far fa-comment cursor-pointer"></i>
      <span class="text-sm text-gray-400 font-medium">{{ $post->comments->count() }}</span>
    </a>
    <!-- TODO: Ajouter systeme de likes et display -->
  </div>
</div>
    </div>
  </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
</div>



</body>
</html>
