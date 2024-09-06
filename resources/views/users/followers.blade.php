<x-app-layout>
    <!-- Back Button -->
    <div class="flex justify-center mb-6">
        <a href="{{ url()->previous() }}">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 mt-3 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                Back
            </button>
        </a>
    </div>
    
    <!-- Title -->
    <h1 class="text-4xl font-extrabold mb-8 text-center text-white">
        Followers of <span class="text-blue-400">{{ $user->username }}</span> ({{ $followers->count() }})
    </h1>
    
    <!-- Content -->
    <div class="container mx-auto px-4">
        @if($followers->isEmpty())
            <div class="flex justify-center items-center h-64 bg-gray-800 rounded-lg shadow-md">
                <p class="text-gray-400 text-lg">No followers yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($followers as $follower)
                    <x-user-card :user="$follower" />
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
