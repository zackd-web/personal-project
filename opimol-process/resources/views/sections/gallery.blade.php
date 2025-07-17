<section id="gallery" class="py-20 bg-gray-900 relative">
    <div class="absolute inset-0 opacity-10">
        <img src="{{ asset('images/straw-hat-bg.png') }}" alt="" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Galeri Kenangan</h2>
            <div class="w-16 h-1 bg-yellow-400 mx-auto mb-6"></div>
            <p class="text-xl text-gray-300">Foto-foto kegiatan, event yang OPIMOL ikutin dan laksanakan. Gas liat-liat dulu🥳 </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleryImages as $image)
                <div data-aos="zoom-in-up" class="group overflow-hidden rounded-lg shadow-lg bg-gray-800 transition-transform duration-300 hover:scale-105">
                    <div class="relative h-64 overflow-hidden hover:border-orange-400 transition-colors">
                        <img 
                            src="{{ asset('images/gallery/' . $image->image) }}" 
                            alt="{{ $image->title ?? 'Gallery Image' }}" 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                            onerror="this.src='{{ asset('images/placeholder.jpg') }}'; this.onerror=null;"
                        >
                    </div>
                    @if($image->title)
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $image->title }}</h3>
                            @if($image->description)
                                <p class="text-gray-400 mt-1">{{ $image->description }}</p>
                            @endif
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-400 text-lg">No gallery images available yet.</p>
                </div>
            @endforelse
        </div>
        
        @if(count($galleryImages) > 6)
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-transparent border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-gray-900 font-bold py-3 px-8 rounded-lg transition-colors">
                    View Full Gallery
                </a>
            </div>
        @endif
    </div>
</section>