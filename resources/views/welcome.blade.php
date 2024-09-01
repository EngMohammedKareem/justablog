<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>HOME</title>
</head>
<body>
    <div class="flex items-center justify-center h-screen bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600">
        <div class="text-center p-8">
            <h1 class="text-6xl font-bold text-white mb-4">Justablog</h1>
            <p class="text-xl text-gray-300 mb-8">Your yapping solution is finally here</p>
            
            <div class="flex justify-center gap-6">
                <a href="{{ route('login') }}" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold rounded-lg shadow-lg hover:from-blue-500 hover:to-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-colors duration-300 ease-in">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-8 py-4 bg-gradient-to-r from-teal-600 to-teal-500 text-white font-semibold rounded-lg shadow-lg hover:from-teal-500 hover:to-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-400 transition-colors duration-300 ease-in">
                    Register
                </a>
            </div>
        </div>
    </div>
</body>
</html>