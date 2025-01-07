<!doctype html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Laporan</title>
</head>

<body>

    <!-- Navbar -->
    @include('user.user_navbar')
    <div class="mt-20 flex justify-center">
        <button
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs sm:text-sm px-2 sm:px-5 py-2.5 text-center mb-2"
            onclick="openModal('modelConfirm')">
            Upload Laporan
        </button>
    </div>

    <!-- component -->
    <div class="flex flex-col mt-5">
        <div class="overflow-x-auto">
            <div class="py-2 inline-block min-w-full px-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    Nomor ponsel
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    prodi bimbingan
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 px-2 sm:px-6 py-2 sm:py-4 text-left">
                                    fakultas bimbingan
                                </th>
                                <th scope="col"
                                    class="text-xs sm:text-sm font-medium text-gray-900 ml-20 sm:px-6 sm:py-4 text-left">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
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
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modelConfirm"
        class="fixed hidden inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 pt-20 mb-20 pb-10">
        <div class="relative z-40 mx-auto shadow-xl rounded-md bg-white max-w-3xl">
            <div class="p-6 pt-6 text-center">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data"
                    class="mt-4 justify-center mb-4">
                    @csrf
                    <label class="mt-6 mb-3 block text-base font-medium text-[#07074D]" for="large_size">Nama
                        mentor</label>
                    <input type="text" name="nama"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <label class="mt-6 mb-3 block text-base font-medium text-[#07074D]" for="large_size">Nomor
                        telepon</label>
                    <input type="text" name="nomor_hp"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <label class="mt-6 mb-3 block text-base font-medium text-[#07074D]" for="large_size">prodi
                        bimbingan</label>
                    <input type="text" name="program_studi"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <label class="mt-6 mb-3 block text-base font-medium text-[#07074D]" for="large_size">Fakultas
                        bimbingan</label>
                    <input type="text" name="fakultas"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <label class="mt-6 mb-3 block text-base font-medium text-[#07074D]" for="large_size">upload
                        file Laporan</label>
                    <input type="file" name="pdf"
                        class="mb-5 block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                    <div class="flex justify-end mt-7">
                        <button type="button" id="closeModalBtn" onclick="closeModal('modelConfirm')"
                            data-modal-toggle="delete-user-modal"
                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Keluar</button>
                        <button type="submit"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript">
        window.openModal = function(modalId) {
            document.getElementById(modalId).style.display = 'block'
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
        }

        window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
    </script>

</body>

</html>