<a {{ $attributes }}
    class="relative overflow-hidden px-4 py-2 border bg-transparent group flex items-center justify-center"
    aria-label="button">
    <span
        class="relative z-10 text-black group-hover:text-white transition-colors duration-300">{{ $slot }}</span>
    <span
        class="absolute left-0 bottom-0 w-full h-full bg-black transform scale-0 origin-bottom-left group-hover:scale-100 transition-transform duration-300 z-0"></span>
</a>
