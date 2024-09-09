<x-app-layout>
    @if (session('comment_updated'))
    <div class="fixed top-4 left-4 bg-green-500 text-white font-bold p-3 rounded-lg shadow-lg flash_message">
        {{ session('comment_updated') }}
    </div>
@endif
@if (session('post_updated'))
<div class="fixed top-4 left-4 bg-green-500 text-white font-bold p-3 rounded-lg shadow-lg flash_message">
    {{ session('post_updated') }}
</div>
@endif
@if (session('comment_deleted'))
    <div class="fixed top-4 left-4 bg-red-500 text-white font-bold p-3 rounded-lg shadow-lg flash_message">
        {{ session('comment_deleted') }}
    </div>
@endif
<div class="container mx-auto p-6 bg-gray-900 text-white rounded-lg shadow-lg">
    
    <!-- Post Section -->
    <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 p-6 rounded-lg shadow-md mb-8">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        <span>posted: {{ $post->created_at->diffForHumans() }} by <a href="{{ Auth::user()->id === $post->user->id ? route('dashboard') : route('users.show', $post->user) }}" class="text-blue-500 hover:underline">{{ $post->user->name }}</a></span>
        <p class="text-lg mb-4"> {!! Str::markdown($post->body) !!} </p>
    </div>

    <div class="flex items-center justify-center space-x-3 my-3">
        <!-- Back Button -->
        <a href="{{ route('posts.index') }}">
            <button type="button" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                  </svg>
                Go Back To Posts
            </button>
        </a>
    
        <!-- Edit Button -->
        @can('update', $post)
        <a href="{{ route('posts.edit', $post) }}">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
                  </svg>
                  
                Edit
            </button>
        </a>
        @endcan
    
        <!-- Delete Button -->
        @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                <svg class="w-6 h-6 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                </svg>
                Delete
            </button>
        </form>
        @endcan
    </div>
    
    <!-- Comments Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-semibold mb-4">Comments ({{ $post->comments->count() }})</h2>
        @forelse($comments as $comment)
            <div class="bg-gray-800 p-4 rounded-lg shadow-md mb-4">
                <p class="text-md text-gray-300"> {!! $comment->html !!} </p>
                <p class="text-sm text-gray-500 mt-2">— {{ $comment->user->name }} on {{ $comment->created_at->format('F j, Y') }}</p>
                <div class="flex items-center justify-start space-x-3 m-3">
                    @can('update', $comment)
                    <a href="{{ route('posts.comments.edit', [$post, $comment]) }}">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Edit</button>
                    </a>
                    @endcan
                     @can('delete', $comment)
                    <form action="{{ route('posts.comments.destroy',[$post, $comment]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg" type="submit">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
        @empty
            <p class="text-gray-400">No comments yet. Be the first to comment!</p>
        @endforelse
        {{ $comments->links() }}
    </div>

    <!-- Comment Form Section -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-3xl font-semibold mb-4">Leave a Comment</h2>
        <form action="{{ route('posts.comments.store', $post) }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="mb-4">
                <textarea name="body" rows="4" class="w-full p-3 bg-gray-700 text-white border border-gray-600 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Your comment..."></textarea>
                @error('body')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-400 text-white font-semibold rounded-lg shadow-md hover:from-blue-400 hover:to-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-colors duration-300 ease-in">
                Post Comment
            </button>
        </form>
    </div>
</div>
<script>
    const flashMessage = document.querySelector('.flash_message');
    if (flashMessage) {
        setTimeout(() => {
            flashMessage.remove();
        }, 3000);
    }
</script>
</x-app-layout>