<x-app-layout>
    @php
       $posts = auth()->user()->posts()->latest()->get();
       $followersCount = auth()->user()->follower ? auth()->user()->follower()->count() : 0;
       $followingCount = auth()->user()->following ? auth()->user()->following()->count() : 0;
       $hasSpecialBadge = auth()->user()->hasSpecialPowers();
    @endphp
 
    <div class="bg-gray-900 text-white py-12 px-6">
       <div class="max-w-4xl mx-auto flex flex-col items-center">
          <!-- Profile Header -->
          <div class="bg-gray-800 rounded-full mb-6">
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'}}" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
          </div>
          <div class="text-center">
            <div class="flex justify-center items-center mb-4 gap-9">
               <h1 class="text-4xl font-bold">{{ Auth()->user()->name }}</h1>
               <span class="text-sm text-gray-400 font-bold">&#64;{{ Auth::user()->username }}</span>
               @if($hasSpecialBadge)
               <span class="bg-red-100 text-red-800 text-sm font-bold px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 ml-4">
                   ADMIN
               </span>
           @endif
           </div>             
           <p class="text-lg mb-4">{{ auth()->user()->bio ?? 'No bio available' }}</p>
             <div class="flex flex-col justify-center gap-3 mb-8">
                <div class="text-lg font-semibold">Posts: {{ $posts->count() }}</div>
                <div class="flex justify-center gap-3">
                    <div class="text-lg font-semibold">
                     <a href="{{ route('users.followers', Auth::user()) }}">Followers: {{ $followersCount }}</a>   
                    </div>
                    <div class="text-lg font-semibold">
                     <a href="{{ route('users.following', Auth::user()) }}">Following: {{ $followingCount }}</a>
                    </div>
                </div>
                <span class="font-italic text-sm">Joined: {{ Auth::user()->created_at->diffForHumans() }}</span>
             </div>
          </div>
       </div>
 
       <!-- Posts List -->
       <div class="flex flex-col gap-4 max-w-4xl mx-auto">
         @if(Auth::user()->posts->count() === 0)
            <div class="flex flex-col gap-3 text-center font-semibold">
               <p>🌟 No posts yet! 🌟</p>
               <a href="{{ route('posts.create') }}" class="underline">
                  <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg">Create Your First Post</button>
               </a>
            </div>
         @endif
          @foreach($posts as $post)
             <x-post-card :post="$post" />
          @endforeach
       </div>
    </div>
 </x-app-layout>
 