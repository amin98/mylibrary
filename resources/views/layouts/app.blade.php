    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <title>{{ config('app.name', 'Library') }}</title>--}}
    <title>Library</title>

    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

{{--    <link rel="stylesheet" href="/css/bootstrap.css">--}}
{{--    <link rel="stylesheet" href="/css/style.css">--}}

<!-- Scripts -->


<!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">--}}
</head>

<body class=" bg-gray-100 h-screen antialiased leading-none font-sans">
<div id="app">
{{--    @dd(auth()->user())--}}
    @php
                $cookie = Cookie::get('wishlist');
                $cookieArray = explode(',', json_decode($cookie));
                $newArray = array_filter($cookieArray);
    @endphp

    <div class="relative min-h-screen md:flex lg:flex xl:flex 2xl:flex">

    <!-- mobile menu bar -->
        <div class="bg-blue-900 text-gray-100 flex justify-between md:hidden lg:hidden xl:hidden 2xl:hidden">
        <!-- logo -->
            <a href="{{ route('home') }}" class="block p-4 text-white">Library</a>

        <!-- mobile menu button -->
            <button class="mobile-menu-button p-4 focus:outline-none">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    <!-- sidebar -->
        <div
            class="sidebar z-50 bg-blue-900 text-blue-100 w-56 space-y-6 py-7 px-2 inset-y-0 left-0 transform
                -translate-x-full  md:translate-x-0 lg:translate-x-0 absolute md:fixed lg:fixed xl:fixed 2xl:fixed
                    xl:translate-x-0 2xl:translate-x-0
                        transition duration-200 ease-in-out">
        <!-- logo -->
            <a href="{{ route('books.index') }}" class="text-white flex flex-row items-center space-x-2 px-4">
                <span class="text-2xl pr-0.5">Library</span>
                {{--                <img class="w-7 h-7 mt-1" src="/img/book.ico" alt="book icon">--}}
            </a>
        <!-- nav -->
            <nav>
            @guest
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white"
                       href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white"
                           href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <input name="search" type="text" placeholder="Search"
                               class="ml-2.5 mb-4 py-1 px-2 w-48 flex text-black flex-col border-2 border-blue-800 rounded-md shadow-md">
                    </form>
                    <a href="{{ route('dashboard', auth()->user()->slug) }}"
                       class="block py-2.5 px-4 rounded font-bold transition duration-200 hover:bg-blue-700 hover:text-white">
                        {{ auth()->user()->name }}
                    </a>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.loans.index') }}"
                           class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                            Loans
                        </a>
                        <a href="{{ route('admin.book_copies.index') }}"
                           class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                            Book Copies
                        </a>
                        <a href="{{ route('admin.book.create') }}"
                           class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                            Add Book
                        </a>
                        <a href="{{ route('admin.author.create') }}"
                           class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                            Add Author
                        </a>
                        <a href="{{ route('admin.genre.create') }}"
                           class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                            Add Genre
                        </a>
                    @endif
                    <a href="{{ route('loans.cart') }}"
                       class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <div class="flex justify-between">
                            <p>Cart</p>
                            <p>
                                @if(!empty(Session::get('loansCart')))
                                    <span class="animate-ping absolute inline-flex mt-0.5 pr-1.5 h-3.5 w-3.5 rounded-full bg-sky-400 opacity-75"></span>
                                    <span class="pl-0.5">{{ count(Session::get('loansCart')) }}</span>

                                @endif
                            </p>
                        </div>
                    </a>
                    <a href="{{ route('wishlist.index') }}"
                       class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <div class="flex justify-between">
                            <p>Wishlist</p>
                            <p class="flex ">
                            @if(!empty($newArray))
                                    <span class="animate-ping absolute inline-flex mt-0.5 pr-1.5 h-3.5 w-3.5 rounded-full bg-blue-400 opacity-75"></span>
                                    <span class="pl-0.5">{{ count($newArray) }}</span>
                                @endif
                            </p>
                        </div>
                    </a>
                    <a href="{{ route('books.index') }}"
                       class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        Books
                    </a>
                    <a href="{{ route('authors.index') }}"
                       class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        Authors
                    </a>
                    <a href="{{ route('genres.index') }}"
                       class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        Genres
                    </a>
                    {{--                    <a href="{{ route('dashboard.account', auth()->user()->name) }}"--}}
                    {{--                       class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">--}}
                    {{--                        Change Settings--}}
                    {{--                    </a>--}}
                    <a href="{{ route('logout') }}"
                       class="block py-2.5 mt-3.5 px-4 rounded italic transition duration-200 hover:bg-blue-700 hover:text-white"
                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </nav>
        </div>

        <!-- content -->
        <div class="flex-1 md:ml-56 lg:ml-56 xl:ml-56 2xl:ml-56">
            <main>
                @yield('content')

            </main>
        </div>
        {{--        @auth--}}
        {{--            @if(auth()->user()->isAdmin() == false)--}}

        {{--                <footer--}}
        {{--                    class="min-w-full bg-gray-200 absolute overflow-hidden bottom-0 h-28--}}
        {{--                     -mb-28 xs:-mb-28 sm:-mb-28 md:-mb-28 lg:mb-0 xl:mb-0 2xl:mb-0--}}
        {{--                     md:pl-56 lg:pl-56 xl:pl-56 2xl:pl-56 ">--}}
        {{--                    <div class="grid justify-items-center content-center h-full gap-y-2">--}}
        {{--                        <h1 class="text-lg italic text-end">Sign up to our newsletter</h1>--}}
        {{--                        <input type="text"--}}
        {{--                               class="w-5/6 sm:w-3/6 md:w-3/6 lg:w-2/6 xl:w-3/12 2xl:w-3/12 border border-gray-500 focus:outline-none py-1 px-2 rounded-md"--}}
        {{--                               placeholder="Your e-mail">--}}
        {{--                    </div>--}}
        {{--                </footer>--}}
        {{--        @endif--}}
        {{--        @endauth--}}
    </div>
</div>
<script src="/js/app.js" defer></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
