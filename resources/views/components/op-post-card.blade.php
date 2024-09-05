@props(['post'])

<div class="flex flex-col justify-between items-start p-6 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 border border-gray-600 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
    <a href="{{ route('posts.show', $post) }}">
            <h1 class="text-3xl font-bold text-white mb-2">{{ Str::limit($post->title, 40, '...') }}</h1>
    </a>

    <p class="text-md text-gray-200 mb-4">{{ Str::limit($post->body, 150, '...') }}</p>
    <div class="flex items-center mb-2 gap-4">
        <span class="text-md text-gray-400 mr-4"> ❤️ {{ $post->likes }} likes</span>
        <span class="text-md text-gray-400">{{ $post->comments->count() }} comments</span>        
        @auth
            <!-- Like Button -->
            <form action="{{ route('posts.like', $post) }}" method="POST" class="flex items-center">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-full flex items-center likebutton">
                    Like
                </button>
            </form>
        @endauth
    </div>
    <span class="text-sm text-gray-400">posted: {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</span>

</div>
