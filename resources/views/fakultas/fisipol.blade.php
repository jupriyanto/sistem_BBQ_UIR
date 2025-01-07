<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAKULTAS ILMU SOSIAL DAN POLITIK</title>
    @vite('resources/css/app.css')
</head>

<body>
    
    @include('admin.admin_navbar')

    <h1 class="text-center text-2xl font-semibold whitespace-nowrap dark:text-white mt-20">FAKULTAS ILMU SOSIAL DAN POLITIK</h1>
    <div class="flex flex-col mt-5 pt-5">
        <div class="overflow-x-auto">
            <div class="py-2 inline-block min-w-full px-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Tanggal Upload
                                </th>
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
                                    Program Studi
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Fakultas
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td
                                    class="px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                    {{ $student->created_at->format('d M Y') }}
                                </td>
                                <td
                                    class="px-5 sm:px-6 py-5 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                    {{ $student->nama }}
                                </td>
                                <td
                                    class="px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                    {{ $student->nomor_hp }}
                                </td>
                                <td
                                    class="px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                    {{ $student->program_studi }}
                                </td>
                                <td
                                    class="px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                    {{ $student->fakultas }}
                                </td>
                                <td
                                    class="flex text-xs sm:text-sm text-gray-900 font-light px-2 sm:px-6 py-2 sm:py-4 whitespace-nowrap pr-8">
                                    <form action="{{ asset('storage/' . $student->pdf_path) }}" target="_blank">
                                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            View
                                        </button>
                                    </form>
                                    <form action="{{ route('students.download', $student->id) }}" target="_blank" download> 
                                        <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> 
                                            Download </button> 
                                    </form>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;"> 
                                        @csrf @method('DELETE') 
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

</body>

</html>
