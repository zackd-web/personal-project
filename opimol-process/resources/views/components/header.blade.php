<header class="fixed w-full bg-dark/80 backdrop-blur-sm z-50 border-b border-secondary/30">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-gradient flex items-center">
            <img src="{{ asset('images/opimol-logo.jpg') }}" alt="Straw Hat Logo" class="w-10 h-10 mr-2">
            OPIMOL
        </a>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="hover:text-secondary transition-colors">Beranda</a>
            <a href="#about" class="hover:text-secondary transition-colors">Tentang OPIMOL</a>
            <a href="#characters" class="hover:text-secondary transition-colors">Admin OPIMOL</a>
            <a href="#events" class="hover:text-secondary transition-colors">Event</a>
            <a href="#gallery" class="hover:text-secondary transition-colors">Galeri Kenangan</a>
            <a href="#faq" class="hover:text-secondary transition-colors">Tanya-tanya</a>
            <a href="#join" class="hover:text-secondary transition-colors">Ayo Gabung</a>
        </div>
        <button id="mobile-menu-button" class="md:hidden text-white">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </nav>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden sm:hidden lg:hidden xl:hidden bg-dark/90 backdrop-blur-sm w-full">
        <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">
            <a href="#home" class="hover:text-secondary transition-colors">Beranda</a>
            <a href="#about" class="hover:text-secondary transition-colors">Tentang OPIMOL</a>
            <a href="#characters" class="hover:text-secondary transition-colors">Admin OPIMOL</a>
            <a href="#events" class="hover:text-secondary transition-colors">Event</a>
            <a href="#gallery" class="hover:text-secondary transition-colors">Galeri Kenangan</a>
            <a href="#faq" class="hover:text-secondary transition-colors">Tanya-tanya</a>
            <a href="#join" class="hover:text-secondary transition-colors">Ayo Gabung</a>
        </div>
    </div>
</header>