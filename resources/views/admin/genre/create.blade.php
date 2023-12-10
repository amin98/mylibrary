@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10">
        <div class="flex justify-center rounded-md border-2 border-gray-300 shadow-md flex-col p-5 w-full sm:w-4/6 md:w-4/6 lg:w-4/6  xl:w-3/6 2xl:w-2/6">
            <div class="flex flex-col justify-center gap-2">
                <form action="{{ route('admin.genre.store') }}" method="post">
                    @csrf
                    <div class="mb-5">
                        <h1 class="text-xl">Add Genre</h1>
                    </div>
                    <div class="flex flex-col gap-y-2 mb-3">
                        <label for="genre">Genre</label>
                        <input name="title" class="border border-gray-300 w-full py-2 px-2 rounded @error('title') border-red-500 @enderror" type="text">
                        @error('title')
                        <p class="text-red-500 text-lg italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <button class="py-2 px-10 text-base rounded-md bg-blue-800 hover:bg-blue-900 text-white" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
