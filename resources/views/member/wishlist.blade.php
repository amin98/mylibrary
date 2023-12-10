@extends('layouts.app')

@section('content')
    <div class="mx-0.5 xs:mx-5 sm:mx-10  md:flex lg:flex xl:flex 2xl:flex justify-center py-7 relative">
        <div
            class="md:w-11/12 lg:w-10/12 xl:w-10/12 2xl:w-10/12 shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white ">
                @if(count($books))
                    <thead class="bg-blue-900 text-white table-header-group">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">
                            Book Title
                        </th>
                        <th class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell text-left py-3 px-3 uppercase font-semibold text-sm">
                            Author
                        </th>
                        <th class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell text-left py-3 px-3 uppercase font-semibold text-sm">
                            Genre
                        </th>
                        <th class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell text-left py-3 px-3 uppercase font-semibold text-sm">

                        </th>
                    </tr>
                    </thead>
                @endif
                <tbody class="text-gray-700">
                @forelse($books as $book)
                    <tr>
                        <td class="md:w-5/12 lg:w-5/12 xl:w-5/12 2xl:w-5/12 text-left py-3 px-3">
                            <div class="flex justify-between">
                                <div>
                                    <p>{{ $book->title }}</p>
                                </div>
                                <div
                                    class="flex md:hidden lg:hidden xl:hidden 2xl:hidden justify-evenly shrink-0 gap-x-3 ">
                                    <a class="flex shrink-0 hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2 "
                                       href="{{ route('book.show', ['slug' => $book->slug]  )}}">
                                        <span class="flex shrink-0"><img src="{{URL::asset('/icons/view.svg')}}"
                                                                         alt="View Icon"></span>
                                    </a>
                                    @if($book->firstAvailableBookCopyId())
                                        <form class="flex shrink-0"
                                              action="{{ route('loans.cart.store', [$book->firstAvailableBookCopyId(), 'slug' => $book->slug]) }}"
                                              method="post">
                                            @csrf
                                            <button
                                                class="flex shrink-0  text-lg hover:bg-gray-200  active:bg-gray-300  rounded-xl p-2"
                                                type="submit">
                                                <img src="{{URL::asset('/icons/cart.svg')}}" alt="Delete Icon">
                                            </button>
                                        </form>
                                    @else
                                        Niet op voorraad
                                    @endif
                                    <a class="flex shrink-0 text-lg hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2"
                                       href="{{ route('wishlist.destroy', $book->id )}}">
                                        <img src="{{URL::asset('/icons/bin.svg')}}" alt="Delete Icon">
                                    </a>
                                </div>
                            </div>
                        <td class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell py-3 px-3 ">
                            {{ $book->author->name }}
                        </td>
                        <td class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell  py-3 px-3 ">
                            {{ $book->genre->title }}
                        </td>
                        <td class=" hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell ">
                            <div class="flex justify-evenly gap-x-3 px-4 shrink-0">
                                <a class="flex shrink-0 hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2"
                                   href="{{ route('book.show', ['slug' => $book->slug]  )}}">
                                    <span class="flex shrink-0"><img src="{{URL::asset('/icons/view.svg')}}"
                                                                     alt=""></span>
                                </a>
                                @if($book->firstAvailableBookCopyId())
                                    <form class="flex shrink-0"
                                          action="{{ route('loans.cart.store',[$book->firstAvailableBookCopyId(), 'slug' => $book->slug]) }}"
                                          method="post">
                                        @csrf
                                        <button
                                            class="flex shrink-0  text-lg hover:bg-gray-200  active:bg-gray-300  rounded-xl p-2"
                                            type="submit">
                                            <img src="{{URL::asset('/icons/cart.svg')}}" alt="Delete Icon">
                                        </button>
                                    </form>
                                @else
                                    Niet op voorraad
                                @endif
                                <a class="flex shrink-0 text-lg hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2"
                                   href="{{ route('wishlist.destroy', $book->id)}}">
                                    <img src="{{URL::asset('/icons/bin.svg')}}" alt="Delete Icon">
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="w-full">
                            <div class="py-1.5">
                                <h1 class="italic text-lg text-gray-500 text-center">Your wishlist is empty. Go to the <a
                                        href="{{ route('books.index') }}"><span
                                            class="text-blue-500 hover:text-blue-600 hover:underline">Books</span></a>
                                    page for more books.</h1>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
