<x-app-layout>
    <div class="container mx-auto p-6 bg-gray-900 text-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 uppercase">editing post</h1>
    
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-lg font-medium mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Post Title">
                @error('title')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="body" class="block text-lg font-medium mb-2">Body</label>
                <textarea id="body" name="body" rows="6" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-white resize-none focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Post Content">{{ $post->body }}</textarea>
                @error('body')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-start gap-2">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
                      </svg>
                    Save Changes
                </button>
            <a href="{{ url()->previous() }}">
                <button type="button" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                      </svg>
                    Go Back
                </button>
            </a>
            </div>
        </form>
    </div>
    </x-app-layout>