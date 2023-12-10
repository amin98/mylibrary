@extends('layouts.app')

@section('content')
    <div class="flex ml-5 mt-10">
        <h1 class="text-lg">Search results for:<span class="font-bold">"{{ $searchRequest }}"</span></h1>
    </div>
    <div class="flex justify-center lg:justify-start xl:justify-start 2xl:justify-start py-8 px-4 w-full lg:w-4/6 xl:w-4/6 2xl:w-4/6">
        <div class="w-full shadow overflow-hidden rounded border-b border-gray-200">
            <div class="flex flex-col w-full">
                <div class="table-header-group bg-blue-900 text-white">
                    <div class="table-row">
                        <div class="table-cell w-full text-left py-3 px-3 uppercase font-semibold text-sm">
                            <h1>Books</h1>
                        </div>
                    </div>
                </div>
                @forelse($books as $book)
                    <a class="w-full text-left py-3 px-3 hover:bg-gray-300"
                       href="{{ route('book.show', ['slug' => $book->slug] )}}">
                        <div class="table-cell w-full  text-left">
                            <span>{{ $book->title }}</span>
                        </div>
                    </a>
                @empty
                    <div class="table-row ">
                        <div class="table-cell w-full  text-left py-3 px-3 hover:bg-gray-300">
                            <div class="flex flex-row hover:bg-gray-300">
                                <h1>No books with {{ $searchRequest }}</h1>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="flex justify-center lg:justify-start xl:justify-start 2xl:justify-start py-8 px-4 w-full lg:w-4/6 xl:w-4/6 2xl:w-4/6">
        <div class="w-full shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="w-full text-left py-3 px-3 uppercase font-semibold text-sm">Authors</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @forelse($authors as $author)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-3">
                            <div class="flex flex-row ">
                                <div>
                                    <a href="{{ route('book.author', $author->slug) }}">{{ $author->name }}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <h1>No authors with {{ $searchRequest }}.</h1>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

