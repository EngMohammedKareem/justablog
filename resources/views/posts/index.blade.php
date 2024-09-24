<x-app-layout>
    <div class="m-3">
        @if (session('post_deleted'))
            <div class="fixed top-4 left-4 bg-red-500 text-white p-3 rounded-lg shadow-lg flash_message">
                {{ session('post_deleted') }}
            </div>
        @endif
    </div>
      <!-- Search Form -->
      <div class="m-3">
        <form method="GET" action="{{ route('posts.index') }}" class="flex items-center">
            <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Search posts..." class="w-full py-2 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                Search
            </button>
        </form>
    </div>
    @foreach($posts as $post)
        @if(auth()->user()->id === $post->user_id)
            <x-op-post-card :post="$post"/>
        @else
            <x-post-card :post="$post"/>
        @endif
    @endforeach
    @if($posts->hasPages())
    <div class="p-3">
        {{ $posts->links() }}
    </div>
@endif 
<script>
    $(document).ready(function() {
        const $flashMessage = $('.flash_message');
        if ($flashMessage.length) {
            setTimeout(() => {
                $flashMessage.fadeOut(1000, function() {
                    $(this).remove();
                });
            }, 3000);
        }
    });
    </script>
</x-app-layout>