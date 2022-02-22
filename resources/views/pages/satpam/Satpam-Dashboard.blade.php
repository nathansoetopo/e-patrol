@extends('components.satpam.template')

@section('title', 'Dashboard Satpam')
    


@section('main-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
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
                        <img src="{{ asset('images/scanner2.png') }}" style="border-radius: 10px; width: 100%; height: 150%; background-color: white;" />
                        <div>
                          <p class="row justify-content-center"><b>Scan QRcode</b></p>
                        </div>
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
                        <img src="{{ asset('/images/note2.png') }}" style="border-radius: 10px; width: 100%; height: 150%; background-color: white;" />
                        <div>
                          <p class="row justify-content-center"><b>Presensi</b></p>
                        </div>
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
       
  
 @endsection
