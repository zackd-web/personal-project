<header class="fixed w-full bg-dark/80 backdrop-blur-sm z-50 border-b border-secondary/30">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-gradient flex items-center">
            <img src="{{ asset('images/straw-hat-logo.png') }}" alt="Straw Hat Logo" class="w-10 h-10 mr-2">
            OPIMOL
        </a>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="hover:text-secondary transition-colors">Home</a>
            <a href="#about" class="hover:text-secondary transition-colors">About</a>
            <a href="#characters" class="hover:text-secondary transition-colors">Characters</a>
            <a href="#events" class="hover:text-secondary transition-colors">Events</a>
            <a href="#gallery" class="hover:text-secondary transition-colors">Gallery</a>
            <a href="#contact" class="hover:text-secondary transition-colors">Join Us</a>
        </div>
        <button id="mobile-menu-button" class="md:hidden text-white">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </nav>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-dark/90 backdrop-blur-sm w-full">
        <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">
            <a href="#home" class="hover:text-secondary transition-colors">Home</a>
            <a href="#about" class="hover:text-secondary transition-colors">About</a>
            <a href="#characters" class="hover:text-secondary transition-colors">Characters</a>
            <a href="#events" class="hover:text-secondary transition-colors">Events</a>
            <a href="#gallery" class="hover:text-secondary transition-colors">Gallery</a>
            <a href="#contact" class="hover:text-secondary transition-colors">Join Us</a>
        </div>
    </div>
</header>