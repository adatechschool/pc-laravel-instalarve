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

    <header class="flex flex-wrap  p-4 md:py-8">
        <div class='w-screen flex flex-row'>
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

            </div>

    <p>{{ $user->biography }} ! </p>
    
  </div>
</div>
  </header>
  <div class="w-1/2 flex flex-col items-center">
  <form method="POST" action="/users/{{ $user_id }}">
    {!! method_field('patch') !!}
      @csrf
      <div>
          <x-label for="biography" :value="__('Description')" />

          <x-input id="biography" class="block mt-1 w-full" type="text" name="biography" value="{{ $user->biography }}" required autofocus/>
      </div>

      <div class="mt-4">
          <x-label for="profil_pic" :value="__('Url image')"/>

          <x-input id="profil_pic" class="block mt-1 w-full" type="text" name="profil_pic" value="{{ $user->profil_pic }}" required autofocus />
      </div>



          <x-button class="ml-4">
                {{ __('submit') }}
          </x-button>
  </form>
</div>
</div>



</body>
</html>
