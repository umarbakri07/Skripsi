@extends('landingpage.partials.main')
@section('title', 'Detail')
@section('landingpage')
    @push('css')
        <style>
            .note-video-clip {
                max-width: 100%;
                height: auto;
            }

            @media (max-width: 768px) {
                .note-video-clip {
                    max-width: 100%;
                    height: auto;
                }
            }

            .note-image img {
                max-width: 100%;
                height: auto;
                display: block;
                margin: 0 auto;
                /* Mengatur margin agar gambar berada di tengah */
            }

            @media (max-width: 768px) {
                .note-image img {
                    max-width: 100%;
                    height: auto;
                    display: block;
                    margin: 0 auto;
                    /* Mengatur margin agar gambar berada di tengah */
                }
            }
        </style>
    @endpush
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 col-md-12 wow fadeIn" data-wow-delay="0.0s">
                    <img class="img-fluid" src="{{ asset('foto/' . $artikel->foto) }}" alt="">
                </div>
                <div class="col-lg-6 col-md-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <div class="section-title">
                            <h1 class="display-6">{{ $artikel->artikel_anggur }}</h1>
                        </div>
                        <div class="note-image note-video-clip  mb-4">
                            {!! $artikel->keterangan !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
