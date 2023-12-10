@extends('layouts.app')

@section('content')
    <div class="mx-0.5 xs:mx-5 sm:mx-10  md:flex lg:flex xl:flex 2xl:flex justify-center py-7 ">
        <div
            class="md:w-11/12 lg:w-10/12 xl:w-10/12 2xl:w-10/12 shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-blue-900">
                <tr>
                    <th scope="col"
                        class="pl-8 py-1 text-left text-md font-medium text-white uppercase tracking-wider">
                        Title
                    </th>
                    @if(count($books))
                        <th scope="col"
                            class="hidden md:table-cell	lg:table-cell xl:table-cell 2xl:table-cell pl-4 py-1 text-left text-md font-medium text-white uppercase tracking-wider">
                            Author
                        </th>
                        <th scope="col"
                            class="hidden md:table-cell	lg:table-cell xl:table-cell 2xl:table-cell pl-4 py-1 text-left text-md font-medium text-white uppercase tracking-wider">
                            Genre
                        </th>
                    @endif
                    <th scope="col"
                        class="hidden md:table-cell	lg:table-cell xl:table-cell 2xl:table-cell pl-2 py-1 text-md font-medium text-white uppercase tracking-wider">
                        Count
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($books as $book)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-3">
                            <div class="flex justify-between">
                                <div class="py-2.5">
                                    <p>{{ $book->title }}</p>
                                </div>
                                <div class="flex justify-evenly gap-x-3 shrink-0 md:hidden lg:hidden xl:hidden 2xl:hidden">
                                    <a class="text-3xl"
                                       href="{{ route('admin.book_copies.store', $book->id) }}">
                                        +
                                    </a>
                                    <p class="p-3">{{ $book->book_copies_count }}</p>

                                    <a class="text-3xl"
                                       href="{{ route('admin.book_copies.destroy', $book->id) }}">
                                        -
                                    </a>
                                </div>
                            </div>
                        </td>
                        @if(count($books))

                            <td class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell px-3 py-2 whitespace-nowrap">
                                <div class="text-md text-gray-900">{{ $book->author->name }}</div>
                            </td>
                            <td class="hidden md:table-cell lg:table-cell xl:table-cell 2xl:table-cell px-3 py-2 whitespace-nowrap">
                <span class="px-2 inline-flex text-md leading-5 rounded-full text-gray-900">
                  {{ $book->genre->title }}
                </span>
                            </td>
                        @endif
                        <td class="hidden  md:table-cell lg:table-cell xl:table-cell 2xl:table-cell px-3 py-2 whitespace-nowrap text-md text-gray-900 flex justify-evenly align-center">
                            <div class="flex justify-evenly gap-x-3 shrink-0 ">
                            <a class="text-3xl"
                               href="{{ route('admin.book_copies.store', $book->id) }}">+</a>
                            <p class="p-3">{{ $book->book_copies_count }}</p>
                            <a class="text-3xl" href="{{ route('admin.book_copies.destroy', $book->id) }}">-</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
