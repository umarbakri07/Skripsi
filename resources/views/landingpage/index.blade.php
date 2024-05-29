@extends('landingpage.partials.main')
@section('title', 'Home')
@section('landingpage')
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/7.jpeg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn"> Selamat Datang di <strong
                                            class="text-dark">Suralaga Grape</strong></p>
                                    <h2 class="display-6">Belajar Sambil Merasakan Kelezatan
                                        Anggur</h2>
                                    <a href="/scan" class="btn btn-dark rounded-pill py-3 px-5 animated zoomIn mt-3">Scan
                                        QR Code</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="img/bibit.jpg"
                                alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="img/anggur h.jpg"
                                alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s"
                                src="img/Fresh Grapes 1.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s"
                                src="img/red grape juice.jpeg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Berita terkini</p>
                        <h1 class="display-6">Artikel-artikel tentang anggur saat ini</h1>
                    </div>

                    @foreach ($artikels as $index => $artikel)
                        <div class="row g-3 mb-4 link-text">
                            @if ($index % 2 == 0)
                                <div class="col-sm-4">
                                    <a href="/galeriartikel/{{ $artikel->id }}">
                                        <img class="img-fluid bg-white w-100" src="{{ asset('foto/' . $artikel->foto) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <a href="/galeriartikel/{{ $artikel->id }}">
                                        <h5>{{ $artikel->artikel_anggur }}</h5>
                                    </a>
                                    <a href="/galeriartikel/{{ $artikel->id }}">
                                        <p class="mb-0">{!! substr($artikel->keterangan, 0, 220) !!}....</p>
                                    </a>
                                </div>
                            @else
                                <div class="col-sm-8">
                                    <a href="/galeriartikel/{{ $artikel->id }}">
                                        <h5>{{ $artikel->artikel_anggur }}</h5>
                                    </a>
                                    <a href="/galeriartikel/{{ $artikel->id }}">
                                        <p class="mb-0">{!! substr($artikel->keterangan, 0, 220) !!}....</p>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="/galeriartikel/{{ $artikel->id }}">
                                        <img class="img-fluid bg-white w-100" src="{{ asset('foto/' . $artikel->foto) }}"
                                            alt="">
                                    </a>
                                </div>
                            @endif
                            <div class="border-top mb-4"></div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div id="galeri" class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Postingan Terbaru</p>
                <h1 class="display-6">Postingan galeri anggur terbaru di Suralaga Grape!</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                @foreach ($bibits as $bibit)
                    <a href="/galeri/{{ $bibit->id }}" class="d-block product-item rounded">
                        <img src="{{ asset('gambar/' . $bibit->gambar) }}">
                        <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                            <h4 class="text-primary">{{ $bibit->nama_anggur }}</h4>
                            <span class="text-body">{{ $bibit->nama_latin }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div id="map" style="width: 100%; height: 400px;"></div>
    @push('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));

                // Attach a click event listener to the play button
                var playButton = document.querySelector('.btn-play');
                playButton.addEventListener('click', function() {
                    var videoSrc = playButton.getAttribute('data-src');
                    var videoFrame = document.getElementById('videoFrame');
                    videoFrame.src = videoSrc;

                    // Show the modal
                    videoModal.show();
                });

                // When the modal is closed, stop the video playback
                videoModal._element.addEventListener('hidden.bs.modal', function() {
                    var videoFrame = document.getElementById('videoFrame');
                    videoFrame.src = '';
                });
            });
        </script>
        <script type="text/javascript">
            function showMap(lat, lng) {
                const myLatLng = {
                    lat: lat,
                    lng: lng
                };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 17,
                    center: myLatLng,
                });

                new google.maps.Marker({
                    position: myLatLng,
                    map,
                    title: "Hello Rajkot!",
                });
            }
            window.onload = function() {
                showMap(-8.59315336549054, 116.52094498682233);
            };
        </script>
        <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key={{ env('AIzaSyBDTjI0dHt4fJAVVFIfJZ9_-2l07SVKrf0') }}&libraries">
        </script>
    @endpush
@endsection
