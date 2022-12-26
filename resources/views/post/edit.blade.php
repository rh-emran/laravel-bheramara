<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-6 text-xl underline">Edit post:</h3>
                    @if (session()->has('success'))
                        <div class="fixed px-4 py-2 text-sm text-white bg-green-600 rounded-xl bottom-3 right-3">
                            <p>{{ session()->get('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('update-post', $post->id) }}" method="POST">
                        {{-- @method('PUT') --}}
                        @csrf
                        <p class="">
                            <label class="block" for="text">Post Title</label>
                            <input
                                class="w-full mb-0 focus:border-blue-400 rounded-md text-black shadow-[2px_2px_5px_2px_gray_inset] @error('title') border-rose-500 @enderror"
                                type="text" name="title" value="{{ $post->title }}" placeholder="Post title here">
                        </p>
                        @error('title')
                            <div class="px-2 py-1 mt-1 text-red-700 bg-red-100 rounded-md">{{ $message }}</div>
                        @enderror
                        <p class="mt-4">
                            <label class="block" for="content">Post Content</label>
                            <textarea
                                class="w-full mb-0 rounded-md focus:border-blue-400 text-black shadow-[2px_2px_5px_2px_gray_inset] @error('content') border-rose-500 @enderror"
                                name="content" cols="30" rows="3" placeholder="Post content here">{{ $post->content }}</textarea>
                        </p>
                        @error('content')
                            <div class="px-2 py-1 mt-1 text-red-700 bg-red-100 rounded-md">{{ $message }}</div>
                        @enderror
                        <button class="px-4 py-2 mt-4 text-white bg-gray-800 rounded-md hover:bg-gray-700"
                            type="submit">Update
                            Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
