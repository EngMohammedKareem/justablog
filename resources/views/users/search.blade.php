<x-app-layout>
    <div class="m-3">
        <form method="GET" action="{{ route('users.search') }}" class="flex items-center">
            <input type="text" name="username" placeholder="Search by username..." class="w-full py-2 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                Search
            </button>
        </form>

        @if(isset($users))
            @if($users->isEmpty())
                <div class="flex justify-center items-center">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">No users found</p>
                    </div>
                </div>
            @else
                @foreach($users as $user)
                    <x-user-card :user="$user"/>
                @endforeach

                @if($users->hasPages())
                    <div class="flex justify-center p-4">
                        {{ $users->links() }}
                    </div>
                @endif
            @endif
        @endif
    </div>
</x-app-layout>
