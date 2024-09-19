<x-app-layout>
   @php
       $followersCount = $user->follower ? $user->follower()->count() : 0;
       $followingCount = $user->following ? $user->following()->count() : 0;
       $hasSpecialBadge = $user->hasSpecialPowers();
   @endphp

   <div class="bg-gray-900 text-white py-12 px-6">
       <div class="max-w-4xl mx-auto flex flex-col items-center">
           <!-- Profile Header -->
           <div class="bg-gray-800 rounded-full mb-6">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'}}" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">

         </div>

           <div class="text-center">
               <!-- Display the name of the user being viewed and action button -->
               <div class="flex justify-center items-center mb-4 gap-9">
                   <h1 class="text-4xl font-bold">{{ $user->name }}</h1>
                   <span class="text-sm text-gray-400 text-bold">&#64;{{ $user->username }}</span>
                   @if($hasSpecialBadge)
                   <span class="bg-red-100 text-red-800 text-sm font-bold px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 ml-4">
                       ADMIN
                   </span>
               @endif
               </div>
               <div class="flex justify-center gap-3 mb-3">
                @auth
                @if(Auth::user()->following->contains($user))
                    <form action="{{ route('users.unfollow', $user->username) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-full flex items-center">
                            Unfollow
                        </button>
                    </form>
                @else
                    <form action="{{ route('users.follow', $user->username) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-full flex items-center">
                            Follow
                        </button>
                    </form>
                @endif
                @endauth
               </div>
               <p class="text-lg mb-4">{{ $user->bio ?? 'No bio available' }}</p>

               <!-- Statistics -->
               <div class="flex flex-col items-center gap-3 mb-8">
                   <div class="text-lg font-semibold">Posts: {{ $posts->count() }}</div>
                   <div class="flex flex-col gap-3">
                    <div class="flex gap-3">
                       <div class="text-lg font-semibold">
                           <a href="{{ route('users.followers', $user) }}">Followers: {{ $followersCount }}</a>   
                       </div>
                       <div class="text-lg font-semibold">
                           <a href="{{ route('users.following', $user) }}">Following: {{ $followingCount }}</a>
                       </div>
                    </div>
                    <div class="text-sm font-italic">Joined: {{ $user->created_at->diffForHumans() }}</div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Posts List -->
       <div class="flex flex-col gap-4 max-w-4xl mx-auto mt-4">
           @if($user->posts->count() === 0) 
               <p class="text-center font-bold text-xl">🌟 No posts yet! 🌟</p>
           @endif
           @foreach($posts as $post)
               <x-op-post-card :post="$post" />
           @endforeach
       </div>
   </div>
</x-app-layout>