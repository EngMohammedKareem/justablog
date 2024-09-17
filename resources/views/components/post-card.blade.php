@props(['post'])

<div class="relative flex flex-col justify-between items-start p-6 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 border border-gray-600 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
    <!-- Profile Picture in the Top Right Corner -->
    <a href="{{ route('users.show', $post->user->username) }}" class="absolute top-4 right-4">
        <img src="{{ $post->user->profile_picture ? asset('storage/' . $post->user->profile_picture) : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' }}" 
             alt="Profile Picture" 
             class="w-16 h-16 rounded-full">
    </a>

    <!-- Post Content -->
    <div class="flex flex-col mb-4 pt-4">
        <a href="{{ route('posts.show', $post) }}">
            <h1 class="text-3xl font-bold text-white mb-2">{{ Str::limit($post->title, 40, '...') }}</h1>
        </a>
        <p class="text-md text-gray-200 mb-4">{{ Str::limit($post->body, 150, '...') }}</p>
        
        <div class="flex items-center mb-2 gap-3">
            <span class="text-md text-gray-400 mr-4"> ❤️ {{ $post->likes->count() }} likes</span>
            <span class="text-md text-gray-400">{{ $post->comments->count() }} comments</span>
            @auth
                <!-- Like Button -->
                <form action="{{ route('posts.like', $post) }}" method="post" id="like-form">
                    @csrf
                    <button type="submit" class="{{ Auth::user()->likes->contains('post_id', $post->id) ? 'bg-red-500 hover:bg-red-700' : 'bg-blue-500 hover:bg-blue-700'}} text-white font-bold py-2 px-8 rounded-full flex items-center">
                        {{ Auth::user()->likes->contains('post_id', $post->id) ? 'Unlike' : 'Like' }}
                    </button>
                </form>
            @endauth
        </div>
        
        <span class="text-sm text-gray-400">
            posted: {{ $post->created_at->diffForHumans() }} by 
            <a href="{{ route('users.show', $post->user) }}" class="text-blue-500 hover:underline">
                {{ $post->user->name }}
            </a>
        </span>
    </div>
</div>