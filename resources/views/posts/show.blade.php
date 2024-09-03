<x-app-layout>
<div class="container mx-auto p-6 bg-gray-900 text-white rounded-lg shadow-lg">
    
    <!-- Post Section -->
    <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 p-6 rounded-lg shadow-md mb-8">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        <span>posted: {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</span>
        <p class="text-lg mb-4">{!! $post->html !!}</p>
    </div>

    <div class="flex items-center justify-center space-x-3 my-3">
        <a href="{{ route('posts.index') }}">
            <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg">Back To Posts</button>
        </a>
        @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg" type="submit">Delete</button>
        </form>
        @endcan
        @can('update', $post)
        <a href="{{ route('posts.edit', $post) }}">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg">Edit</button>
        </a>
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
                    <form action="{{ route('posts.comments.destroy',[$post, $comment]) }}" method="post">
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
</x-app-layout>