<section id="events" class="py-20 bg-gray-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="{{ asset('images/one-piece-battle.jpg') }}" alt="One Piece Battle" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Upcoming Events</h2>
            <div class="w-16 h-1 bg-secondary mx-auto"></div>
        </div>
        
        <!-- Event Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="filter-btn active bg-primary text-white px-6 py-2 rounded-full" data-filter="all">All Events</button>
            <button class="filter-btn bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded-full" data-filter="meetup">Meetups</button>
            <button class="filter-btn bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded-full" data-filter="cosplay">Cosplay</button>
            <button class="filter-btn bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded-full" data-filter="watch">Watch Party</button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
            <div class="event-item {{ $event['category'] }} card-hover" data-category="{{ $event['category'] }}">
                <div class="bg-gray-700 rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('images/events/' . $event['image']) }}" alt="{{ $event['title'] }}" class="w-full h-64 object-cover">
                        <div class="absolute top-0 right-0 bg-primary text-white px-4 py-2 rounded-bl-lg font-bold">
                            {{ $event['date'] }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $event['title'] }}</h3>
                        <p class="text-gray-300 mb-4">{{ $event['description'] }}</p>
                        <div class="flex items-center mb-4">
                            <i class="fas fa-map-marker-alt text-secondary mr-2"></i>
                            <span class="text-gray-300">{{ $event['location'] }}</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <i class="fas fa-clock text-secondary mr-2"></i>
                            <span class="text-gray-300">{{ $event['time'] }}</span>
                        </div>
                        <a href="#" class="inline-block bg-primary hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition-colors w-full text-center">
                            Lihat di Instagram
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="#" class="bg-transparent hover:bg-secondary/10 border border-secondary text-secondary font-bold py-3 px-6 rounded-lg transition-colors">
                View All Events
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Event Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const eventItems = document.querySelectorAll('.event-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-primary');
                btn.classList.add('bg-gray-700');
            });
            
            // Add active class to clicked button
            button.classList.add('active', 'bg-primary');
            button.classList.remove('bg-gray-700');
            
            const filter = button.getAttribute('data-filter');
            
            eventItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush