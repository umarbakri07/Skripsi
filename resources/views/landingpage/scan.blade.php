@extends('landingpage.partials.main')
@section('title', 'Scan')
@section('landingpage')
    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <style>
                    .camera-container {
                        border: 2px solid #ddd;
                        border-radius: 5px;
                        padding: 20px;
                        margin-bottom: 30px;
                        position: relative;
                    }

                    .camera-title {
                        margin-bottom: 10px;
                    }

                    .camera-buttons {
                        position: absolute;
                        bottom: 10px;
                        left: 50%;
                        transform: translateX(-50%);
                    }

                    .result-container {
                        margin-top: 20px;
                        padding: 10px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                    }
                </style>

                <div class="display-6" mt-4>
                    <h2>
                        <p>Pindai QR Code</p>
                    </h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <div class="camera-container">
                            <div id="reader" width="600px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
            <script>
                function onScanSuccess(decodedText, decodedResult) {
                    // handle the scanned code as you like, for example:
                    if (onScanSuccess) {
                        window.location.href = '' + (
                            decodedText);
                    }

                    console.log(`Code matched = ${decodedText}`, decodedResult);



                }

                function onScanFailure(error) {
                    // handle scan failure, usually better to ignore and keep scanning.
                    // for example:
                    console.warn(`Code scan error = ${error}`);
                }

                let html5QrcodeScanner = new Html5QrcodeScanner(
                    "reader", {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        }
                    },
                    /* verbose= */
                    false);
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
            </script>
        </div>
    </div>
    </div>
    <!-- Products End -->
@endsection
