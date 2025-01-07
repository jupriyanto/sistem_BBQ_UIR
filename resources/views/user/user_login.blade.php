<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- component -->
    <div class="bg-white-100 flex justify-center items-center h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="{{ asset('images/ddik.jpeg') }}" alt="Placeholder Image" class="object-cover w-full h-full">
        </div>
        <!-- Right: Login Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-3xl font-bold mb-6 text-center">LOGIN</h1>
            <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md " action="#" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-600">Email</label>
                    <input type="text" id="username" name="username" placeholder="masukkan email"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Kata Sandi</label>
                    <input type="email" id="email" name="email" placeholder="masukkan sandi"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Login Button -->
                <button type="button" onclick="window.location.href='{{ url('/home') }}';"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md py-2 px-4 w-full">
                    Masuk
                </button>

            </form>
        </div>
    </div>
</body>

</html>