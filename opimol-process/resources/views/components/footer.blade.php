<footer class="bg-dark py-8 border-t border-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0 flex items-center">
                <img src="{{ asset('images/opimol-logo.jpg') }}" alt="Straw Hat Logo" class="w-10 h-10 mr-2">
                <a href="#" class="text-2xl font-bold text-gradient">OPIMOL</a>
            </div>
            <div class="flex flex-wrap gap-4 md:gap-8 justify-center">
                <a href="#home" class="hover:text-secondary transition-colors">Beranda</a>
                <a href="#about" class="hover:text-secondary transition-colors">Tentang OPIMOL</a>
                <a href="#characters" class="hover:text-secondary transition-colors">Admin OPIMOL</a>
                <a href="#events" class="hover:text-secondary transition-colors">Event</a>
                <a href="#gallery" class="hover:text-secondary transition-colors">Galeri Kenangan</a>
                <a href="#faq" class="hover:text-secondary transition-colors">Tanya-tanya</a>
                <a href="#join" class="hover:text-secondary transition-colors">Ayo Gabung</a>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>
                &copy; {{ date('Y') }} OPIMOL - One Piece Indonesia IMO Liar.
                <br>
                <span class="text-sm">Website dibuat penuh 🧡 oleh komunitas ini.</span>
            </p>
        </div>
        <div class="flex justify-center mt-8">
            <div class="flex justify-center md:justify-start gap-4">
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                    <i class="fab fa-instagram text-white"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                    <i class="fab fa-tiktok text-white"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                    <i class="fab fa-youtube text-white"></i>
                </a>
            </div>
        </div>
    </div>
</footer>