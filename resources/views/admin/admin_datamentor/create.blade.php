<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mentor</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    
    @include('admin.admin_navbar')

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-center text-3xl font-bold mb-8">Tambah Mentor</h1>
            <form action="{{ route('mentors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="photo_path" class="block text-sm font-medium text-gray-700 text-center">Upload Foto</label>
                    <input type="file" name="photo_path" id="photo_path" class="mt-1 block w-full border-black-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 text-center">Nama Mentor</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-100 border-black">
                </div>
                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700 text-center">Nomor Telepon</label>
                    <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 text-center">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 text-center">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 text-center">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
