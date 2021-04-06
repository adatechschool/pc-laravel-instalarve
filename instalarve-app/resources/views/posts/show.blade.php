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
      <div class=" rounded overflow-hidden border w-full lg:w-6/12 md:w-6/12 bg-white mx-3 md:mx-0 lg:mx-0 justify-self-center  my-4">
    <div class="w-full flex justify-between p-3">
      <div class="flex">
        <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
          <img src="{{ $post->user->profil_pic}}" alt="profilepic">
        </div>
        <span class="pt-1 ml-2 font-bold text-sm">{{$post->user->name}}</span>
      </div>
      <span class="px-2 hover:bg-gray-300 cursor-pointer rounded">
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div><i class="fas fa-ellipsis-h pt-2 text-lg"></i></div>

                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Authentication -->

                    <?php  if($post->user_id == $id_log): ?>
                        <x-dropdown-link href="/posts/{{$post->id}}/edit">
                            {{ __('Editer ce post') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="/posts/{{$post->id}}">
                          <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit">{{ __('Supprimer ce post') }}</button>
                          </form>
                        </x-dropdown-link>


                        <?php endif ?>

                        <!-- TODO: pouvoir signaler les publication (à qui ? on ne sait pas) -->
                        <x-dropdown-link href="#">
                            {{ __('Signaler cette publication') }}
                        </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div></span>
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
      <?php foreach ($post->comments as $comment): ?>
      <div class="mb-2">
        <div class="mb-2 text-sm">
          <span class="font-bold mr-2">{{ $comment->user->name }}</span> {{ $comment->content }}
        </div>
      </div>
    <?php endforeach ?>
      <form method="POST" action="{{ route('comments.store') }}">
          @csrf
          <div>
              <x-label for="content" :value="__('Mon Commentaire')" />

              <x-input id="content" class="block mt-1 w-full" type="text" name="content" required autofocus/>
          </div>
            <x-input type="hidden" id="post_id" class="block mt-1 w-full" name="post_id" value="{{ $post->id }}"/>
              <x-button class="ml-4">
                    {{ __('submit') }}
              </x-button>
          </div>
        </form>
    </div>
  </div>
  </div>
</div>


</body>
</html>
