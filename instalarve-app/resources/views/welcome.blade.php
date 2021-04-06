<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="http://fonts.cdnfonts.com/css/billabong" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        h1.name {
            font-family: 'Billabong', sans-serif;
            font-size: 5vw;
        }

    </style>
    <title>Instalarve</title>
</head>

<body class="antialiased">

    <article class="flex items-center justify-center h-screen">
        <div class="grid justify-items-center">
            <img class="w-1/12" src='/images/larve.png'>
            <div class="flex flex-col items-center">
                <div class="flex flex-col items-center">
                    <h1 class="name">InstaLarve</h1>
                    <p>Un super r&eacute;seau social trop bien !</p>
                </div>
                <div>
                    @if (Route::has('login'))
                    <div class="px-6 py-4 sm:block">
                        @else
                        <a href="{{route('login')}}" class="bg-blue-500 px-2 py-1
                                text-white font-semibold text-sm rounded block text-center
                                sm:inline-block block">Log In</a>

                        @if (Route::has('register'))
                        <a href="{{route('register')}}" class="bg-gray-300 px-2 py-1 border
                                    text-white font-semibold text-sm rounded block text-center
                                    sm:inline-block block">Register</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </article>
</body>

</html>
