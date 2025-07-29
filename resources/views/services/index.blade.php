<x-layout :title="$title">
    {{-- About my service --}}
    <section id="aboutService">
        <div class="lg:w-5/6 mx-auto px-4">
            <div class="mb-40 mt-20">
                <h1 class="text-subheading text-center">Services</h1>
                <p class="text-center mb-4 md:mb-8">Saya menyediakan berbagai layanan seperti</p>
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 justify-between">
                    <!-- Card 1 -->
                    <div class="w-full">
                        <div class="relative h-full">
                            <!-- Efek bayangan kertas tua -->
                            <span
                                class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-yellow-200 rounded-lg opacity-30 blur-sm"></span>

                            <!-- Kartu utama -->
                            <div
                                class="relative h-full p-6 border border-gray-700 bg-[#fdf6e3] rounded-sm shadow-inner font-serif">
                                <!-- Judul -->
                                <h3
                                    class="text-2xl font-bold text-gray-900 tracking-wider uppercase text-center underline decoration-gray-700">
                                    Web Development
                                </h3>

                                <!-- Subjudul -->
                                <p
                                    class="mt-1 mb-3 text-center text-xs text-gray-700 tracking-wide italic border-b border-gray-400 pb-1 uppercase">
                                    Layanan Pembuatan Website
                                </p>

                                <!-- Deskripsi -->
                                <p class="text-sm text-gray-800 leading-relaxed text-justify">
                                    Saya menawarkan jasa Web Development profesional untuk membangun website yang cepat,
                                    responsif, dan sesuai kebutuhan Anda. Mulai dari landing page, company profile,
                                    hingga sistem web dinamis, saya siap membantu dengan teknologi terkini dan standar
                                    coding yang rapi.
                                </p>
                                <p class="mt-2 text-sm text-gray-800 leading-relaxed text-justify">
                                    Hubungi saya untuk konsultasi gratis dan kolaborasi proyek Anda!
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="w-full">
                        <div class="relative h-full">
                            <!-- Efek bayangan kertas tua -->
                            <span
                                class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-yellow-200 rounded-lg opacity-30 blur-sm"></span>

                            <!-- Kartu utama -->
                            <div
                                class="relative h-full p-6 border border-gray-700 bg-[#fdf6e3] rounded-sm shadow-inner font-serif">
                                <!-- Judul -->
                                <h3
                                    class="text-2xl font-bold text-gray-900 tracking-wider uppercase text-center underline decoration-gray-700">
                                    UI/UX Design
                                </h3>

                                <!-- Subjudul -->
                                <p
                                    class="mt-1 mb-3 text-center text-xs text-gray-700 tracking-wide italic border-b border-gray-400 pb-1 uppercase">
                                    Desain Antarmuka Pengguna
                                </p>

                                <!-- Deskripsi -->
                                <p class="text-sm text-gray-800 leading-relaxed text-justify">
                                    Saya menyediakan jasa UI/UX Design profesional untuk aplikasi dan website yang
                                    modern, intuitif, dan mudah digunakan. Fokus saya adalah menciptakan desain yang tak
                                    hanya menarik secara visual, tapi juga nyaman bagi pengguna.
                                </p>
                                <p class="mt-2 text-sm text-gray-800 leading-relaxed text-justify">
                                    Mari diskusikan kebutuhan desain Anda bersama saya!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Pricing --}}
    <section id="pricingService">
        <div class="lg:w-7/8 mx-auto px-4">
            <div class="mb-40 mt-30">
                <h1 class="text-subheading text-center">Pricing</h1>
                <p class="text-center mb-4 md:mb-8">Pilih layanan kami</p>
                {{-- List Pricing --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 px-4 md:py-12 gap-x-4">
                    @foreach ($data as $service)
                        <div
                            class="border border-gray-300 rounded-lg p-6 bg-white flex flex-col justify-between transition-transform duration-300 hover:shadow-md">
                            <!-- Header -->
                            <div class="space-y-4">
                                <!-- Judul & Deskripsi -->
                                <div class="space-y-2">
                                    <h1 class="text-xl font-semibold">{{ $service->name }}</h1>
                                    <p class="text-gray-500 text-sm">{{ $service->description }}</p>
                                </div>

                                <!-- Fitur -->
                                <ul class="space-y-2">
                                    <li class="flex items-center gap-2">
                                        <div
                                            class="w-5 h-5 bg-green-500 text-white text-xs font-bold flex items-center justify-center rounded-full">
                                            ✔</div>
                                        <span class="text-gray-600 text-sm">Customer Panel</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <div
                                            class="w-5 h-5 bg-green-500 text-white text-xs font-bold flex items-center justify-center rounded-full">
                                            ✔</div>
                                        <span class="text-gray-600 text-sm">Admin Panel</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <div
                                            class="w-5 h-5 bg-green-500 text-white text-xs font-bold flex items-center justify-center rounded-full">
                                            ✔</div>
                                        <span class="text-gray-600 text-sm">Mega Menu</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <div
                                            class="w-5 h-5 bg-green-500 text-white text-xs font-bold flex items-center justify-center rounded-full">
                                            ✔</div>
                                        <span class="text-gray-600 text-sm">Quick View</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <div
                                            class="w-5 h-5 bg-green-500 text-white text-xs font-bold flex items-center justify-center rounded-full">
                                            ✔</div>
                                        <span class="text-gray-600 text-sm">Quick Order</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <div
                                            class="w-5 h-5 bg-green-500 text-white text-xs font-bold flex items-center justify-center rounded-full">
                                            ✔</div>
                                        <span class="text-gray-600 text-sm">Live Message</span>
                                    </li>
                                </ul>

                                <!-- Badge -->
                                <div
                                    class="bg-green-500 text-white text-xs font-medium px-3 py-1 mb-8 md:mb-12 rounded-full w-max">
                                    Included</div>

                                <!-- Harga -->
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl font-bold text-black">
                                        Rp{{ number_format($service->harga_diskon, 0, ',', '.') }}
                                    </span>
                                    <span class="line-through text-gray-500 text-base">
                                        Rp{{ number_format($service->harga_normal, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Tombol -->
                            <a href="#"
                                class="mt-4 w-full py-3 bg-green-600 text-white text-base font-medium rounded-full flex items-center justify-center gap-2 hover:bg-green-700 transition">
                                🛒 Purchase Now
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
