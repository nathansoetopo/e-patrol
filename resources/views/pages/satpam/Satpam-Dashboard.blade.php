@extends('components.satpam.template')

@section('title', 'Dashboard Satpam')
    


@section('main-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ $error }}
            </div>
        </div>
        @endforeach
        @endif
        @if (session('status'))
        <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('status') }}
            </div>
        </div>
        @endif
          <div class="section-header">
            <h1>PT. Rusyida Mitra Perkasa</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-md-0">
              <div style="background-color: #E5E5E5;" class="card">
                <div class="card-body">
                  <div class="row justify-content-center pb-3">
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div style="border-radius: 10px; width: 100%; height: 43%;" class="">
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <!--Diperbaiki Micel-->
                        <button id='detectDevice' type="button" class="btn btn" onclick='scan()'>
                          <img src="{{ asset('images/scanner2.png') }}" style="border-radius: 10px; width: 100%; height: 150%; background-color: white;" />
                          Scan Barcode
                        </button>
                        <!--<img src="{{ asset('images/scanner2.png') }}" style="border-radius: 10px; width: 100%; height: 150%; background-color: white;" />
                        <div>
                          <p class="row justify-content-center"><b>Scan QRcode</b></p>
                        </div>-->
                        <!-- <div class="avatar-item mb-0">
                          <img alt="image" src="../assets/img/avatar/avatar-5.png" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
                          <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div style="border-radius: 10px; width: 100%; height: 43%;" class="">
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <button id='detectDevice' type="button" class="btn btn" onclick='presensi()'>
                          <img src="{{ asset('images/note2.png') }}" style="border-radius: 10px; width: 100%; height: 150%; background-color: white;" />
                          Presensi
                        </button>
                        
                        <!-- <div class="avatar-item mb-0">
                          <img alt="image" src="../assets/img/avatar/avatar-5.png" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
                          <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div style="background-color: #E5E5E5;" class="card">
                <div class="card-header">
                  <h4>Statistics</h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <a href="#" class="btn btn-primary">Week</a>
                      <a href="#" class="btn">Month</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                  <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                      <div class="detail-value">2</div>
                      <div class="detail-name">Absensi Hari ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                      <div class="detail-value">7</div>
                      <div class="detail-name">Absensi Minggu ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                      <div class="detail-value">50</div>
                      <div class="detail-name">Absensi Bulan ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                      <div class="detail-value">300</div>
                      <div class="detail-name">Absensi Tahun ini</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        </div>
        <script src="{{ asset('js/detect.min.js') }}"></script>
       <script>
         function scan()
          {
            const ua = detect.parse(navigator.userAgent)
            if(ua.os.family === "iOS"){
              window.location = 'https://javascript.plainenglish.io/how-to-detect-a-mobile-device-with-javascript-1c26e0002b31';
            }else{
              //console.log(ua.os.family);
              window.location = '{{ url('satpam/scan')}}';
            }
            
          }
         function presensi()
          {
          
              window.location = '{{ url('satpam/laporan')}}';
            
            
          }
       </script>
           <script>
            var ctx = document.getElementById('myChart').getContext('2d');
           var myChart = new Chart(ctx, {
               type: 'line',
               data: {
                 labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                 datasets: [{ 
                     data: [86,114,106,106,107,111,133],
                     label: "Total",
                     borderColor: "#3e95cd",
                     backgroundColor: "#7bb6dd",
                   }, { 
                     data: [70,90,44,60,83,90,100],
                     label: "Accepted",
                     borderColor: "#3cba9f",
                     backgroundColor: "#71d1bd",
                   }, { 
                     data: [10,21,60,44,17,21,17],
                     label: "Pending",
                     borderColor: "#ffa500",
                     backgroundColor:"#ffc04d",
                   }, { 
                     data: [6,3,2,2,7,0,16],
                     label: "Rejected",
                     borderColor: "#c45850",
                     backgroundColor:"#d78f89",
                   }
                 ]
               },
             });
        </script>
 @endsection
