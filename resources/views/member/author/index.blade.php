@extends('layouts.app')

@section('content')
    @if(auth()->user()->isAdmin())
        <div class="flex justify-center sm:justify-start md:justify-start lg:justify-start xl:justify-start 2xl:justify-start
        mx-5 md:mx-10 lg:mx-10 xl:ml-10 2xl:ml-10 py-8">
            <div class="shadow overflow-hidden rounded border-b border-gray-200 w-full lg:w-5/6 xl:w-4/6 2xl:w-3/6">
                <table class="bg-white min-w-full">
                    <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="table-cell text-left py-3 px-4 uppercase font-semibold text-sm">Authors</th>
                        <th class="table-cell text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @forelse($authors as $author)
                        <tr>
                            <td class="w-3/5 text-left py-3 px-4"><a
                                    href="{{ route('book.author', $author->slug) }}">{{ $author->name }}</a>
                            </td>
                            {{--Edit--}}
                            <td class="table-cell">
                                <div class="flex justify-evenly gap-x-7 px-4 shrink-0 ">
                                    <a href="{{ route('admin.author.edit', $author->id )}}" class="text-lg flex shrink-0 hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2 my-1">
                                        <img class="flex shrink-0" src="icons/edit.svg" alt="Edit Icon">
                                    </a>
                                    <a href="{{ route('admin.author.destroy', $author->id )}}" class="text-lg flex shrink-0  hover:bg-gray-200 active:bg-gray-300 rounded-xl p-2 my-1">
                                        <img class="flex shrink-0" src="icons/bin.svg" alt="Delete Icon">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="w-full">
                                <p>Nothing to show...</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="flex justify-center sm:justify-start md:justify-start lg:justify-start xl:justify-start 2xl:justify-start
        mx-5  md:mx-10 lg:mx-10 xl:ml-10 2xl:ml-10 py-8">
            <div class="shadow overflow-hidden rounded border-b border-gray-200 w-full lg:w-5/6 xl:w-4/6 2xl:w-3/6">
                <table class="bg-white w-full">
                    <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Authors</th>
                    </tr>
                    </thead>
                            <tbody class="text-gray-700">
                            @forelse($authors as $author)
                                <tr>
                                    <td class="w-full text-left py-3 px-4 transition hover:bg-blue-200 cursor-pointer">
                                        <a
                                            class="w-full"
                                            href="{{ route('book.author', $author->slug) }}">{{ $author->name }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <p>Nothing to show...</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

