<x-layout :title="$title">
    @if (request('category'))
        {{-- Semua Project Berdasarkan Category --}}
        <section id="allProjects" class="w-full mb-40 mt-20">
            {{-- Judul --}}
            <div class="lg:w-5/6 mx-auto px-4">
                <h1 class="text-subheading mb-4 sm:mb-6 lg:mb-8">Projects {{ $categoryName }}</h1>
                {{-- Looping data --}}
                <div class="grid gap-x-4 gap-y-6 lg:gap-y-8 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">
                    @foreach ($projects as $project)
                        <article class="flex w-full flex-col items-start justify-between">
                            <div class="relative group w-full mb-2">
                                <div class="bg-transparent">
                                    {{-- Image --}}
                                    <a href="{{ $project->link ?? url('/projects/' . $project->slug) }}">
                                        @if ($project->image)
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
                                <h3 class="text-lg line-clamp-1 lg:line-clamp-1 font-semibold text-gray-900">
                                    {{-- Judul --}}
                                    <a
                                        href="{{ $project->link ?? url('/projects/' . $project->slug) }}"><span>{{ $project->title }}</span></a>
                                </h3>
                                <p class="mb-2 line-clamp-3 text-sm text-justify">{{ $project->description }}
                                <p>
                            </div>
                            <x-button href="{{ $project->link ?? url('/projects/' . $project->slug) }}">Kunjungi
                                &raquo;</x-button>
                        </article>
                    @endforeach
                </div>
                {{ $projects->links('vendor.pagination.tailwind') }}
            </div>
        </section>
    @else
        {{-- Project Terbaru --}}
        <section id="newsProject" class="w-full mb-40 mt-20">
            {{-- Judul --}}
            <div class="lg:w-5/6 mx-auto px-4">
                <h1 class="text-subheading mb-4 sm:mb-6 lg:mb-8">Project Terbaru</h1>
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
                <div id="carousel"
                    class="flex gap-4 overflow-x-auto scrollbar-hide scroll-smooth snap-x snap-mandatory">
                    {{-- Looping data --}}
                    @foreach ($news as $project)
                        <div
                            class="snap-start shrink-0 w-[calc(100%/1.25)] sm:w-[calc(100%/1.5)] md:w-[calc(100%/2)] lg:w-[calc(100%/3)]">
                            <article class="flex w-full flex-col items-start justify-between">
                                <div class="relative group w-full mb-2">
                                    <div class="bg-transparent">
                                        {{-- Image --}}
                                        <a href="{{ $project->link ?? url('/projects/' . $project->slug) }}">
                                            @if ($project->image)
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
                                    <h3 class="text-lg line-clamp-1 lg:line-clamp-1 font-semibold text-gray-900">
                                        {{-- Judul --}}
                                        <a
                                            href="{{ $project->link ?? url('/projects/' . $project->slug) }}"><span>{{ $project->title }}</span></a>
                                    </h3>
                                    <p class="mb-2 line-clamp-3 text-sm text-justify">{{ $project->description }}
                                    <p>
                                </div>
                                <x-button href="{{ $project->link ?? url('/projects/' . $project->slug) }}">Kunjungi
                                    &raquo;</x-button>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Semua Project --}}
        <section id="allProjects" class="w-full mb-40 mt-30">
            {{-- Judul --}}
            <div class="lg:w-5/6 mx-auto px-4">
                <h1 class="text-subheading mb-4 sm:mb-6 lg:mb-8">Semua Project</h1>
                {{-- Looping data --}}
                <div class="grid gap-x-4 gap-y-6 lg:gap-y-8 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">
                    @foreach ($projects as $project)
                        <article class="flex w-full flex-col items-start justify-between">
                            <div class="relative group w-full mb-2">
                                <div class="bg-transparent">
                                    {{-- Image --}}
                                    <a href="{{ $project->link ?? url('/projects/' . $project->slug) }}">
                                        @if ($project->image)
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
                                <h3 class="text-lg line-clamp-1 lg:line-clamp-1 font-semibold text-gray-900">
                                    {{-- Judul --}}
                                    <a
                                        href="{{ $project->link ?? url('/projects/' . $project->slug) }}"><span>{{ $project->title }}</span></a>
                                </h3>
                                <p class="mb-2 line-clamp-3 text-sm text-justify">{{ $project->description }}
                                <p>
                            </div>
                            <x-button href="{{ $project->link ?? url('/projects/' . $project->slug) }}">Kunjungi
                                &raquo;</x-button>
                        </article>
                    @endforeach
                </div>
                {{ $projects->links('vendor.pagination.tailwind') }}
            </div>
        </section>
    @endif
</x-layout>
