@extends('admin.partials.main')
@section('title', 'Admin/TambahBibit')
@section('content_admin')
    <div class="container-fluid pt-4 px-4">
        <form action="/artikel" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-12">
                <div class="row bg-light">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="artikel_anggur"><span class="required">Artikel Anggur</span></label>
                            <input type="text" class="form-control" id="artikel_anggur" placeholder="Artikel Anggur"
                                name="artikel_anggur" value="{{ old('artikel_anggur') }}">
                            @error('artikel_anggur')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row bg-light">
                    <div class="form-group">
                        <label for="foto"><span class="required">Foto</span></label>
                        <input type="file" class="form-control" id="foto" placeholder="Foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="keterangan"><span class="required">Keterangan</span></label>
                        <textarea class="form-control form-border summernote" id="summernote" name="keterangan">{{ old('keterangan') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="m-n2">
                            <a href="/artikel" type="button" class="btn btn-danger m-2">Kembali</a>
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
