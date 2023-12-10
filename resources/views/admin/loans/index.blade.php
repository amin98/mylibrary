@extends('layouts.app')

@section('content')
    <div id="table-view"
         class="mx-0.5  md:flex lg:flex xl:flex 2xl:flex justify-center py-5 ">
        <div
            class="md:w-10/12 lg:w-10/12 xl:w-10/12 2xl:w-10/12 shadow overflow-hidden rounded border-b border-gray-200">
            <div class="bg-blue-900 text-white">
                <div class=" w-full text-left py-3 px-3 uppercase font-semibold text-sm">
                    <h1>Members</h1>
                </div>
            </div>
            <div class="flex flex-col min-w-full bg-white">
                @forelse($loans as $loan)
                    <div class="w-full flex justify-between py-3 px-3 border-t border-gray-500">
                        <div class="flex flex-col">
                            <h1 class="text-xl font-bold">{{ $loan->user->name }}, <span class="opacity-75">Member ID: {{ $loan->user->id }},
                                Loan ID: {{ $loan->id }}</span></h1>
                            <div class="py-2">
                                <div class="pb-2 px-3 text-lg italic">Order from: {{ $loan->created_at }}</div>
                                @foreach($loan->bookCopies as $book_copy)
                                    <div class="px-3 text-base">
                                        {{ $book_copy->book->title }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if($loan->handed_in == 0)
                            <div class="mt-3">
                                <a class="px-3 py-2 text-lg bg-lime-300 hover:bg-lime-400 border-lime-500 rounded-md border"
                                   href="{{ route('admin.loans.update' , $loan->id) }}">Hand In
                                </a>
                            </div>
                        @else
                            <div>
                                <p class="italic px-3 py-2 bg-gray-300 opacity-75 rounded-md">This Loan has been handed in.</p>
                            </div>
                        @endif
                    </div>
                @empty
                    No loans
                @endforelse
            </div>
        </div>
    </div>

@endsection
