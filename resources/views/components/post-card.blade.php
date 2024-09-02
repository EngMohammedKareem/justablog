@props(['post'])

<div class="flex flex-col justify-between items-start p-6 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 border border-gray-600 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
    <div class="flex justify-around gap-5">
        <a href="{{ route('posts.show', $post) }}">
            <h1 class="text-3xl font-bold text-white mb-2">{{ $post->title }}</h1>
        </a>
        @auth
        @if (Auth::user()->following->contains($post->user))
            <!-- Unfollow Button -->
            <form action="{{ route('users.unfollow', $post->user) }}" method="POST" class="flex items-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-full flex items-center">
                    Unfollow
                </button>
            </form>
        @else
            <!-- Follow Button -->
            <form action="{{ route('users.follow', $post->user) }}" method="POST" class="flex items-center">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-full flex items-center">
                    Follow
                </button>
            </form>
        @endif
    </div>
@endauth

    <p class="text-md text-gray-200 mb-4">{{ Str::limit($post->body, 150, '...') }}</p>
    <div class="flex items-center mb-2">
        <!-- Heart Icon for Likes -->
        <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
        <span class="text-sm text-gray-400 mr-4">{{ $post->likes }} likes</span>
        
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
