@extends('layouts.app')

@section('content')
    <div class="flex justify-start p-2 md:p-10 lg:pl-16 xl:pl-16 2xl:pl-16 py-8">
        <div class="w-full lg:w-3/5 xl:w-3/5 2xl:w-2/5 rounded">
            <h1 class="w-full bg-blue-900 py-3 px-3 text-white text-lg rounded-tl-md rounded-tr-md">Change Account Settings</h1>
            <form action="{{ route('dashboard.update', auth()->user()) }}" method="post">
                @csrf
                <div class="flex flex-col p-4 shadow-md">
                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="name">Name</label>
                        <input name="name" class="border border-gray-300 w-full py-1 px-2 rounded" type="text" value="{{ isset($user) ? auth()->user()->name : null }}">
                    </div>

                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="email">Email</label>
                        <input name="email" class="border border-gray-300 w-full py-1 px-2 rounded" type="text" value="{{ isset($user) ? auth()->user()->email : null }}">
                    </div>

                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="password">Password</label>
                        <input name="password" class="border border-gray-300 w-full py-1 px-2 rounded" type="password" value="">
                    </div>

                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="street">Street</label>
                        <input name="street" class="border border-gray-300 w-full py-1 px-2 rounded" type="text" value="{{ isset($user) ? auth()->user()->street : null }}">
                    </div>

                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="house_number">House Number</label>
                        <input name="house_number" class="border border-gray-300 w-full py-1 px-2 rounded" type="number" value="{{ isset($user) ? auth()->user()->house_number : null }}">
                    </div>
                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="postal_code">Postal Code</label>
                        <input name="postal_code" class="border border-gray-300 w-full py-1 px-2 rounded" type="text" value="{{ isset($user) ? auth()->user()->postal_code : null }}">
                    </div>

                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="city">City</label>
                        <input name="city"  class="border border-gray-300 w-full py-1 px-2 rounded" type="text" value="{{ isset($user) ? auth()->user()->city : null }}">
                    </div>

                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="country">Country</label>
                        <input name="country"  class="border border-gray-300 w-full py-1 px-2 rounded" type="text" value="{{ isset($user) ? auth()->user()->country : null }}">
                    </div>

                    <div class="flex flex-col gap-y-2 mb-5">
                        <label for="phone">Phone</label>
                        <input name="phone" class="border border-gray-300 w-full py-1 px-2 rounded" type="number" value="{{ isset($user) ? auth()->user()->phone : null }}">
                    </div>

                    <div>
                        <button class="py-2 px-10 text-lg rounded-md bg-blue-800 hover:bg-blue-900 text-white"
                                type="submit">Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
