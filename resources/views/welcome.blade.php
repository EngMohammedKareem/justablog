<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>HOME</title>
</head>
<body>
    <div class="flex items-center justify-center h-screen bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600">
        <div class="text-center p-8">
            <h1 class="text-6xl font-bold text-white mb-4">Justablog</h1>
            <p class="text-xl text-gray-300 mb-8">Because sharing doesn't have to be complicated</p>
            
            <div class="flex justify-center gap-6">
                <a href="{{ route('login') }}">
                    <button type="button" class="px-8 py-3.5 text-base font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-lg transition duration-300 ease-in-out">
                        Login
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <button type="button" class="px-8 py-3.5 text-base font-bold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 rounded-lg transition duration-300 ease-in-out">
                        Sign Up
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
