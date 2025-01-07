<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mentor</title>
    @vite('resources/css/app.css')
</head>

<body>
    
    @include('admin.admin_navbar')

    <h1 class="text-center pt-20 text-5xl">MENTOR BBQ TA 2023/2024</h1>
    <div class="mt-10 flex justify-center">
        <button
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs sm:text-sm px-2 sm:px-5 py-2.5 text-center mb-2"
            onclick="window.location.href='{{ url('mentors/create') }}'">
            Upload Data Mentor
        </button>

    </div>

    <div class="flex flex-col mt-5">
        <div class="overflow-x-auto">
            <div class="py-2 inline-block min-w-full px-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th></th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Nomor Ponsel
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Email
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Kata Sandi
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mentors as $mentor)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td>
                                        <img src="{{ Storage::url($mentor->photo_path) }}" alt="Foto" class="w-16 h-16 rounded-full">
                                    </td>
                                    <td class="px-5 sm:px-6 py-5 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                        {{ $mentor->name }}
                                    </td>
                                    <td class="px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                        {{ $mentor->phone_number }}
                                    </td>
                                    <td class="px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                        {{ $mentor->email }}
                                    </td>
                                    <td class="px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                        {{ $mentor->password }}
                                    </td>
                                    <td class="flex text-xs sm:text-sm text-gray-900 font-light px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap pr-8">
                                <form action="{{ asset('storage/' . $mentor->photo_path) }}" target="_blank">
                                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View Photo</button>
                                </form>
                                <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST" style="display: inline;"> 
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button> 
                                </form>
                            </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
