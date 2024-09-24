@props(['post'])

<div class="relative flex flex-col justify-between items-start p-4 mx-auto bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 border border-gray-600 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
    <span class="font-medium text-white ">{{ $post->created_at->diffForHumans() }}</span>
    <a href="{{ route('users.show', $post->user->username) }}" class=" text-gray-300 font-medium font-italic">
        &#64;{{ $post->user->name }}
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
    </div>
</div>