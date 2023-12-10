@extends('layouts.app')

@section('content')
    {{--    @dd($books)--}}
    <div class="mx-0.5 xs:mx-5 sm:mx-10  md:flex lg:flex xl:flex 2xl:flex justify-center py-7 ">
        @if(Session::has('successLoan'))
            <div class="show-and-hide absolute mt-16 px-10 py-2.5 bg-blue-900 text- text-lg rounded-lg">
                <div>
                    <p class="text-white">{{ Session::get('successLoan') }}</p>
                </div>
            </div>
        @endif
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
                        <td class="w-1/3 text-left py-3 px-3">
                            <div class="flex justify-between">
                                <div class="py-2.5">
                                    <p>{{ $book->title }}</p>
                                </div>
                                <div
                                    class="flex justify-evenly gap-x-3 shrink-0 md:hidden lg:hidden xl:hidden 2xl:hidden">
                                    <a class="flex shrink-0 hover:bg-gray-200 active:bg-gray-300 rounded-xl p-3 -mt-1.5"
                                       href="{{ route('book.show', ['slug' => $book->slug] )}}">
                                        <span class="flex shrink-0"><img src="{{URL::asset('/icons/view.svg')}}" alt=""></span>

                                    </a>
                                    <a class="flex shrink-0 text-lg hover:bg-gray-200 active:bg-gray-300 rounded-xl p-3 -mt-1.5"
                                       href="{{ route('loans.cart.destroy', $book->id)}}">
                                        <img src="{{URL::asset('/icons/bin.svg')}}" alt="Delete Icon">

                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell md:w-3/12 lg:w-3/12 xl:w-3/12 2xl:w-3/12 py-3 px-3 ">
                            {{ $book->author->name }}
                        </td>
                        <td class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell md:w-3/12 lg:w-3/12 xl:w-3/12 2xl:w-3/12  py-3 px-3 ">
                            {{ $book->genre->title }}
                        </td>
                        <td class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell ">
                            <div class="flex justify-evenly gap-x-3 shrink-0">
                                <a class="flex shrink-0 mt-1 hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2"
                                   href="{{ route('book.show', ['slug' => $book->slug] )}}">
                                    <span class="flex shrink-0"><img src="{{URL::asset('/icons/view.svg')}}"
                                                                     alt=""></span>
                                </a>
                                <a class="flex shrink-0 text-lg hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2 mt-1"
                                   href="{{ route('loans.cart.destroy', $book->id)}}">
                                    <img src="{{URL::asset('/icons/bin.svg')}}" alt="Delete Icon">
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="w-full">
                            <div class="py-1.5">
                                <h1 class="italic text-lg text-gray-500 text-center">Your cart is empty. Go to the <a
                                        href="{{ route('books.index') }}"><span
                                            class="text-blue-500 hover:text-blue-600 hover:underline">Books</span></a>
                                    page for more books.</h1>
                            </div>
                        </td>
                    </tr>
                @endforelse

                @if(count($books))
                    <tr class="w-full">
                        <td>
                            <form action="{{ route('loans.store', auth()->id() )}}" method="post">
                                @csrf
                                <button class="bg-blue-900 hover:bg-blue-800 px-3 py-3 m-1 rounded text-white" type="submit">
                                    Order
                                </button>
                            </form>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

