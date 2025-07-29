<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Welcome to My Portfolio' }} - Bayu Ferdianto</title>

    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="text-sm md:text-lg bg-primary text-secondary">
    {{-- Header --}}
    <x-header />

    {{-- Main Content --}}
    {{ $slot }}
    {{-- End Content --}}

    {{-- Footer --}}
    <x-footer />

    {{-- Back to Top Button --}}

    {{-- Scripts DOM API --}}
    <script>
        // Alert email berhasil dikirim 
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500); // Hapus elemen setelah transisi
            }
        }, 5000); // 5 detik

        // Mobile Menu
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
        });
        // Testimonial Automaticaly Slider
        const pairs = document.querySelectorAll('.testimonial-pair');
        let currentIndex = 0;

        setInterval(() => {
            pairs[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex + 1) % pairs.length;
            pairs[currentIndex].classList.remove('hidden');
        }, 5000);

        // Carousel
        const carousel = document.getElementById('carousel');
        const card = carousel.querySelector('div'); // ambil 1 item pertama untuk tahu lebar
        const scrollAmount = card.offsetWidth + 16; // lebar card + gap (16px)

        document.getElementById('prevBtn').addEventListener('click', () => {
            carousel.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            carousel.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>
