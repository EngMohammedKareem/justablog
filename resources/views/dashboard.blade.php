<x-app-layout>
    @php
       $posts = auth()->user()->posts()->latest()->get();
       $followersCount = auth()->user()->follower ? auth()->user()->follower()->count() : 0;
    @endphp
 
    <div class="bg-gray-900 text-white py-12 px-6">
       <div class="max-w-4xl mx-auto flex flex-col items-center">
          <!-- Profile Header -->
          <div class="bg-gray-800 rounded-full mb-6">
             <img src="https://scontent.fkik8-2.fna.fbcdn.net/v/t39.30808-6/348557727_211779438285972_638000292256965706_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=y6fdm418IJYQ7kNvgGDQVYz&_nc_ht=scontent.fkik8-2.fna&oh=00_AYDI8PS8rhrkhPvmaXk1dSR2flsIbDHuqc5i5rtbm25ktA&oe=66DCBAF1" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
          </div>
          <div class="text-center">
            <div class="flex justify-center items-center mb-4 gap-9">
               <h1 class="text-4xl font-bold">{{ Auth()->user()->name }}</h1>
               <span class="text-sm text-gray-400 font-bold">&#64;{{ Auth::user()->username }}</span>
           </div>             
           <p class="text-lg mb-4">{{ auth()->user()->bio ?? 'No bio available' }}</p>
             <div class="flex flex-col justify-center gap-3 mb-8">
                <div class="text-lg font-semibold">Posts: {{ $posts->count() }}</div>
                <div class="flex justify-center gap-3">
                    <div class="text-lg font-semibold">Followers: {{ $followersCount }}</div>
                    <div class="text-lg font-semibold">Following: {{ auth()->user()->following->count() }}</div>
                </div>
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
             <x-op-post-card :post="$post" />
          @endforeach
       </div>
    </div>
 </x-app-layout>
 