<section id="characters" class="py-20 bg-dark relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <img src="{{ asset('images/wanted-posters-bg.jpg') }}" alt="Wanted Posters Background" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Favorite Characters</h2>
            <div class="w-16 h-1 bg-secondary mx-auto"></div>
            <p class="mt-4 text-gray-300 max-w-2xl mx-auto">
                Meet the beloved characters that our community members can't stop talking about!
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($characters as $character)
            <div class="bg-gray-800/80 p-6 rounded-lg text-center card-hover pirate-border">
                <div class="relative w-32 h-32 mx-auto mb-4 overflow-hidden rounded-full">
                    <img src="{{ asset('images/characters/' . $character['image']) }}" alt="{{ $character['name'] }}" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold mb-2">{{ $character['name'] }}</h3>
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