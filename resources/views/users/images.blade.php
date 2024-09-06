<x-app-layout>
    <section class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <header class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                {{ __('Upload Profile Image') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Choose a new profile image to upload.') }}
            </p>
        </header>

        <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="profile_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Profile Image') }}
                </label>
                <input id="profile_image" name="profile_image" type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400" />
                @error('profile_image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-blue-400 dark:hover:bg-blue-500 dark:focus:ring-offset-gray-800">
                {{ __('Upload') }}
            </button>
        </form>
    </section>
</x-app-layout>
