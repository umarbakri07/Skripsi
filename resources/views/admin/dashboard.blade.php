 @extends('admin.partials.main')
 @section('title', 'Admin/Dashboard')
 @section('content_admin')
     <!-- Sales Chart Start -->
     <div class="container-fluid pt-4 px-4">
         <div class="row g-4">
             <!-- Baris Pertama -->
             <div class="col-sm-12 col-xl-6">
                 <div class="bg-light text-center rounded p-4 col-12">
                     <div class="d-flex align-items-center justify-content-between mb-4">
                         <h2 class="mb-0">SUHU</h2>
                     </div>
                     <div class="d-flex">
                         <div class="bg-light rounded h-100 p-4 flex-grow-1">
                             <img class="" src="/loginassets/img/thermometer.png" alt=""
                                 style="width: 100px; height: 100px;">
                         </div>
                         <div class="bg-light rounded h-100 p-4 flex-grow-1 mr-3">
                             <h1 class="display-1"><span id="suhu">--</span><span
                                     style="font-size: 24px; vertical-align: top;">°C</span></h1>
                             <h6 class="mt-2">Suhu Normal : 25°C-31°C</h6>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-sm-12 col-xl-6">
                 <div class="bg-light text-center rounded p-4 col-12">
                     <div class="d-flex align-items-center justify-content-between mb-4">
                         <h2 class="mb-0">KELEMBABAN UDARA</h2>
                     </div>
                     <div class="d-flex">
                         <div class="bg-light rounded h-100 p-4 flex-grow-1">
                             <img class="" src="/loginassets/img/humidity.png" alt=""
                                 style="width: 100px; height: 100px;">
                         </div>
                         <div class="bg-light rounded h-100 p-4 flex-grow-1 mr-3">
                             <h1 class="display-1"><span id="kelembaban">--</span><span
                                     style="font-size: 24px; vertical-align: top;">%</span></h1>
                             <h6 class="mt-2">Kelembaban Udara Normal : 75%-80%</h6>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Baris Kedua -->
             <div class="col-sm-12 col-xl-12">
                 <div class="bg-light text-center rounded p-4 col-12">
                     <div class="d-flex align-items-center justify-content-between mb-4">
                         <h2 class="mb-0">Kelembaban Tanah</h2>
                     </div>
                     <div class="d-flex">
                         <div class="bg-light rounded h-100 p-4 flex-grow-1">
                             <img class="" src="/loginassets/img/soil-moisture-sensor.png" alt=""
                                 style="width: 100px; height: 100px;">
                         </div>
                         <div class="bg-light rounded h-100 p-4 flex-grow-1 mr-3">
                             <h1 class="display-1"><span id="tanah">--</span><span
                                     style="font-size: 24px; vertical-align: top;">%</span></h1>
                             <h6 class="mt-2">Kelembaban Tanah Normal : 50%-70%</h6>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     @push('scripts')
         <script type="text/javascript" src="{{ 'jquery/jquery.min.js' }}"></script>
         <script type="text/javascript">
             $(document).ready(function() {
                 setInterval(function() {
                     $("#suhu").load("{{ url('bacasuhu') }}");
                     $("#kelembaban").load("{{ url('bacakelembaban') }}");
                     $("#tanah").load("{{ url('bacatanah') }}");
                 }, 1000);
             });
         </script>
     @endpush
     <!-- Sales Chart End -->
 @endsection
