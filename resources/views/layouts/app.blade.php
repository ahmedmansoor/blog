<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<header class="text-gray-600 body-font shadow-sm bg-white py-3 sm:py-4 z-50 fixed w-screen">
    <div class="container  items-center  justify-between  mx-auto flex px-6">
        <!-- <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17 l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>

        </a> -->
        <div>
            <a href="{{ url('/') }}" class="ml-3 text-xl font-semibold no-underline">
                {{ config('app.name', 'Blog') }}
            </a>
        </div>
        <nav class="space-x-4 md:ml-auto flex flex-wrap items-center justify-center text-sm sm:text-base">
            @guest
            <a class="h-9 px-4 pt-1.5 sm:pt-1 md:w-auto tracking-wide text-primary  transition-colors duration-200 border border-primary rounded"
                href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
            <a class="h-9 px-4 pt-1.5 sm:pt-1 tracking-wide text-white transition duration-200 rounded md:w-auto bg-primary hover:bg-primarydark"
                href="{{ route('register') }}">{{ __('Sign Up') }}</a>
            @endif
            @else
            <span>{{ Auth::user()->name }}</span>

            <a href="{{ route('logout') }}" class="no-underline hover:underline" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
            @endguest
        </nav>
    </div>
</header>

<body class="bg-gray-100 min-h-screen antialiased leading-none font-sans">
    <div id="app">
        @yield('content')
    </div>
</body>

<footer class="bg-gray-900 z-50"">
    <!-- <h2 id=" footer-heading" class="sr-only">Footer</h2> -->
    <div class="py-5 mx-auto max-w-7xl sm:px-6 lg:px-16">
        <div class="flex flex-wrap items-baseline lg:justify-center">
            <span class="text-sm font-light text-gray-300"> Copyright © 2021 <a href="https://wickedlabs.dev"
                    class="text-wickedblue hover:text-gray-300" rel="noopener noreferrer">Ahmed Mansoor</a>. Since
                2021 </span>
        </div>
    </div>
</footer>

</html>