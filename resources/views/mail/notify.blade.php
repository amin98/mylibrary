@extends('layouts.app')

@section('content')
    <div class="mx-4 flex justify-center py-8">
        <div class=" shadow overflow-hidden rounded border-b border-gray-200">
            <table class=" bg-white">
                <thead class="bg-blue-900 text-white">
                <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Your Ordered Books</th>
                <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Ordered At</th>
                <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Expiration Date</th>
                </thead>
                <tbody>
                @foreach($loan->bookCopies as $book_copy)
                    <tr>
                        <td class=" py-3 px-3">
                            {{ $book_copy->book->title }}
                        </td>
                        <td class=" py-3 px-3">
                            {{ $loan->created_at->diffForHumans()}}
                        </td>
                        <td class=" py-3 px-3">
                            {{ $loan->expired_at }}
{{--                           @dd($loan->expired_at)--}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
