<x-layout :title="$title">
    <section id="project">
        <div class="container_">
            <div class="mb-40 mt-20">
                <!-- Project Detail -->
                <div class="border border-[#7b6f5b] p-6 bg-[#fdf6e3] shadow-inner">
                    {{-- Gambar --}}
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                            class="image-style mb-4">
                    @else
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w"
                            alt="{{ $project->title }}" class="image-style mb-4">
                    @endif

                    {{-- Judul --}}
                    <h2
                        class="text-2xl font-bold text-[#3d3427] uppercase mb-2 tracking-wider border-b border-[#7b6f5b] pb-1">
                        {{ $project->title }}
                    </h2>

                    <div class="flex flex-col leading-tigh">
                        {{-- Kategori & Author --}}
                        <p class="text-sm italic text-[#5e4f3d]">
                            {{ $project->category->name }} — oleh {{ $project->user->name }}
                        </p>
                        {{-- Tanggal --}}
                        <time class="text-sm italic text-[#5e4f3d] mb-4">Diunggah pada
                            {{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('d F Y') }}</time>
                    </div>

                    {{-- Deskripsi Full --}}
                    <div class="text-base text-[#3e3324] leading-relaxed text-justify prose prose-sm max-w-none">
                        {!! $project->description !!}
                    </div>

                    {{-- Tombol/link jika ada --}}
                    @if ($project->link)
                        <p class="mt-4">
                            <a href="{{ $project->link }}" target="_blank"
                                class="inline-block px-4 py-2 bg-[#7b6f5b] text-[#fdf6e3] rounded hover:bg-[#5e4f3d] transition">
                                Kunjungi Proyek
                            </a>
                        </p>
                    @endif
                </div>

            </div>
        </div>
    </section>
</x-layout>
