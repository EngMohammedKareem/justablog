@props(['user'])

<div class="flex flex-col justify-between items-start p-6 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 border border-gray-600 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
    <div class="flex flex-col items-start mb-4">
        <a href="{{ Auth::user()->id === $user->id ? route('dashboard') : route('users.show', $user) }}" class="">
            <h1 class="text-3xl font-bold text-white mb-2">{{ $user->name }}</h1>
        </a>
        <p class="text-md text-gray-300 mb-2">{{ $user->email }}</p>
        @auth
            @if (Auth::user()->following->contains($user))
                <!-- Unfollow Button -->
                <form action="{{ route('users.unfollow', $user) }}" method="POST" class="flex items-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-full flex items-center">
                        Unfollow
                    </button>
                </form>
            @else
                <!-- Follow Button -->
                <form action="{{ route('users.follow', $user) }}" method="POST" class="flex items-center">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-full flex items-center">
                        Follow
                    </button>
                </form>
            @endif
        @endauth
    </div>
    
    <p class="text-md text-gray-200 mb-4">{{ Str::limit($user->bio, 150, '...') }}</p>
    
    <div class="flex items-center mb-2 gap-4">
        <span class="text-md text-gray-400">Followers: {{ $user->follower()->count() }}</span>
        <span class="text-md text-gray-400">Following: {{ $user->following()->count() }}</span>
    </div>
    
    <span class="text-sm text-gray-400">
        Member since: {{ $user->created_at->diffForHumans() }}
    </span>
</div>
