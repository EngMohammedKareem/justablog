<x-app-layout>
    <div class="m-3">
        <a href="{{ route('posts.create') }}" class="inline-block">
            <button class="bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 text-white font-bold py-2 px-6 rounded-full shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                Create Post
            </button>
        </a>
        
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
        <x-post-card :post="$post"/>
    @endforeach
</x-app-layout>