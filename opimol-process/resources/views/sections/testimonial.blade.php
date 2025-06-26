<!-- Testimonials Section -->
    <section class="py-10 bg-gray-800" x-data="testimonialCarousel()">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white-800">Testimoni Member</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Kisah nyata dari para pemalas produktif: ngoding dikit, fesnukan banyak. Tapi tetap keren (kadang).
                </p>
            </div>

            <div class="max-w-4xl mx-auto relative">
                <div class="shadow-lg border-0 rounded-lg p-8 md:p-12 bg-gray-900">
                    <div class="flex flex-col md:flex-row items-center gap-8">
                        <div class="flex-shrink-0">
                            <div class="w-20 h-20 rounded-full overflow-hidden bg-gradient-to-br from-orange-400 to-pink-500 p-1">
                                <img :src="testimonials[currentIndex].avatar" :alt="testimonials[currentIndex].name" class="w-full h-full rounded-full object-cover bg-white">
                            </div>
                        </div>

                        <div class="flex-1 text-center md:text-left">
                            <div class="flex items-start gap-5">
                                <i class="fas text-blue-400 text-3xl flex-shrink-0 mt-1"></i>
                                <div>
                                    <p class="text-lg md:text-md text-white-700 italic mb-6 leading-relaxed" x-text="testimonials[currentIndex].content"></p>
                                    <div>
                                        <h4 class="text-xl font-bold text-white-800" x-text="testimonials[currentIndex].name"></h4>
                                        <p class="text-white-500" x-text="testimonials[currentIndex].role"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button @click="goToPrevious()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 border border-orange-600 shadow-lg w-12 h-12 rounded-full flex items-center justify-center">
                    <i class="fas fa-chevron-left text-white-600"></i>
                </button>

                <button @click="goToNext()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 border border-orange-600 shadow-lg w-12 h-12 rounded-full flex items-center justify-center">
                    <i class="fas fa-chevron-right text-white-600"></i>
                </button>

                <!-- Dots Indicator -->
                <div class="flex justify-center mt-8 gap-2">
                    <template x-for="(testimonial, index) in testimonials" :key="index">
                        <button @click="goToSlide(index)" :class="index === currentIndex ? 'bg-blue-500' : 'bg-gray-300'" class="w-3 h-3 rounded-full transition-colors"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <script>
        function testimonialCarousel() {
            return {
                currentIndex: 0,
                testimonials: [
                    {
                        name: "Reza Pahlawan Bug",
                        role: "Meme Hunter",
                        avatar: "/placeholder.svg?height=80&width=80",
                        content: "Sejak gabung grup ini, saya jadi lebih sering buka WA daripada produktif. Tapi nggak nyesel soalnya nagih! 😎"
                    },
                    {
                        name: "Siti Nakama",
                        role: "Penteori Ngawor",
                        avatar: "/placeholder.svg?height=80&width=80",
                        content: "Komunitas terbaik untuk diskusi teori One Piece! Selalu ada insight baru yang bikin pikiran terbuka."
                    },
                    {
                        name: "Budi Strawhat",
                        role: "Fanart Creator",
                        avatar: "/placeholder.svg?height=80&width=80",
                        content: "Tempat yang tepat untuk share karya seni. Feedback dari member selalu membangun dan memotivasi. Apalagi selalu ada event lomba gambar, makin tertantang😄!"
                    },
                    {
                        name: "Ani Pirate",
                        role: "Chapter Reviewer",
                        avatar: "/placeholder.svg?height=80&width=80",
                        content: "Diskusi chapter mingguan di sini selalu seru! Banyak perspektif berbeda yang memperkaya pemahaman."
                    },
                    {
                        name: "Joko Mugiwara",
                        role: "Event Organizer",
                        avatar: "/placeholder.svg?height=80&width=80",
                        content: "Dari member biasa jadi organizer event. Komunitas ini benar-benar memberikan kesempatan berkembang!"
                    }
                ],
                init() {
                    setInterval(() => {
                        this.goToNext();
                    }, 5000);
                },
                goToPrevious() {
                    this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length;
                },
                goToNext() {
                    this.currentIndex = (this.currentIndex + 1) % this.testimonials.length;
                },
                goToSlide(index) {
                    this.currentIndex = index;
                }
            }
        }
    </script>