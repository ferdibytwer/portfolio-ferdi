<x-layout :title="$title">
    <section id="post">
        <div class="container_">
            <div class="mb-40 mt-20">
                <!-- post Detail -->
                <div class="border border-[#7b6f5b] p-6 bg-[#fdf6e3] shadow-inner">
                    {{-- Gambar --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="image-style mb-4">
                    @else
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w"
                            alt="{{ $post->title }}" class="image-style mb-4">
                    @endif

                    {{-- Judul --}}
                    <h2
                        class="text-2xl font-bold text-[#3d3427] uppercase mb-2 tracking-wider border-b border-[#7b6f5b] pb-1">
                        {{ $post->title }}
                    </h2>

                    <div class="flex flex-col leading-tigh">
                        {{-- Kategori & Author --}}
                        <p class="text-sm italic text-[#5e4f3d]">
                            {{ $post->category->name }} — oleh {{ $post->user->name }}
                        </p>
                        {{-- Tanggal --}}
                        <time class="text-sm italic text-[#5e4f3d] mb-4">Diunggah pada
                            {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}</time>
                    </div>

                    {{-- Deskripsi Full --}}
                    <div class="text-base text-[#3e3324] leading-relaxed text-justify prose prose-sm max-w-none">
                        {!! $post->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
