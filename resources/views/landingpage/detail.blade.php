@extends('landingpage.partials.main')
@section('title', 'Detail')
@section('landingpage')
    @push('css')
        <style>
            .note-video-clip {
                width: auto;
                height: auto;
                max-height: 100%;
                margin: 0 auto;
                /* Menengahkan video secara horizontal */
                display: block;
                /* Mengatur tipe tampilan menjadi block agar margin auto berfungsi */
            }

            @media (max-width: 768px) {
                .note-video-clip {
                    width: auto;
                    height: auto;
                    max-height: auto;
                }
            }



            .note-image img {
                max-width: 100%;
                height: auto;
                margin: 0 auto;
                /* Menengahkan video secara horizontal */
                display: block;
            }

            @media (max-width: 768px) {
                .note-image img {
                    max-width: 100%;
                    height: auto;
                }
            }
        </style>
    @endpush
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 col-md-12 wow fadeIn" data-wow-delay="0.0s">
                    <img class="img-fluid" src="{{ asset('gambar/' . $bibit->gambar) }}" alt="">
                </div>
                <div class="col-lg-6 col-md-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary"> {{ $bibit->nama_latin }}</p>
                        <h1 class="display-6">{{ $bibit->nama_anggur }}</h1>

                    </div>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    Karakter:
                                </div>
                                <span class="text-dark">{{ $bibit->karakteristik }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    Berbuah:
                                </div>
                                <span class="text-dark">{{ $bibit->waktu_berbuah }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    Asal:
                                </div>
                                <span class="text-dark">{{ $bibit->asal }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    Harga:
                                </div>
                                <span class="text-dark">Rp. {{ $bibit->harga }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="note-image note-video-clip">
                        {!! $bibit->keterangan !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
