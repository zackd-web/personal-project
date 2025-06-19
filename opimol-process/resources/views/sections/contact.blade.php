<section id="contact" class="py-20 bg-gray-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="{{ asset('images/straw-hat-bg.png') }}" alt="Straw Hat Background" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Join Our Crew</h2>
            <div class="w-16 h-1 bg-secondary mx-auto"></div>
        </div>
        <div class="flex flex-col md:flex-row gap-12">
            <div class="md:w-1/2">
                @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-300 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
                @endif
                
                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="favorite" class="block text-sm font-medium mb-2">Favorite Character</label>
                        <select id="favorite" name="favorite" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary @error('favorite') border-red-500 @enderror">
                            <option value="">Select a character</option>
                            <option value="Luffy" {{ old('favorite') == 'Luffy' ? 'selected' : '' }}>Monkey D. Luffy</option>
                            <option value="Zoro" {{ old('favorite') == 'Zoro' ? 'selected' : '' }}>Roronoa Zoro</option>
                            <option value="Nami" {{ old('favorite') == 'Nami' ? 'selected' : '' }}>Nami</option>
                            <option value="Usopp" {{ old('favorite') == 'Usopp' ? 'selected' : '' }}>Usopp</option>
                            <option value="Sanji" {{ old('favorite') == 'Sanji' ? 'selected' : '' }}>Sanji</option>
                            <option value="Chopper" {{ old('favorite') == 'Chopper' ? 'selected' : '' }}>Tony Tony Chopper</option>
                            <option value="Robin" {{ old('favorite') == 'Robin' ? 'selected' : '' }}>Nico Robin</option>
                            <option value="Franky" {{ old('favorite') == 'Franky' ? 'selected' : '' }}>Franky</option>
                            <option value="Brook" {{ old('favorite') == 'Brook' ? 'selected' : '' }}>Brook</option>
                            <option value="Jinbe" {{ old('favorite') == 'Jinbe' ? 'selected' : '' }}>Jinbe</option>
                            <option value="Other" {{ old('favorite') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('favorite')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Why do you want to join?</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition-colors w-full">
                        Submit Application
                    </button>
                </form>
            </div>
            <div class="md:w-1/2">
                <div class="bg-gray-700 p-8 rounded-lg h-full">
                    <h3 class="text-2xl font-bold mb-6">Community Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/20 p-3 rounded-lg text-primary text-xl">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-medium">Email</h4>
                                <p class="text-gray-300">join@opimol.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/20 p-3 rounded-lg text-primary text-xl">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-medium">Headquarters</h4>
                                <p class="text-gray-300">Jl. Sudirman No. 123, Jakarta, Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/20 p-3 rounded-lg text-primary text-xl">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="font-medium">Phone</h4>
                                <p class="text-gray-300">+62 123 456 7890</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h4 class="font-medium mb-4">Follow Us</h4>
                        <div class="flex gap-4">
                            <a href="#" class="bg-gray-600 hover:bg-primary text-white p-3 rounded-full transition-colors">
                                <i class="fab fa-discord"></i>
                            </a>
                            <a href="#" class="bg-gray-600 hover:bg-primary text-white p-3 rounded-full transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="bg-gray-600 hover:bg-primary text-white p-3 rounded-full transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="bg-gray-600 hover:bg-primary text-white p-3 rounded-full transition-colors">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>