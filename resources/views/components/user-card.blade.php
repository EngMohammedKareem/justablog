@props(['user'])

<div class="flex flex-col p-6 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 border border-gray-600 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
    <div class="flex items-start mb-4">
        <!-- Profile Picture -->
        <a href="{{ Auth::check() && Auth::id() === $user->id ? route('dashboard') : route('users.show', $user->username) }}">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' }}" 
                 alt="Profile Picture" 
                 class="w-16 h-16 rounded-full">
        </a>

        <!-- User Details -->
        <div class="flex flex-col ml-4">
            <a href="{{ Auth::check() && Auth::id() === $user->id ? route('dashboard') : route('users.show', $user->username) }}" class="flex flex-col">
                <h1 class="text-3xl font-bold text-white mb-2">{{ $user->name }}</h1>
                <p class="text-md text-gray-300 mb-2">&#64;{{ $user->username }}</p>
            </a>
        </div>
    </div>

    <div class="flex justify-between items-center mb-4">
        @auth
            @if (Auth::user()->following->contains($user))
                <!-- Unfollow Button -->
                <form action="{{ route('users.unfollow', $user->username) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                        Unfollow
                    </button>
                </form>
            @else
                <!-- Follow Button -->
                <form action="{{ route('users.follow', $user->username) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Follow
                    </button>
                </form>
            @endif
        @endauth
    </div>

    <p class="text-md text-gray-200 mb-4">{{ Str::limit($user->bio, 150, '...') }}</p>

    <div class="flex items-center gap-4 mb-2">
        <span class="text-md text-gray-400">Followers: {{ $user->follower()->count() }}</span>
        <span class="text-md text-gray-400">Following: {{ $user->following()->count() }}</span>
    </div>

    <span class="text-sm text-gray-400">
        Member since: {{ $user->created_at->diffForHumans() }}
    </span>
</div>
