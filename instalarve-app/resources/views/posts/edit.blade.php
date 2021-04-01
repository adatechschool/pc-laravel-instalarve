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
    <form method="POST" action="/posts/{{ $post_id }}">
      {!! method_field('patch') !!}
        @csrf
        <div>
            <x-label for="description" :value="__('Description')" />

            <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $post[0]->description }}" required autofocus/>
        </div>

        <div class="mt-4">
            <x-label for="img_url" :value="__('Url image')"/>

            <x-input id="img_url" class="block mt-1 w-full" type="text" name="img_url" value="{{ $post[0]->img_url }}" required autofocus />
        </div>



            <x-button class="ml-4">
                  {{ __('submit') }}
            </x-button>
        </div>
</div>


</body>
</html>
