@extends('admin.partials.main')
@section('title', 'Admin/EditBibit')
@section('content_admin')
    <div class="container-fluid pt-4 px-4">
        <form action="/bibit/{{ $bibit->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-12">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="nama_anggur">Nama Anggur</label>
                            <input type="text" class="form-control" id="nama_anggur" placeholder="Nama Bibit"
                                name="nama_anggur" value="{{ $bibit->nama_anggur }}">
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="nama_latin">Nama Latin</label>
                            <input type="text" class="form-control" id="nama_latin" placeholder="Nama Latin"
                                name="nama_latin" value="{{ $bibit->nama_latin }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="karakteristik">Karakteristik</label>
                            <input type="text" class="form-control" id="karakteristik" placeholder="Karakteristik"
                                name="karakteristik" value="{{ $bibit->karakteristik }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="waktu_berbuah">Waktu Berbuah</label>
                            <input type="text" class="form-control" id="waktu_berbuah" placeholder="Waktu Berbuah"
                                name="waktu_berbuah" value="{{ $bibit->waktu_berbuah }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="asal">Asal</label>
                            <input type="text" class="form-control" id="asal" placeholder="Asal" name="asal"
                                value="{{ $bibit->asal }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" placeholder="Harga per Kg"
                                name="harga" value="{{ $bibit->harga }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            @if ($bibit->gambar)
                                <img src="{{ asset('gambar/' . $bibit->gambar) }}" alt="Current Image" width="100">
                            @else
                                <p>No image uploaded</p>
                            @endif
                        </div>
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" placeholder="Gambar" name="gambar">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="summernote" name="keterangan">{{ $bibit->keterangan }} </textarea>
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
