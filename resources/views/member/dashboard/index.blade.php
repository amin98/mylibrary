@extends('layouts.app')

@section('content')
    {{--    @dd(auth()->user()->slug)--}}

    @if(Session::has('successUpdateAccount'))
        <div class="show-and-hide absolute p-5 text-white">
            <div class="rounded-lg px-3 py-8 bg-blue-500 shadow-lg">
                <p class="text-xl">Your account settings have been updated!</p>
            </div>
        </div>
    @endif

    <div class="flex justify-center md:justify-start lg:justify-start xl:justify-start 2xl:justify-start
        px-6 py-8 sm:px-10 md:px-16 lg:pl-16 xl:pl-16 2xl:pl-16 overflow-hidden">

        <div class="w-full lg:w-4/6 xl:w-3/6 2xl:w-3/6 rounded-md shadow-md">
            <h1 class="w-full bg-blue-900 py-3 px-3 text-white text-lg rounded-tl-md rounded-tr-md">Current Loan
                Information</h1>
            <div class="min-w-full">

                @forelse($loans as $loan)

                    @if ($loop->last)
                        <div class="py-2">
                            <div class="pb-3 px-3 text-lg italic">Order from: {{ $loan->created_at }}</div>
                            @foreach($loan->bookCopies as $book_copy)
                                <div class="px-3 text-base">{{ $book_copy->book->title }}</div>
                            @endforeach
                        </div>
                    @endif
                @empty
                    <div class="h-24">
                        <p class="px-3 pt-5 text-lg italic text-gray-500">You don't have any loans right now...</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div
        class="flex justify-center md:justify-start lg:justify-start xl:justify-start 2xl:justify-start px-6 sm:px-10 md:px-16 lg:pl-16 xl:pl-16 2xl:pl-16 py-8">

        <div class="w-full lg:w-4/6 xl:w-3/6 2xl:w-3/6 rounded  shadow-md">
            <div
                class="w-full flex justify-between bg-blue-900 py-3 px-3 text-white text-lg rounded-tl-md rounded-tr-md">

                <h1>Wishlist</h1>
                @if(count($cookieBooks))
                    <a class="italic transform transition focus:outline-none duration-100 hover:scale-105"
                       href="{{ route('wishlist.index') }}"> Go to Wishlist >
                    </a>
                @endif

            </div>
            <table>
                <tbody>
                @forelse($cookieBooks as $book)
                    <tr>
                        <td>
                            <div class="py-3 px-3 text-base">{{ $book->title }}</div>
                        </td>
                    </tr>
                @empty
                    <div class="h-24">
                        <p class="px-3 pt-5 text-lg italic text-gray-500">Your wishlist is empty...</p>
                    </div>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div
        class="flex justify-center md:justify-start lg:justify-start xl:justify-start 2xl:justify-start px-6 sm:px-10 md:px-16 lg:pl-16 xl:pl-16 2xl:pl-16 py-8">

        <div class="w-full lg:w-4/6 xl:w-3/6 2xl:w-3/6 rounded  shadow-md">
            <div
                class="w-full flex justify-between bg-blue-900 py-3 px-3 text-white text-lg rounded-tl-md rounded-tr-md">
                <h1>Shopping Cart </h1>
                @if(count($sessionBooks))
                    <a class="italic transform transition focus:outline-none duration-100 hover:scale-105"
                       href="{{ route('loans.cart') }}"> Go to Shopping Cart >
                    </a>
                @endif
            </div>
            <table>
                <tbody>
                @forelse($sessionBooks as $book)
                    <tr>
                        <td>
                            <div class="py-3 px-3 text-base">{{ $book->title }}</div>
                        </td>
                    </tr>
                @empty
                    <div class="h-24">
                        <p class="px-3 pt-5 text-lg italic text-gray-500">Your cart is empty...</p>
                    </div>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div
        class="flex justify-center md:justify-start lg:justify-start xl:justify-start 2xl:justify-start px-6 sm:px-10 md:px-16 lg:pl-16 xl:pl-16 2xl:pl-16 py-8">

        <div class="w-full lg:w-4/6 xl:w-3/6 2xl:w-3/6 rounded">
            <h1 class="w-full bg-blue-900 py-3 px-3 text-white text-lg rounded-tl-md rounded-tr-md">Account
                Information</h1>
            <ul class="flex flex-col gap-y-6 shadow-md py-4 px-3 text-lg">
                <li>Name: <span class="italic">{{ auth()->user()->name }}</span></li>
                <li>Email: <span class="italic">{{ auth()->user()->email }}</span></li>
                <li>Street: <span class="italic">{{ auth()->user()->street }}</span> <span
                        class="italic">{{ auth()->user()->house_number }}</span></li>
                <li>Postal Code: <span class="italic">{{ auth()->user()->postal_code }}</span></li>
                <li>City: <span class="italic">{{ auth()->user()->city }}</span></li>
                <li>Country: <span class="italic">{{ auth()->user()->country }}</span></li>
                <li>Phone: <span class="italic">{{ auth()->user()->phone }}</span></li>
                <li class="mt-2"><a class="py-1 px-8 text-lg rounded-md bg-blue-800 hover:bg-blue-900 text-white"
                                    href="{{ route('dashboard.edit', auth()->user()->slug) }}">Change Data</a></li>
            </ul>
        </div>
    </div>
@endsection
