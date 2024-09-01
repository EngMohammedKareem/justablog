<x-app-layout>
<div class="min-h-screen bg-gradient-home flex items-center justify-center">
    <div class="w-full max-w-lg p-8 bg-gray-800 bg-opacity-90 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-white mb-6">Edit Comment</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="bg-red-600 text-white p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Comment Form -->
        <form method="POST" action="{{ route('posts.comments.update',[$post, $comment]) }}">
            @csrf
            @method('PUT')

            <!-- Comment Text -->
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-white">{{ __('Comment') }}</label>
                <textarea id="body" name="body" rows="4" class="block mt-1 w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400" required>{{ $comment->body }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <a href="{{ url()->previous() }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg mr-3 hover:bg-gray-500">Cancel</a>
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-lg shadow-md hover:from-blue-400 hover:to-purple-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Update Comment') }}
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>