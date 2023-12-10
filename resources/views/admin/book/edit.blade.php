@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10 mx-2">
        <div class="flex justify-center rounded-md border-2 border-gray-300 shadow-md flex-col p-5 w-full sm:w-4/6 md:w-4/6 lg:w-4/6  xl:w-3/6 2xl:w-5/12">
            <div class="w-full mb-5">
                <h1 class="text-2xl text-left">Edit Book</h1>
            </div>
            <form action="{{ route('admin.book.update' , $book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-y-2 mb-5">
                    <label for="title">Title</label>
                    <input value="{{ isset($book) ? $book->title : null }}" name="title"
                           class="border border-gray-300 w-full py-1 px-2 rounded" type="text">
                </div>
                <div class="flex flex-col gap-y-2 mb-5">
                    <label class="rounded" for="blurb">Blurb</label>
                    <textarea class="border border-gray-300 rounded" name="blurb"
                              rows="10">{{ isset($book) ? $book->blurb : null }}</textarea>
                </div>
                <div class="flex gap-x-3 mb-3">
                    <label class="pt-1" for="author">Author</label>
                    <select class="w-full p-1 bg-gray-200 rounded" name="author_id">
                        @foreach($authors as $author)
                            <option
                                value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : null }}>{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-x-3 mb-7">
                    <label class="pt-1" for="genre">Genre</label>
                    <select class="w-full p-1 bg-gray-200 rounded" name="genre_id">
                        @foreach($genres as $genre)
                            <option
                                value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : null }}>{{ $genre->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5 bg-gray-200 rounded p-2">
                    <label for="image">Image Cover</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <button class="py-2 px-10 text-lg rounded-md bg-blue-800 hover:bg-blue-900 text-white"
                            type="submit">Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

