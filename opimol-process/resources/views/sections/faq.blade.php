<!-- FAQ Section -->
    <section id="faq" class="py-20 bg-dark">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 animate-on-scroll animate-slide-up">Tanya-tanya <span class="text-orange-500">dulu yuk‼</span></h2>
                <div class="w-16 h-1 bg-secondary mx-auto animate-on-scroll animate-scale-in animate-delay-200"></div>
                <p data-aos="fade-right" data-aos-delay="500" class="text-xl text-gray-300 animate-on-scroll animate-fade-in animate-delay-300">Pertanyaan-pertanyaan yang sering muncul nih dan mungkin kalian tanyain.</p>
                <p data-aos="fade-right" data-aos-delay="400" class="text-xl text-gray-300">Kalau masih penasaran, gas chat admin aja😁😎</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <!-- FAQ 1 -->
                <div data-aos="zoom-in-up" data-aos-delay="100" x-data="{ open: false }" class="mb-4 animate-on-scroll animate-slide-up animate-delay-100">
                    <button @click="open = !open" class=" flex justify-between items-center w-full p-5 font-medium text-left bg-gray-800 rounded-t-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-300"  aria-expanded="false">
                        <span>Gimana cara gabung OPIMOL min?</span>
                        <i :class="{ 'rotate-180': open }" class="transition-transform duration-300 fa-solid fa-angle-down"></i>
                    </button>
                    <div x-show="open" x-transition.duration.300ms  class="faq-content bg-gray-700 rounded-b-lg overflow-hidden">
                        <div class="text-gray-300 p-5">
                            Tenang, gampang kok. Chat aja salah satu admin OPIMOL yang ramah-ramah dan bilang mau gabung OPIMOL. Udah deh, kalian jadi bagian OPIMOL yang seru😁
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div data-aos="zoom-in-up" data-aos-delay="200" x-data="{ open: false }" class="mb-4 animate-on-scroll animate-slide-up animate-delay-100">
                    <button @click="open = !open"  class="faq-toggle flex justify-between items-center w-full p-5 font-medium text-left bg-gray-800 rounded-t-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-300"  aria-expanded="false">
                        <span>Yang baru ngikutin One Piece boleh gabung ga?</span>
                        <i :class="{ 'rotate-180': open }" class="transition-transform duration-300 fa-solid fa-angle-down"></i>
                    </button>
                    <div x-show="open" x-transition.duration.300ms  class="faq-content bg-gray-700 rounded-b-lg overflow-hidden">
                        <div class="text-gray-300 p-5">
                            Siapa aja boleh dong, pemula, senior, sepuh, bapak-bapak 4 anak pun boleh banget gabung. Yang penting suka One Piece dan ngikutin sampe tamat berlayar🎉
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
               <div data-aos="zoom-in-up" data-aos-delay="300" x-data="{ open: false }" class="mb-4 animate-on-scroll animate-slide-up animate-delay-100">
                    <button @click="open = !open"  class="faq-toggle flex justify-between items-center w-full p-5 font-medium text-left bg-gray-800 rounded-t-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-300"  aria-expanded="false">
                        <span>Boleh bahas apa aja di grup nya?</span>
                        <i :class="{ 'rotate-180': open }" class="transition-transform duration-300 fa-solid fa-angle-down"></i>
                    </button>
                    <div x-show="open" x-transition.duration.300ms  class="faq-content bg-gray-700 rounded-b-lg overflow-hidden">
                        <div class="text-gray-300 p-5">
                            Boleh apa aja kok, selagi ga ganggu anggota lain. Dan nanti ada bedah chapter terbaru, disana kalian bisa diskusi sama yang lain, bisa juga kalo mau berteori brutal😎. Dan para admin siap menjawab pertanyaan kalian, pastinya ga asal jawab karena dari sumber terpercaya🧠
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div data-aos="zoom-in-up" data-aos-delay="400" x-data="{ open: false }" class="mb-4 animate-on-scroll animate-slide-up animate-delay-100">
                    <button @click="open = !open"  class="faq-toggle flex justify-between items-center w-full p-5 font-medium text-left bg-gray-800 rounded-t-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-300"  aria-expanded="false">
                        <span>Udah gabung komunitas lain nih, tetep boleh masuk OPIMOL ga?</span>
                        <i :class="{ 'rotate-180': open }" class="transition-transform duration-300 fa-solid fa-angle-down"></i>
                    </button>
                    <div x-show="open" x-transition.duration.300ms  class="faq-content bg-gray-700 rounded-b-lg overflow-hidden">
                        <div class="text-gray-300 p-5">
                            Siapapun, darimanapun boleh gabung jadi bagian OPIMOL kok. Meski udah jadi member komunitas lain misal KOPTAS, One Piece Bogor, One Piece Makassar, TsukiNakaMalang, siapa aja silahkan gabung. Malah beberapa admin dan member OPIMOL gabung komunitas lain. Jadi gass join sini😉✨
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
               <div data-aos="zoom-in-up" data-aos-delay="500" x-data="{ open: false }" class="mb-4 animate-on-scroll animate-slide-up animate-delay-100">
                    <button @click="open = !open"  class="faq-toggle flex justify-between items-center w-full p-5 font-medium text-left bg-gray-800 rounded-t-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-300"  aria-expanded="false">
                        <span>Ada event apa aja min di OPIMOL</span>
                        <i :class="{ 'rotate-180': open }" class="transition-transform duration-300 fa-solid fa-angle-down"></i>
                    </button>
                    <div x-show="open" x-transition.duration.300ms  class="faq-content bg-gray-700 rounded-b-lg overflow-hidden">
                        <div class="text-gray-300 p-5">
                            OPIMOL stands for One Piece Indonesia Moluccas. We are a passionate community of One Piece fans from Indonesia who love to discuss theories, organize events, and share our love for Eiichiro Oda's masterpiece.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>