<header class="text-black relative">
    <div class="w-full lg:w-6/7 mx-auto flex justify-between items-center p-4">
        <!-- Logo -->
        <div class="font-bold">
            <a href="#">
                <ul class="flex space-y-0 space-x-0 flex-col items-center">
                    <li class="list-disc">Bayu</li>
                    <li class="transform rotate-180">Ferdianto</li>
                </ul>
            </a>
        </div>
        <!-- Navigation -->
        <nav class="hidden md:flex items-center text-sm space-x-12">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/projects" :active="request()->is('projects')">Projects</x-nav-link>
            <x-nav-link href="/services" :active="request()->is('services')">Services</x-nav-link>
            <x-button href="/contact">Contact</x-button>
        </nav>
        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden text-black focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="md:hidden bg-transparent hidden w-40 p-4 border absolute top-full right-4 shadow z-50">
        <nav class="flex flex-col items-center gap-y-2 list-none w-full sm:text-lg">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/projects" :active="request()->is('projects')">Projects</x-nav-link>
            <x-nav-link href="/services" :active="request()->is('services')">Services</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
        </nav>
    </div>
</header>
