@extends('layouts.app')

@section('content')
    <main class="
            md:container md:mx-auto md:max-w-lg md:mt-10
            lg:container lg:mx-auto lg:max-w-lg lg:mt-10
             xl:container xl:mx-auto xl:max-w-lg xl:mt-10
             2xl:container 2xl:mx-auto 2xl:max-w-lg 2xl:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white border-1 rounded-md shadow-sm shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 py-6 px-8 rounded-t-md">
                        {{ __('Register') }}
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                          action="{{ route('register') }}">
                        @csrf

                        <div class="flex flex-wrap">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Name') }}:
                            </label>

                            <input id="name" type="text"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('name')  border-red-500 @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email"
                                   class="border border-gray-300 w-full py-2 px-2 rounded  @error('email')  border-red-500 @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('password') border-red-500 @enderror" name="password"
                                   required autocomplete="new-password" >

                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="border border-gray-300 w-full py-2 px-2 rounded"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        {{--         Street           --}}
                        <div class="flex flex-wrap">
                            <label for="street" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Street
                            </label>

                            <input id="street" type="text"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('street') border-red-500 @enderror" name="street"
                                   required autocomplete="new-password" value="{{ old('street') }}">

                            @error('street')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="housenumber" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Housenumber
                            </label>

                            <input id="house_number" type="number"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('house_number') border-red-500 @enderror"
                                   name="house_number"
                                   required autocomplete="new-password" value="{{ old('house_number') }}">

                            @error('house_number')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="postal_code" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Postal Code
                            </label>

                            <input id="postal-code" type="text"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('postal_code') border-red-500 @enderror"
                                   name="postal_code"
                                   required autocomplete="new-password" value="{{ old('postal_code') }}">

                            @error('postal_code')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="city" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                City
                            </label>

                            <input id="city" type="text"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('city') border-red-500 @enderror" name="city"
                                   required autocomplete="new-password" value="{{ old('city') }}">

                            @error('city')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="country" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Country
                            </label>

                            <input id="country" type="text"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('country') border-red-500 @enderror" name="country"
                                   required autocomplete="new-password" value="{{ old('country') }}">

                            @error('country')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Phone
                            </label>

                            <input id="phone" type="text"
                                   class="border border-gray-300 w-full py-2 px-2 rounded @error('phone') border-red-500 @enderror" name="phone"
                                   required autocomplete="new-password" value="{{ old('phone') }}">

                            @error('phone')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Register') }}
                            </button>

                            <p class="w-full text-md text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                {{ __('Already have an account?') }}
                                <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline"
                                   href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection
