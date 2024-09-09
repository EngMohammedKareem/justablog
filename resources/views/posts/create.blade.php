<x-app-layout>
<div class="container mx-auto p-6 bg-gray-900 text-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Create a New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-lg font-medium mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full p-3 bg-gray-700 border rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Post Title">
            @error('title')
                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="body" class="block text-lg font-medium mb-2">Body</label>
            <textarea id="body" name="body" rows="6" class="w-full p-3 bg-gray-700 border rounded-lg text-white resize-none focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Post Content">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post Now</button>
    </form>
</div>
</x-app-layout>