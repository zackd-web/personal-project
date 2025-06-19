<footer class="bg-dark py-8 border-t border-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0 flex items-center">
                <img src="{{ asset('images/opimol-logo.jpg') }}" alt="Straw Hat Logo" class="w-10 h-10 mr-2">
                <a href="#" class="text-2xl font-bold text-gradient">OPIMOL</a>
            </div>
            <div class="flex flex-wrap gap-4 md:gap-8 justify-center">
                <a href="#home" class="hover:text-secondary transition-colors">Home</a>
                <a href="#about" class="hover:text-secondary transition-colors">About</a>
                <a href="#characters" class="hover:text-secondary transition-colors">Characters</a>
                <a href="#events" class="hover:text-secondary transition-colors">Events</a>
                <a href="#gallery" class="hover:text-secondary transition-colors">Gallery</a>
                <a href="#contact" class="hover:text-secondary transition-colors">Join Us</a>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>
                &copy; {{ date('Y') }} OPIMOL - One Piece Indonesia IMO Liar.
                <br>
                <span class="text-sm">Website dibuat penuh 🧡 oleh komunitas ini.</span>
            </p>
        </div>
    </div>
</footer>