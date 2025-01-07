<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>DASHBOARD ADMIN</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white" x-data="slider" x-init="startSlide">

    @include('admin.admin_navbar')

    <div class="flex flex-wrap justify-center gap-4 mt-20">
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/fai') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g1.jpeg') }}" alt="Fakultas Agama Islam">
            </a>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/ft') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g2.jpeg') }}" alt="Fakultas Teknik">
            </a>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/fh') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g3.jpeg') }}" alt="Fakultas Hukum">
            </a>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/fkip') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g4.jpeg') }}" alt="Fakultas Keguruan dan Ilmu Pendidikan">
            </a>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/feb') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g5.jpeg') }}" alt="Fakultas Ekonomi dan Bisnis">
            </a>
        </div>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/fpsi') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g6.jpeg') }}" alt="Fakultas Psikologi">
            </a>
        </div>
        <div class="mb-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/fisipol') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g7.jpeg') }}" alt="Fakultas Ilmu Sosial dan Politik">
            </a>
        </div>
        <div class="mb-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ url('/faperta') }}">
                <img class="rounded-t-lg" src="{{ asset('images/g8.jpeg') }}" alt="Fakultas Pertanian">
            </a>
        </div>
    </div>

    <div class="flex flex-col mt-5">
    <div class="overflow-x-auto">
        <div class="py-2 inline-block min-w-full px-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-200 border-b">
                        <tr>
                            <th scope="col" class="text-center text-xs sm:text-sm font-medium text-gray-900 px-6 py-4 text-left">Nama</th>
                            <th scope="col" class="text-center text-xs sm:text-sm font-medium text-gray-900 px-6 py-4 text-left">Nomor Ponsel</th>
                            <th scope="col" class="text-center text-xs sm:text-sm font-medium text-gray-900 px-6 py-4 text-left">Email</th>
                            <th scope="col" class="text-center text-xs sm:text-sm font-medium text-gray-900 px-6 py-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mentors as $mentor)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="text-center px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">{{ $mentor->name }}</td>
                            <td class="text-center px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">{{ $mentor->phone_number }}</td>
                            <td class="text-center px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">{{ $mentor->email }}</td>
                            <td class="justify-center flex text-xs sm:text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap space-x-2">
                                <form action="{{ asset('storage/' . $mentor->photo_path) }}" target="_blank">
                                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">View Photo</button>
                                </form>
                                <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST" style="display: inline;">
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Delete</button> 
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

</div>

</body>

</html>
