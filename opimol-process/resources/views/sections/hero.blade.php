<section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden pt-16">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/one-piece-ocean.jpg') }}" alt="One Piece Ocean" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 to-dark"></div>
    </div>
    <div class="container mx-auto px-4 z-10 text-center">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow-lg">
            Welcome to <span class="font-bold text-secondary mb-2">OPIMOL</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-gray-300">
            The ultimate community for One Piece fans to connect, share, and embark on grand adventures together!
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <a href="https://discord.gg/opimol" target="_blank" class="bg-[#5865F2] hover:bg-[#4752C4] text-white p-3 rounded-full transition-colors">
                <i class="fab fa-discord text-xl"></i>
            </a>
            <a href="https://instagram.com/opimol" target="_blank" class="bg-[#E1306C] hover:bg-[#C13584] text-white p-3 rounded-full transition-colors">
                <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="https://twitter.com/opimol" target="_blank" class="bg-[#1DA1F2] hover:bg-[#0c85d0] text-white p-3 rounded-full transition-colors">
                <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="https://youtube.com/opimol" target="_blank" class="bg-[#FF0000] hover:bg-[#CC0000] text-white p-3 rounded-full transition-colors">
                <i class="fab fa-youtube text-xl"></i>
            </a>
        </div>
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="#events" class="bg-primary hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition-colors">
                Upcoming Events
            </a>
            <a href="#contact" class="bg-transparent hover:bg-secondary/10 border border-secondary text-secondary font-bold py-3 px-6 rounded-lg transition-colors">
                Join Our Crew
            </a>
        </div>
    </div>
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-white">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>