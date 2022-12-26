<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-6 text-xl underline">Add a nwe post:</h3>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    {{-- Flash message --}}
                    {{-- @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif --}}
                    @if (session()->has('success'))
                        <div class="fixed bg-green-600 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                            <p>{{ session()->get('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('save-post') }}" method="POST">
                        @csrf
                        <p class="">
                            <label class="block" for="text">Post Title</label>
                            <input
                                class="w-full mb-0 focus:border-blue-400 rounded-md text-black shadow-[2px_2px_5px_2px_gray_inset] @error('title') border-rose-500 @enderror"
                                type="text" name="title" value="{{ old('title') }}" placeholder="Post title here">
                        </p>
                        @error('title')
                            <div class="mt-1 px-2 py-1 rounded-md text-red-700 bg-red-100">{{ $message }}</div>
                        @enderror
                        <p class="mt-4">
                            <label class="block" for="content">Post Content</label>
                            <textarea
                                class="w-full mb-0 rounded-md focus:border-blue-400 text-black shadow-[2px_2px_5px_2px_gray_inset] @error('content') border-rose-500 @enderror"
                                name="content" cols="30" rows="3" placeholder="Post content here">{{ old('content') }}</textarea>
                        </p>
                        @error('content')
                            <div class="mt-1 px-2 py-1 rounded-md text-red-700 bg-red-100">{{ $message }}</div>
                        @enderror
                        <button class="mt-4 px-4 py-2 text-white bg-gray-800 rounded-md hover:bg-gray-700"
                            type="submit">Add
                            Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
