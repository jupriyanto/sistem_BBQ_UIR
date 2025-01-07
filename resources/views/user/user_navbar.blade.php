<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>NAVBAR</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/Logo_UIR.png') }}" class="h-8" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">DIREKTORAT DAKWAH
                    ISLAM KAMPUS - UIR</span>
            </a>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{url('/home')}}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Beranda</a>
                    </li>
                    <li>
                        <a href="{{url('/laporan')}}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Laporan</a>
                    </li>
                    <li>
                        <a href="" id="keluarLink"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="modelConfirmm"
        class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <div class="relative top-10 mx-auto shadow-xl rounded-md bg-white max-w-md">
            <div class="p-10 pt-10 text-center item-center">
                <form class="mt-4 justify-center item-center mb-4">
                    <div>
                        <h1 class="text-4xl pb-10">
                            ANDA YAKIN INGIN KELUAR?
                        </h1>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" onclick="window.location.href='/'"
                            class="mr-5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Iya
                        </button>
                        <button type="button" id="closeModalBtn" onclick="closeModall('modelConfirmm')"
                            data-modal-toggle="delete-user-modal"
                            class="ml-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const sidebarIcon = document.getElementById('sidebar-icon');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebarToggle = document.getElementById('sidebar-toggle');

        // Function to toggle sidebar visibility
        const toggleSidebar = () => {
            sidebar.classList.toggle('hidden');
        };

        // Function to handle screen resizing
        const handleResize = () => {
            if (window.innerWidth >= 768) {
                // sidebar.classList.add('hidden');
            } else {
                sidebar.classList.add('hidden');
                hamburgerBtn.classList.remove('hidden'); // Tampilkan tombol pada tampilan mobile
            }
        };

        // Initial setup
        handleResize();

        // Event listeners
        hamburgerBtn.addEventListener('click', toggleSidebar);
        sidebarToggle.addEventListener('click', toggleSidebar);
        sidebarClose.addEventListener('click', toggleSidebar);
        window.addEventListener('resize', handleResize);
    });

    document.getElementById('keluarLink').addEventListener('click', function(event) {
        event.preventDefault();
        openModall('modelConfirmm');
    });

    window.openModall = function(modalId) {
        document.getElementById(modalId).style.display = 'block';
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
    }

    window.closeModall = function(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
    }

    // Close all modals when pressing ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none';
            });
        }
    };

    document.addEventListener('DOMContentLoaded', (event) => {
        const toggleButtons = document.querySelectorAll('[data-collapse-toggle]');
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('aria-controls');
                const target = document.getElementById(targetId);

                if (target.classList.contains('hidden')) {
                    target.classList.remove('hidden');
                } else {
                    target.classList.add('hidden');
                }
            });
        });
    });
    </script>
</body>

</html>