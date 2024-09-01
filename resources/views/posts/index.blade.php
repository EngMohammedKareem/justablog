<x-app-layout>
    <div class="m-3">
        <a href="{{ route('posts.create') }}" class="inline-block">
            <button class="bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 text-white font-bold py-2 px-6 rounded-full shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                Create Post
            </button>
        </a>
        
    </div>
    @foreach($posts as $post)
        <x-post-card :post="$post"/>
    @endforeach
    {{ $posts->links() }}
</x-app-layout>