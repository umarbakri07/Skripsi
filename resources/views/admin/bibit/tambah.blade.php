@extends('admin.partials.main')
@section('title', 'Admin/TambahBibit')
@section('content_admin')
    <div class="container-fluid pt-4 px-4">
        <form action="/bibit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-12">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="nama_anggur"><span class="required">Nama Anggur</span></label>
                            <input type="text" class="form-control" id="nama_anggur" placeholder="Nama Anggur"
                                name="nama_anggur" value="{{ old('nama_anggur') }}">
                            @error('nama_anggur')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="nama_latin"><span class="required">Nama Latin</span></label>
                            <input type="text" class="form-control" id="nama_latin" placeholder="Nama Latin"
                                name="nama_latin" value="{{ old('nama_latin') }}">
                            @error('nama_latin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="karakteristik"><span class="required">Karakteristik</span></label>
                            <input type="text" class="form-control" id="karakteristik" placeholder="Karakteristik"
                                name="karakteristik" value="{{ old('karakteristik') }}">
                            @error('karakteristik')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="waktu_berbuah"><span class="required">Waktu Berbuah</span></label>
                            <input type="text" class="form-control" id="waktu_berbuah" placeholder="Waktu Berbuah"
                                name="waktu_berbuah" value="{{ old('waktu_berbuah') }}">
                            @error('waktu_berbuah')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="asal"><span class="required">Asal</span></label>
                            <input type="text" class="form-control" id="asal" placeholder="Asal" name="asal"
                                value="{{ old('asal') }}">
                            @error('asal')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga"><span class="required">Harga</span></label>
                            <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga"
                                value="{{ old('harga') }}">
                            @error('harga')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar"><span class="required">Gambar</span></label>
                        <input type="file" class="form-control" id="gambar" placeholder="Gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <label for="keterangan"><span class="required">Keterangan</span></label>
                        <textarea class="form-control form-border summernote" id="summernote" name="keterangan">{{ old('keterangan') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="m-n2">
                            <a href="/bibit" type="button" class="btn btn-danger m-2">Kembali</a>
                            <button type="submit" class="btn btn-success m-2">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('script')
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $('#summernote').summernote({
                placeholder: 'Isi Keterangan Disini...',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onMediaDelete: function($target) {
                        // Jika elemen media dihapus, lakukan sesuatu di sini (opsional)
                    },
                    onInit: function() {
                        // Mengatur kelas pada video yang disisipkan
                        $('.note-video-clip').addClass('note-video-responsive');
                        $('.note-image img').addClass('note-image-responsive');
                    }
                }
            });
        </script>
    @endpush
@endsection
