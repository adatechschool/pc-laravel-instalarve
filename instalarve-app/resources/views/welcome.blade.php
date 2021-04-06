<x-guest-layout>
    <x-slot name='slot'>
        <article class="flex items-center justify-center h-screen">
            <div class="grid justify-items-center">
                <x-application-logo />
                <div class="flex flex-col items-center">
                    <div class="flex flex-col items-center">
                        <h1 class="name">Instalarve</h1>
                        <p>Un super r&eacute;seau social trop bien !</p>
                    </div>
                    <div>
                        <div class="px-6 py-4 sm:block">
                            <a href="{{route('login')}}" ><x-button class="bg-blue-500 px-2 py-1
                                text-white font-semibold text-sm rounded block text-center
                                sm:inline-block block">{{ __('Log In') }}</x-button></a>
                            <a href="{{route('register')}}" ><x-button class=" px-2 py-1 
                                text-white font-semibold text-sm rounded block text-center
                                sm:inline-block block">
                                            {{ __('Register') }}
                                        </x-button></a>
                        </div>
                    </div>
                </div>
                <footer>
                    Fait avec <i class="text-red-500 fas fa-heart"></i> par 
                    <a href="https://github.com/Nils92" class="font-bold text-red-500">Nils</a>, 
                    <a href="https://github.com/aliceKatkout" class="font-bold text-yellow-500">Alice</a>, 
                    <a href="https://github.com/Francel1n" class="font-bold text-green-500">Francelin </a>, 
                    <a href="https://github.com/QuentinBerard" class="font-bold text-blue-500">Quentin</a> & 
                    <a href="https://github.com/tob-0" class="font-bold text-indigo-500">Thomas</a>.
                </footer>
            </div>
            
        </article>
    </x-slot>
</x-guest-layout>

