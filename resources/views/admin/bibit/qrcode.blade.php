@extends('admin.partials.main')
@section('title', 'Admin/QRGenerate')
@section('content_admin')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <h4 class="mb-3">QRCode dari {{ $bibit->nama_anggur }}</h4>
                    <div class="visible-print text-center">
                        {!! QrCode::size(175)->generate(url('/galeri' . '/' . $bibit->id)) !!}
                    </div>
                    <h6 class="mt-3 mb-3">{{ url('/galeri' . '/' . $bibit->id) }}</h6>
                    <div class="text-center mt-3">
                        {{-- <button class="btn btn-primary btn-sm" onclick="generateQRCode()">Generate</button> --}}
                        <a onclick="downloadQR('{{ url('/galeri' . '/' . $bibit->id) }}','{{ $bibit->id }}')"
                            type="button" class="btn btn-warning m-2 fs-5 fw-bold" style="color: black"><i
                                class="fa fa-download"> Download</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="qrCodeContainer" style="background-color: white; padding: 10px; display: none;"></div>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        function downloadQR(qrCode, id) {
            var url = qrCode; // Replace this with the URL you want to encode in the QR code
            var qrCode = new QRCode(document.getElementById('qrCodeContainer'), {
                text: url,
                width: 500,
                height: 500,
            });

            var qrCodeImage = qrCode._el.children[0].toDataURL('image/jpeg', 1.0);

            var downloadLink = document.createElement('a');
            downloadLink.href = qrCodeImage;
            downloadLink.download = 'qr-code-bibit-' + id + '.jpg';
            downloadLink.click();
        }
    </script>
@endsection
