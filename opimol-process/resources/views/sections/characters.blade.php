<section id="characters" class="py-20 bg-dark relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <img src="{{ asset('images/wanted-posters-bg.jpg') }}" alt="" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4 md:text-5xl">Para<span class="text-orange-500"> Admin</span></h2>
            <div class="w-16 h-1 bg-secondary mx-auto"></div>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Inilah para otak di balik OPIMOL. Merekalah yang mengembangkan komunitas ini sampai serame sekarang. <span class="text-orange-500"> All hail to OPIMOL Admin</span>🙇‍♂️🙇‍♀️
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($characters as $character)
            <div class="bg-gray-800/80 p-6 rounded-lg object-center text-center pirate-border hover:border-orange-400 transition-all hover:scale-105">
                <div class="relative w-32 h-32 rounded-3xl mx-auto mb-4 rounded-3xl rounded-full">
                    <img src="{{ asset('images/characters/' . $character['image']) }}" alt="{{ $character['name'] }}" class="w-full h-full rounded-3xl object-cover">
                </div>
                <h3 class="text-xl font-bold mb-2">{{ $character['name'] }}
                    <i class="fas fa-check-circle text-blue-500 text-xl"></i>
                </h3>
                <p class="text-gray-300 mb-2">{{ $character['role'] }}</p>
                <p class="text-sm text-gray-400">{{ $character['description'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="#" class="bg-transparent hover:bg-secondary/10 border border-secondary text-secondary font-bold py-3 px-6 rounded-lg transition-colors">
                View All Characters
            </a>
        </div>
    </div>
</section>