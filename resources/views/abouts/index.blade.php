<x-layout :title="$title">
    {{-- About --}}
    <section id="about">
        <div class="lg:w-5/6 mx-auto px-4">
            <div class="mb-40 mt-20 sm:mt-30">
                <div class="flex justify-between flex-col-reverse sm:flex-row">
                    {{-- Left --}}
                    <div class="mr-4 mt-8 sm:mt-0">
                        <h2 class="mb-2 sm:mb-4 text-subheading">Tentang saya</h2>
                        <div class="mb-2 sm:mb-4 pr-4">
                            <h3>Pendidikan</h3>
                            <p>{!! $personal['tentangPendidikan'] !!}
                            </p>
                        </div>
                        <div class="mb-2 sm:mb-4 pr-4">
                            <h3>Peminatan</h3>
                            <p>{!! $personal['tentangPeminatan'] !!}</p>
                        </div>
                        <div class="mb-2 sm:mb-4 pr-4">
                            <h3>Pekerjaan</h3>
                            <ul class="list-disc pl-5">
                                <li>{{ $personal['tentangPekerjaan'][0] }}</li>
                                <li>{{ $personal['tentangPekerjaan'][1] }}</li>
                                <li>{{ $personal['tentangPekerjaan'][2] }}</li>
                            </ul>
                        </div>
                        <div class="flex mt-4">
                            <x-button href="/contact">Contact me &raquo;</x-button>
                        </div>
                    </div>
                    {{-- Right --}}
                    <div class="md:w-1/2 w-full">
                        <img src="{{ $personal['image'] }}" alt="foto profil"
                            class="w-auto sm:w-full h-60 object-cover filter grayscale sepia contrast-90 brightness-95 border border-gray-300 shadow-sm mx-auto sm:mx-0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Sertif --}}
    <section id="sertifs" class="w-full mb-40 mt-20 sm:mt-30">
        {{-- Judul --}}
        <div class="lg:w-5/6 mx-auto px-4">
            <h1 class="text-subheading mb-4 sm:mb-6 lg:mb-8">Sertifikat</h1>
        </div>
        {{-- Carousel --}}
        <div class="lg:w-5/6 mx-auto px-4 relative">
            {{-- Tombol Prev --}}
            <button id="prevBtn"
                class="hidden sm:inline absolute left-2 lg:-left-8 top-1/2 -translate-y-1/2 z-10 bg-white shadow p-2 rounded-full hover:bg-gray-100">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            {{-- Tombol Next --}}
            <button id="nextBtn"
                class="hidden sm:inline absolute right-2 lg:-right-8 top-1/2 -translate-y-1/2 z-10 bg-white shadow p-2 rounded-full hover:bg-gray-100">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            {{-- Wrapper Carousel --}}
            <div id="carousel" class="flex gap-4 overflow-x-auto scrollbar-hide scroll-smooth snap-x snap-mandatory">
                {{-- Looping data --}}
                @foreach ($sertifs as $sertif)
                    <div
                        class="snap-start shrink-0 w-[calc(100%/1.25)] sm:w-[calc(100%/1.5)] md:w-[calc(100%/2)] lg:w-[calc(100%/3)]">
                        <article class="flex w-full flex-col items-start justify-between">
                            <div class="relative group w-full mb-2">
                                <div class="bg-transparent">
                                    {{-- Image --}}
                                    @php
                                        $ext = pathinfo($sertif->image, PATHINFO_EXTENSION);
                                    @endphp
                                    <a href="{{ $sertif->link ?? url('/sertif/' . $sertif->slug) }}">
                                        @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                                            <img src="{{ asset('storage/' . $sertif->image) }}" class="image-style"
                                                alt="Sertifikat">
                                        @elseif ($ext === 'pdf')
                                            <div class="image-style">
                                                <iframe src="{{ asset('storage/' . $sertif->image) }}"
                                                    class="w-full h-full" frameborder="0">
                                                </iframe>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4 text-xs mb-2">
                                <span>Diberikan oleh {{ $sertif->lembaga }}</span>
                                {{-- Kategori --}}
                                <a href="#"
                                    class="rounded-full bg-gray-50 px-3 py-1.5 whitespace-nowrap font-medium hover:bg-gray-100">{{ $sertif->category->name }}</a>
                            </div>
                            <div class="group w-full">
                                {{-- Judul --}}
                                <h3 class="text-lg line-clamp-2 lg:line-clamp-1 font-semibold text-gray-900">
                                    {{-- Judul --}}
                                    <a
                                        href="{{ $sertif->link ?? url('/sertif/' . $sertif->slug) }}"><span>{{ $sertif->title }}</span></a>
                                </h3>
                                <p class="mb-2 md:line-clamp-2 text-sm text-justify">{{ $sertif->description }}
                                <p>
                            </div>
                            <x-button href="{{ $sertif->link ?? url('/sertif/' . $sertif->slug) }}">Kunjungi
                                &raquo;</x-button>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Semua Posts --}}
    <section id="blog" class="w-full mb-40 mt-30">
        {{-- Judul --}}
        <div class="lg:w-5/6 mx-auto px-4">
            <h1 class="text-subheading mb-4 sm:mb-6 lg:mb-8">Blog</h1>
            {{-- Looping data --}}
            <div class="grid gap-x-4 gap-y-6 lg:gap-y-8 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">
                @foreach ($posts as $post)
                    <article class="flex w-full flex-col items-start justify-between">
                        <div class="relative group w-full mb-2">
                            <div class="bg-transparent">
                                {{-- Image --}}
                                <a href="{{ $post->link ?? url('/posts/' . $post->slug) }}">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                            class="image-style">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w"
                                            alt="{{ $post->title }}" class="image-style">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center gap-x-4 text-xs mb-2">
                            <time>Diunggah pada
                                {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}</time>
                            {{-- Kategori --}}
                            <div class="rounded-full bg-gray-50 px-3 py-1.5 font-medium hover:bg-gray-100">
                                {{ $post->category->name }}</div>
                        </div>
                        <div class="group w-full">
                            {{-- Judul --}}
                            <h3 class="text-lg line-clamp-2 font-semibold text-gray-900">
                                {{-- Judul --}}
                                <a href="{{ $post->link ?? url('/posts/' . $post->slug) }}"
                                    class="text-left"><span>{{ $post->title }}</span></a>
                            </h3>
                            <p class="mb-2 line-clamp-3 text-sm text-justify">{{ $post->description }}
                            <p>
                        </div>
                        <x-button href="{{ $post->link ?? url('/posts/' . $post->slug) }}">Kunjungi &raquo;</x-button>
                    </article>
                @endforeach
            </div>
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    </section>
</x-layout>
