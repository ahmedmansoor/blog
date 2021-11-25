@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white pt-20">
    <div class="relative flex flex-col lg:pt-0 lg:flex-col lg:pb-0 pt-20 h-screen">
        <div class="flex flex-col items-start w-full max-w-xl px-4 mx-auto lg:px-8 lg:max-w-screen-xl ">
            <div class="mb-8 lg:my-40 lg:max-w-lg lg:pr-5">
                <div class="max-w-xl pt-20 mb-6">
                    <div>
                        <p
                            class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-primary uppercase rounded-full bg-primarylight">
                            Best Blogging website in the region
                        </p>
                    </div>
                    <h2
                        class="font-heading tracking-wide max-w-lg mb-6 text-3xl font-bold text-gray-900 sm:text-4xl sm:leading-none">
                        The Maldives has a long<br class="hidden md:block" />
                        history and rich heritage of
                        <span class="inline-block text-primary">arts and crafts.</span>
                    </h2>
                    <p class="text-base text-gray-700 md:text-lg ">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae. explicabo.
                    </p>
                </div>
                <!-- <div class="flex flex-col items-center md:flex-row">
                    <a class="inline-flex items-center justify-center pb-0.5 w-full h-9 px-6 mb-3 tracking-wide text-white transition duration-200 rounded shadow-md md:w-auto md:mr-4 md:mb-0 bg-primary hover:bg-primarydark focus:shadow-outline focus:outline-none"
                        href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    <a class="inline-flex items-center  justify-center pb-0.5 w-full h-9 px-6 mb-3 tracking-wide text-primary  transition-colors duration-200 border border-primary rounded "
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                </div> -->
            </div>
        </div>
        <!-- <div class="inset-y-0 right-0 bg-hero w-full max-w-xl px-4 mx-auto lg:pl-8 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-1/2 lg:max-w-full lg:absolute xl:px-0">
            <img class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none sm:h-96 lg:h-full" />
        </div> -->
        <div
            class="inset-y-0 right-0 max-w-xl px-4 mx-auto lg:pl-8 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-1/2 lg:max-w-full lg:absolute xl:px-0 ">
            <img
                class="object-cover w-screen h-56 rounded shadow-lg lg:rounded-none lg:shadow-none sm:h-96  lg:h-screen bg-hero bg-cover" />
        </div>
    </div>
</body>

</html>
@endsection