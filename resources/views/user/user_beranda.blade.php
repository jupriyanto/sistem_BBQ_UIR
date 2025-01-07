<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Beranda</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white" x-data="slider" x-init="startSlide">

    @include('user.user_navbar')

    <!-- Carousel -->
<div id="gallery" class="relative w-full h-screen pt-18" data-carousel="slide">
    <!-- Tambahkan padding top 16 untuk memberikan jarak ke bawah navbar -->
    <div class="relative h-screen overflow-hidden">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/quran.jpg') }}" 
                class="absolute w-full h-full object-cover object-center" 
                alt="Quran">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="{{ asset('images/quran5.jpg') }}" 
                class="absolute w-full h-full object-cover object-center" 
                alt="Quran 5">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/quran6.jpg') }}" 
                class="absolute w-full h-full object-cover object-center" 
                alt="Quran 6">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/quran8.jpg') }}" 
                class="absolute w-full h-full object-cover object-center" 
                alt="Quran 8">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/quran7.jpg') }}" 
                class="absolute w-full h-full object-cover object-center" 
                alt="Quran 7">
        </div>
    </div>

    <!-- Slider controls -->
    <button type="button" 
        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" 
        data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 bg-black/30 rounded-full group-hover:bg-green-500">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M15 19l-7-7 7-7" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" 
        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" 
        data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 bg-black/30 rounded-full group-hover:bg-green-500">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 5l7 7-7 7" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


    <main class="pt-16 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('images/pddik.jpg') }}"
                                alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Dr.
                                    ANTON AFRIZAL CANDRA, S.Ag, M.Si</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Direktur Direktorat Dakwah Islam
                                    Kampus</p>

                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        PENTINGNYA BIMBINGAN BACA QURAN UNTUK DOSEN DAN MAHASISWA</h1>
                </header>

                <p>Dr. Anton Afrizal Candra, S.Ag., M.Si selaku Direktur DDIK UIR dalam sambutannya mengatakan sesuai
                    dengan Visi UIR 2041 Menjadi Universitas Islam Berkelas Dunia Berbasis Iman dan Takwa tentu salah
                    satunya adalah bertujuan menciptakan civitas akademika yang islami, adapun turunan dari tujuan
                    tersebut adalah dengan para mahasiswa dan mahasiswi UIR harus bisa membaca Al-Quran.</p>

                <p class="pt-5 pb-5"> “Mahasiswa dan mahasiswi UIR harus bisa membaca Alquran dalam tujuan menciptakan
                    civitas
                    akademika
                    yang islami sesuai dengan Visi UIR 2041 Menjadi Universitas Islam Berkelas Dunia Berbasis Iman dan
                    Takwa, tetapi kelak seiring berjalannya waktu selain bisa membaca Alquran tetapi mahasiswa UIR juga
                    kelak bisa menghafal dan mengerti makna dari Al-Quran itu sendiri,” Ujar Anton Afrizal.</p>

                <P> Anton juga menambahkan dalam mendukung program dakwah islamiyah di UIR salah satunya adalah dengan
                    memperkuat sosialisasi dan mentoring bimbingan baca alquran dan memberikan ruang sosialisasi yang
                    tidak hanya sampai di tingkat rektorat tetapi hingga pada tingkat fakultas bahkan program studi,
                    sehingga diharapkan sempurnalah catur dharma pendidikan yang UIR laksanakan. </p>

            </article>
        </div>
    </main>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.querySelector("#gallery");
        const items = carousel.querySelectorAll("[data-carousel-item]");
        let activeIndex = 0;

        function showSlide(index) {
            items.forEach((item, i) => {
                item.classList.add("hidden");
                item.classList.remove("active");
                if (i === index) {
                    item.classList.remove("hidden");
                    item.classList.add("active");
                }
            });
        }

        function nextSlide() {
            activeIndex = (activeIndex + 1) % items.length;
            showSlide(activeIndex);
        }

        function prevSlide() {
            activeIndex = (activeIndex - 1 + items.length) % items.length;
            showSlide(activeIndex);
        }

        // Event listeners for controls
        carousel.querySelector("[data-carousel-next]").addEventListener("click", nextSlide);
        carousel.querySelector("[data-carousel-prev]").addEventListener("click", prevSlide);

        // Optional: Automatic slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Initialize first slide
        showSlide(activeIndex);
    });
    </script>

</body>

</html>