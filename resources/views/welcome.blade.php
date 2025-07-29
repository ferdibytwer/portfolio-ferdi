<x-layout :title="$title">
    <main class="w-full mt-8">
        {{-- Hero --}}
        <section id="hero">
            <div class="lg:w-5/6 mx-auto px-4">
                <div class="mb-40 mt-20 sm:mt-30">
                    <h1 class="text-heading mb-4">PORTFOLIO</h1>
                    <p class="mb-6">Halo, saya Ferdi seorang mahasiswa matematika dengan peminatan <br>pemrograman,
                        seni, dan sastra.
                    </p>
                    <img src="{{ @asset('storage/teman.jpg') }}" alt="teman universitas"
                        class="w-full object-cover grayscale-100">
                </div>
            </div>
        </section>
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
                            <div class="flex space-x-4 mt-4">
                                <a href="/about" class="bg-black text-white px-4 py-2">Details</a>
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
        {{-- Projects --}}
        <section id="projects">
            <div class="lg:w-5/6 mx-auto px-4">
                <div class="mb-40 mt-30 gap-x-0 md:gap-x-8 lg:gap-x-0 flex flex-col lg:space-x-16 md:flex-row">
                    <div class="flex flex-row items-center md:items-start gap-x-6 md:gap-x-0 md:flex-col">
                        <h2 class="mb-4 md:mb-8 text-heading">Discover My
                            <br>Project
                        </h2>
                        <div class="hidden md:block sm:w-8 sm:h-8 bg-black rounded-full animate-pulse"></div>
                    </div>

                    {{-- Wrapper Carousel --}}
                    <div id="carousel"
                        class="flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory px-4 scrollbar-hide">
                        @foreach ($projects as $project)
                            <div class="snap-start shrink-0 w-[calc(100%/1)]">
                                <article class="flex w-full flex-col items-start justify-between">
                                    <div class="relative group w-full mb-2">
                                        <div class="bg-transparent">
                                            {{-- Image --}}
                                            <a href="{{ $project->link ?? url('/projects/' . $project->slug) }}">
                                                @if (isset($project->image))
                                                    <img src="{{ asset('storage/' . $project->image) }}"
                                                        alt="{{ $project->title }}" class="image-style">
                                                @else
                                                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w"
                                                        alt="{{ $project->title }}" class="image-style">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-x-4 text-xs mb-2">
                                        <time>Diunggah pada
                                            {{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('d F Y') }}</time>
                                        {{-- Kategori --}}
                                        <a href="{{ route('projects.index', ['category' => $project->category->slug]) }}"
                                            class="rounded-full bg-gray-50 px-3 whitespace-nowrap py-1.5 font-medium hover:bg-gray-100">
                                            {{ $project->category->name }}
                                        </a>
                                    </div>
                                    <div class="group w-full">
                                        {{-- Judul --}}
                                        <h3 class="text-lg line-clamp-2 lg:line-clamp-1 font-semibold text-gray-900">
                                            {{-- Judul --}}
                                            <a
                                                href="{{ $project->link ?? url('/projects/' . $project->slug) }}"><span>{{ $project->title }}</span></a>
                                        </h3>
                                        <p class="mb-2 line-clamp-3 text-sm text-justify">{{ $project->description }}
                                        <p>
                                    </div>
                                    <x-button
                                        href="{{ $project->link ?? url('/projects/' . $project->slug) }}">Kunjungi
                                        &raquo;</x-button>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- Banner --}}
        <section id="banner" class="bg-yellow-100 py-16 mb-40 hidden lg:block">
            <blockquote class="text-center italic text-gray-700 text-xl md:text-3xl">"Keadilan bukan milik penguasa, ia
                adalah milik<br> semua orang yang memperjuangkannya." <br>— Munir Said Thalib</blockquote>
        </section>
        {{-- Word to Me --}}
        <section id="wordToMe">
            <div class="lg:w-5/6 mx-auto px-4">
                <div class="mb-40 mt-30">
                    <h2 class="mb-4 md:mb-8 lg:mb-16 text-subheading text-center">Apa yang mereka katakan<br> tentang
                        saya ?</h2>
                    {{-- Testimonial --}}
                    @if (isset($testimonial))
                        <div class="grid grid-cols-1 md:grid-cols-2" id="testimonial-container">
                            @foreach ($testimonial->chunk(2) as $chunkIndex => $pair)
                                <div
                                    class="testimonial-pair {{ $chunkIndex !== 0 ? 'hidden' : '' }} col-span-2 grid grid-cols-1 md:grid-cols-2">
                                    @foreach ($pair as $testimoni)
                                        <div
                                            class="w-full flex flex-col p-4 h-full justify-between text-center gap-x-4">
                                            <p class="font-bold mb-4 italic">"{{ $testimoni->message }}"</p>
                                            <div>
                                                <h1 class="font-bold">__{{ $testimoni->name }}</h1>
                                                <span>{{ $testimoni->status }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h1 class="text-center mt-30 mb-40 font-heading text-black font-bold text-2xl md:text-4xl">Belum
                            ada
                            testimoni</h1>
                    @endif
                </div>
            </div>
        </section>
    </main>
</x-layout>
