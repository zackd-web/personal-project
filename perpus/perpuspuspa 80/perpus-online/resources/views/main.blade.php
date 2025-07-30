<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Desa - Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        .carousel-fade {
            transition: opacity 0.5s ease-in-out;
        }
        /* .lightbox-overlay {
            backdrop-filter: blur(4px);
        } */
    </style>
</head>
<body class="bg-gray-50" x-data="{ lightboxOpen: false, currentImage: '', currentImageIndex: 0 }">
    

    <!-- Main Content -->
    <div>
        <!-- Header Sticky -->
<header class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{asset('grid-gallery/puspa.png')}}" style="height: 40px; width: 40px;" alt="">
                <!-- <i class="fas fa-book text-green-600 text-2xl"></i> -->
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Perpustakaan Desa</h1>
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex space-x-6">
                <a href="#buku" class="text-gray-600 hover:text-green-600 transition duration-300">Buku</a>
                <a href="#galeri" class="text-gray-600 hover:text-green-600 transition duration-300">Galeri</a>
                <a href="#kontak" class="text-gray-600 hover:text-green-600 transition duration-300">Kontak</a>
                <a href="/login" class="text-gray-600 hover:text-green-600 transition duration-300">Login</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-gray-600 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobile-menu" class="hidden md:hidden flex-col space-y-3 mt-4">
            <a href="#buku" class="block text-gray-600 hover:text-green-600 transition duration-300">Buku</a>
            <a href="#galeri" class="block text-gray-600 hover:text-green-600 transition duration-300">Galeri</a>
            <a href="#kontak" class="block text-gray-600 hover:text-green-600 transition duration-300">Kontak</a>
            <a href="/login" class="block text-gray-600 hover:text-green-600 transition duration-300">Login</a>
        </div>
    </div>
</header>

        <!-- Hero Section with Carousel -->
        <section id="hero" class="relative h-screen overflow-hidden" 
                 x-data="{ 
                     currentSlide: 0, 
                     slides: [
                         'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1920&h=1080&fit=crop',
                         'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1920&h=1080&fit=crop',
                         'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1920&h=1080&fit=crop',
                         'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&h=1080&fit=crop'
                     ],
                     autoSlide() {
                         setInterval(() => {
                             this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                         }, 5000);
                     }
                 }"
                 x-init="autoSlide()">
            
            <!-- Carousel Images -->
            <template x-for="(slide, index) in slides" :key="index">
                <div class="absolute inset-0 carousel-fade"
                     :class="currentSlide === index ? 'opacity-100' : 'opacity-0'">
                    <img :src="slide" :alt="'Slide ' + (index + 1)" 
                         class="w-full h-full object-cover">
                </div>
            </template>
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            
            <!-- Hero Content -->
            <div class="relative z-10 flex items-center justify-center h-full text-white">
                <div class="text-center px-4 max-w-4xl">
                    <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        Selamat Datang di<br>Perpustakaan Puspa
                    </h2>
                    <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed">
                        Tempat berkumpulnya ilmu pengetahuan untuk seluruh masyarakat desa. 
                        Kami menyediakan berbagai koleksi buku, ruang baca yang nyaman, 
                        dan berbagai kegiatan literasi untuk meningkatkan minat baca warga.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#buku" class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                            Jelajahi Koleksi Buku
                        </a>
                        <a href="#galeri" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition duration-300">
                            Lihat Kegiatan
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Carousel Controls -->
            <button @click="currentSlide = currentSlide === 0 ? slides.length - 1 : currentSlide - 1"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-0 hover:bg-opacity-30 text-white p-3 transition duration-300">
            </button>
            <button @click="currentSlide = (currentSlide + 1) % slides.length"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-0 hover:bg-opacity-30 text-white p-3 transition duration-300">
            </button>
            
            <!-- Carousel Indicators -->
            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="currentSlide = index"
                            class="w-3 h-3 rounded-full transition duration-300"
                            :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'">
                    </button>
                </template>
            </div>
        </section>

        <!-- Informasi Buku Section with Background -->
        <section id="buku" class="py-16 relative bg-gray-100">
            <!-- Background Image Overlay -->
            <div class="absolute inset-0 bg-[url('/images/perpustakaan.jpg')] bg-cover bg-center bg-fixed opacity-20"></div>
            <div class="absolute inset-0 bg-gray/80 backdrop-blur-sm"></div>

            <!-- Content -->
            <div class="relative z-10 container mx-auto px-4">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Koleksi Buku Terpopuler</h3>
                    <div class="w-24 h-1.5 bg-blue-600 mx-auto mb-4"></div>
                    <p class="text-2xl text-gray-600 max-w-2xl mx-auto">
                        Temukan berbagai koleksi buku menarik yang tersedia di perpustakaan kami
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Buku 1: bumiii.jpg -->
                    <div class="relative bg-white rounded-xl border border-blue-600 transform transition-all duration-300 hover:scale-105 overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="relative h-56 bg-cover bg-center" style="background-image: url('{{ asset('grid-gallery/bumiii.jpg') }}');">
                            <div class="absolute top-2 left-2 bg-yellow-400 w-10 h-10 rounded-full flex items-center justify-center shadow-md">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">Bumi</h4>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Buku pertama dari seri fantasi karya Tere Liye tentang dunia paralel dan kekuatan anak remaja bernama Raib.
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user mr-2"></i>
                                <span>Tere Liye</span>
                            </div>
                        </div>
                    </div>

                    <!-- Buku 2: matahari.jpg -->
                    <div class="relative bg-white rounded-xl border border-blue-600 transform transition-all duration-300 hover:scale-105 overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="relative h-56 bg-cover bg-center" style="background-image: url('{{ asset('grid-gallery/matahari.jpg') }}');">
                            <div class="absolute top-2 left-2 bg-yellow-400 w-10 h-10 rounded-full flex items-center justify-center shadow-md">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">Matahari</h4>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Kelanjutan petualangan Raib dan Ali di dunia paralel, kali ini mereka menyelidiki misteri dunia Matahari yang mengagumkan.
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user mr-2"></i>
                                <span>Tere Liye</span>
                            </div>
                        </div>
                    </div>

                    <!-- Buku 3: saggaras.jpg -->
                    <div class="relative bg-white rounded-xl border border-blue-600 transform transition-all duration-300 hover:scale-105 overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="relative h-56 bg-cover bg-center" style="background-image: url('{{ asset('grid-gallery/saggaras.jpg') }}');">
                            <div class="absolute top-2 left-2 bg-yellow-400 w-10 h-10 rounded-full flex items-center justify-center shadow-md">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">SagaraS</h4>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Buku lanjutan dari serial Bumi yang penuh ketegangan, membawa pembaca menjelajahi konflik besar antara dunia paralel.
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user mr-2"></i>
                                <span>Tere Liye</span>
                            </div>
                        </div>
                    </div>

                    <!-- Buku 4: bulan.jpg -->
                    <div class="relative bg-white rounded-xl border border-blue-600 transform transition-all duration-300 hover:scale-105 overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="relative h-56 bg-cover bg-center" style="background-image: url('{{ asset('grid-gallery/bulan.jpg') }}');">
                            <div class="absolute top-2 left-2 bg-yellow-400 w-10 h-10 rounded-full flex items-center justify-center shadow-md">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">Bulan</h4>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Petualangan kedua Raib dan kawan-kawan di dunia paralel, menjelajahi dunia Bulan yang penuh teka-teki.
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user mr-2"></i>
                                <span>Tere Liye</span>
                            </div>
                        </div>
                    </div>

                    <!-- Buku 5: bibigill.jpg -->
                    <div class="relative bg-white rounded-xl border border-blue-600 transform transition-all duration-300 hover:scale-105 overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="relative h-56 bg-cover bg-center" style="background-image: url('{{ asset('grid-gallery/bibigill.jpg') }}');">
                            <div class="absolute top-2 left-2 bg-yellow-400 w-10 h-10 rounded-full flex items-center justify-center shadow-md">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">Bibi Gill</h4>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Kisah penuh misteri tentang sosok Bibi Gill dan rahasia besar yang menyelimuti masa lalunya dalam semesta Dunia Paralel.
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user mr-2"></i>
                                <span>Tere Liye</span>
                            </div>
                        </div>
                    </div>

                    <!-- Buku 6: comet.jpg -->
                    <div class="relative bg-white rounded-xl border border-blue-600 transform transition-all duration-300 hover:scale-105 overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="relative h-56 bg-cover bg-center" style="background-image: url('{{ asset('grid-gallery/comet.jpg') }}');">
                            <div class="absolute top-2 left-2 bg-yellow-400 w-10 h-10 rounded-full flex items-center justify-center shadow-md">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">Comet</h4>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Babak penting dalam perjalanan tokoh utama di dunia Comet, penuh kejutan, intrik, dan teknologi canggih.
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user mr-2"></i>
                                <span>Tere Liye</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Galeri Kegiatan Section with Lightbox -->
        <section id="galeri" class="py-16 bg-white-100">
            <div class="container mx-auto px-4 ">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Galeri Kegiatan</h3>
                    <div class="w-24 h-1.5 bg-blue-600 mx-auto mb-4"></div>
                    <p class="text-2xl text-gray-600 max-w-2xl mx-auto">Dokumentasi berbagai kegiatan literasi dan pembelajaran di perpustakaan desa</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-2 gap-3"
                     x-data="{
                         images: [
                             {
                                 src: '{{asset('grid-gallery/suasana-perpus.jpg')}} ',
                                 title: 'Kegiatan Membaca Bersama',
                                 description: 'Program rutin setiap hari Sabtu'
                             },
                             {
                                 src: '{{asset('grid-gallery/perpus.jpg')}}',
                                 title: 'Workshop Menulis',
                                 description: 'Pelatihan menulis untuk remaja desa'
                             },
                             {
                                 src: '{{asset('grid-gallery/suasana-perpus.jpg')}}',
                                 title: 'Dongeng untuk Anak',
                                 description: 'Sesi bercerita setiap hari Minggu'
                             },
                             {
                                 src: '{{asset('grid-gallery/suasana-perpus.jpg')}}',
                                 title: 'Diskusi Buku',
                                 description: 'Forum diskusi bulanan'
                             },
                             {
                                 src: '{{asset('grid-gallery/suasana-perpus.jpg')}}',
                                 title: 'Pelatihan Komputer',
                                 description: 'Kursus dasar komputer gratis'
                             },
                             {
                                 src: '{{asset('grid-gallery/suasana-perpus.jpg')}}',
                                 title: 'Perpustakaan Keliling',
                                 description: 'Layanan ke dusun-dusun terpencil'
                             }
                         ]
                     }">
                    
                    <template x-for="(image, index) in images" :key="index">
                        <div class="relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300 cursor-pointer group"
                             @click="lightboxOpen = true; currentImage = image.src; currentImageIndex = index">
                            <img :src="image.src" :alt="image.title" 
                                 class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end opacity-0 group-hover:opacity-100 transition duration-300">
                                <div class="text-white p-4">
                                    <h4 class="font-semibold text-lg" x-text="image.title"></h4>
                                    <p class="text-sm" x-text="image.description"></p>
                                </div>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div class="bg-white bg-opacity-20 rounded-full p-3">
                                    <i class="fas fa-search-plus text-white text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- Lightbox Modal -->
        <div x-show="lightboxOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-90 lightbox-overlay"
             @click="lightboxOpen = false"
             @keydown.escape.window="lightboxOpen = false">
            
            <div class="relative max-w-4xl max-h-full p-4" @click.stop>
                <img :src="currentImage" alt="Lightbox Image" 
                     class="max-w-full max-h-full object-contain rounded-lg">
                
                <!-- Close Button -->
                <button @click="lightboxOpen = false"
                        class="absolute top-4 right-4 text-white hover:text-gray-300 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
                
                <!-- Navigation Buttons -->
                <button @click="currentImageIndex = currentImageIndex === 0 ? 5 : currentImageIndex - 1; currentImage = $el.closest('[x-data]').__x.$data.images[currentImageIndex].src"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 text-2xl">
                </button>
                <button @click="currentImageIndex = (currentImageIndex + 1) % 6; currentImage = $el.closest('[x-data]').__x.$data.images[currentImageIndex].src"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 text-2xl">
                </button>
            </div>
        </div>

        <section id="guru" class="py-16 bg-gray-50 ">
          <div class="container mx-auto px-4">
            <div
              class="text-center mb-12"
              data-aos="fade-up">
              <div
                class="flex justify-center items-center text-4xl text-blue-600 mb-4">
                <i class="bi bi-mortarboard-fill"></i>
              </div>
              <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Struktur Organisasi Perpustakaan <br> "PUSPA"
              </h2>
               <p class="text-2xl md:text-4xl font-bold text-gray-600 max-w-2xl mx-auto mb-4">
                Pancur Mayong Jepara
              </p>
              <div class="w-24 h-1.5 bg-blue-600 mx-auto mb-4"></div>
            </div>

            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
              <div
                class="relative bg-white shadow-lg border border-blue-600 rounded-xl overflow-hidden max-w-md mx-auto transform transition-all duration-300 hover:scale-105">
                <div class="p-6 text-center">
                  <h4 class="text-2xl font-bold text-gray-900 mb-2">Petinggi Desa Pancur</h4>
                  <span class="text-lg text-blue-600 font-semibold">Pelindung</span>
                </div>
              </div>
            </div>

            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
               <div class="relative bg-white shadow-lg rounded-xl border border-blue-600 overflow-hidden max-w-md mx-auto transform transition-all duration-300 hover:scale-105">
                <div class="p-6 text-center">
                  <h4 class="text-2xl font-bold text-gray-900 mb-2">Khirzun Ni'am</h4>
                  <span class="text-lg text-blue-600 font-semibold">Kepala Perpustakaan</span>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="200">
              <div class="bg-white shadow-lg rounded-lg border border-blue-600 overflow-hidden transform transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="250">
                <div class="p-5 text-center">
                  <h4 class="text-xl font-semibold text-gray-800 mb-1">Mulyono Saputro</h4>
                  <span class="text-md text-gray-600">Pelayanan Teknis</span>
                </div>
              </div>

              <div class="bg-white shadow-lg border border-blue-600 rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                <div class="p-5 text-center">
                  <h4 class="text-xl font-semibold text-gray-800 mb-1">Hasanuddin</h4>
                  <span class="text-md text-gray-600">Pelayanan Teknis</span>
                </div>
              </div>

              <div class="bg-white shadow-lg border border-blue-600 rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                <div class="p-5 text-center">
                  <h4 class="text-xl font-semibold text-gray-800 mb-1">M. Nurul Huda</h4>
                  <span class="text-md text-gray-600">Pelayanan Pemustaka</span>
                </div>
              </div>

              <div class="bg-white shadow-lg border border-blue-600 rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                <div class="p-5 text-center">
                  <h4 class="text-xl font-semibold text-gray-800 mb-1">Titik Ulif H.</h4>
                  <span class="text-md text-gray-600">Pelayanan Pemustaka</span>
                </div>
              </div>

              <div class="bg-white shadow-lg border border-blue-600 rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                <div class="p-5 text-center">
                  <h4 class="text-xl font-semibold text-gray-800 mb-1">M. Thoha Mansur</h4>
                  <span class="text-md text-gray-600">Pelayanan Teknologi Informasi</span>
                </div>
              </div>

              <div class="bg-white shadow-lg border border-blue-600 rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                <div class="p-5 text-center">
                  <h4 class="text-xl font-semibold text-gray-800 mb-1">Edy Sunryo</h4>
                  <span class="text-md text-gray-600">Pelayanan Teknologi Informasi</span>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Kontak Section with Cards -->
        <section id="kontak" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Kontak & Lokasi</h3>
                    <div class="w-24 h-1.5 bg-blue-600 mx-auto mb-4"></div>
                    <p class="text-2xl text-gray-600 text-gray-600 max-w-2xl mx-auto">Hubungi kami atau kunjungi langsung perpustakaan desa</p>
                </div>
                
                <!-- Contact Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-2 gap-6 mb-12">
                    <!-- Alamat Card -->
                    <div class="bg-white rounded-lg border border-blue-600 transform transition-all duration-300 hover:scale-105 shadow-md p-6 text-center hover:shadow-lg transition duration-300">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-map-marker-alt text-green-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Alamat</h4>
                        <p class="text-gray-600 text-sm">
                            Jl. Merdeka No. 123<br>
                            Desa Sukamaju<br>
                            Kec. Sejahtera
                        </p>
                    </div>

                    <!-- Telepon Card -->
                    <div class="bg-white rounded-lg border border-blue-600 transform transition-all duration-300 hover:scale-105 shadow-md p-6 text-center hover:shadow-lg transition duration-300">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-phone text-blue-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Telepon</h4>
                        <p class="text-gray-600 text-sm">
                            (021) 123-4567<br>
                            (021) 123-4568
                        </p>
                    </div>

                    <!-- Email Card -->
                    <div class="bg-white rounded-lg border border-blue-600 transform transition-all duration-300 hover:scale-105 shadow-md p-6 text-center hover:shadow-lg transition duration-300">
                        <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-envelope text-purple-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Email</h4>
                        <p class="text-gray-600 text-sm">
                            info@perpustakaandesa.id<br>
                            admin@perpustakaandesa.id
                        </p>
                    </div>

                    <!-- Jam Buka Card -->
                    <div class="bg-white rounded-lg border border-blue-600 transform transition-all duration-300 hover:scale-105 shadow-md p-6 text-center hover:shadow-lg transition duration-300">
                        <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-orange-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Jam Buka</h4>
                        <p class="text-gray-600 text-sm">
                            Sen-Jum: 08:00-16:00<br>
                            Sabtu: 08:00-14:00<br>
                            Minggu: Tutup
                        </p>
                    </div>
                </div>
            
                <!-- Google Maps -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.8859372720403!2d110.7815234!3d-6.6610556999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dff2eff9f167%3A0xb20ece6e4bf045c4!2sPerpustakaan%20Puspa!5e0!3m2!1sid!2sid!4v1753593435354!5m2!1sid!2sid" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-green-600 text-white py-8">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <i class="fas fa-book text-2xl"></i>
                            <h4 class="text-xl font-bold">Perpustakaan Desa</h4>
                        </div>
                        <p class="text-green-100">
                            Membangun budaya literasi untuk kemajuan desa dan kesejahteraan masyarakat.
                        </p>
                    </div>
                    
                    <div>
                        <h5 class="font-semibold mb-4">Menu Cepat</h5>
                        <ul class="space-y-2">
                            <li><a href="#buku" class="text-green-100 hover:text-white transition duration-300">Koleksi Buku</a></li>
                            <li><a href="#galeri" class="text-green-100 hover:text-white transition duration-300">Galeri Kegiatan</a></li>
                            <li><a href="#kontak" class="text-green-100 hover:text-white transition duration-300">Kontak Kami</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h5 class="font-semibold mb-4">Ikuti Kami</h5>
                        <div class="flex space-x-4">
                            <a href="#" class="text-green-100 hover:text-white transition duration-300">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="text-green-100 hover:text-white transition duration-300">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-green-100 hover:text-white transition duration-300">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-green-500 mt-8 pt-8 text-center">
                    <p class="text-green-100">
                        &copy; {{ date('Y') }} Perpustakaan Desa. Semua hak cipta dilindungi.
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg hover:bg-green-700 transition duration-300 opacity-0 invisible z-40">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
    // Scroll to top functionality
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.remove('opacity-0', 'invisible');
            scrollToTopBtn.classList.add('opacity-100', 'visible');
        } else {
            scrollToTopBtn.classList.add('opacity-0', 'invisible');
            scrollToTopBtn.classList.remove('opacity-100', 'visible');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
</body>
</html>
