@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg pt-36 mx-5">
    <div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-md shadow sm:px-6 md:px-8 lg:px-10 mb-24">
        <div class="self-center mb-6 text-xl font-light text-gray-600 sm:text-2xl">
            Login To Your Account
        </div>
        <div class="mt-8">
            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex flex-col mb-2">
                    <div class="flex relative ">
                        <span
                            class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                </path>
                            </svg>
                        </span>
                        <!-- <input type="text" id="sign-in-email"
                            class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Your email" /> -->
                        <input id="email" type="email"
                            class="@error('email') border-red-500 @enderror w-full border-gray-300 text-sm rounded-r-md flex-1 appearance-none border py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-1 focus:ring-primarydark focus:border-transparent"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                    <div class="flex relative ">
                        <span
                            class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>

                        <input id="password" type="password"
                            class="@error('password') border-red-500 @enderror  w-full border-gray-300 text-sm rounded-r-md flex-1 appearance-none border py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-1 focus:ring-primarydark focus:border-transparent"
                            name="password" required>

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center">
                    <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                        <input type="checkbox" name="remember" id="remember"
                            class="form-checkbox bg-gray-100 p-2 rounded border-gray-300 border"
                            {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2">{{ __('Remember Me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-gray-400 hover:text-gray-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>

                <div class="flex flex-wrap">
                    <button type="submit"
                        class="w-full select-none font-medium whitespace-no-wrap h-10 rounded-md text-base leading-normal no-underline text-gray-100 bg-primary hover:bg-primarydark pb-1 px-4 focus:ring-primarydark focus:ring-offset-primarylight transition ease-in duration-200 text-center shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('register'))
                    <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                        {{ __("Don't have an account?") }}
                        <a class="text-gray-400 hover:text-gray-700 no-underline hover:underline"
                            href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</main>
@endsection