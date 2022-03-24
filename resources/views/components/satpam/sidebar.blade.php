<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">RUSYIDA MITRA PERKASA</a>
        <img src="../images/logo.jpeg" class="block text pl-5 pr-5" style="height: 5em" />
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">RMS</a>
      </div>

      <!--SIDEBAR-->
      <ul class="sidebar-menu">
        <li class="menu-header">&nbsp;</li>
          <li class="menu-header">&nbsp;</li>
          <li><a class="nav-link" href="{{ url('/satpam') }}"><i class="fas fa-columns"></i> <span class="ml-3">Dashboard</span></a></li>
          <li><a class="nav-link" href="{{ url('/satpam/profile') }}"><i class="fas fa-user"></i> <span class="ml-3">Profile</span></a></li>
          <li><a class="nav-link" href="{{ url('/satpam/scan') }}"><i class="fas fa-qrcode"></i> <span class="ml-3">Scan Barcode</span></a></li>
          <li><a class="nav-link" href="{{ url('satpam/laporan') }}"><i class="fas fa-book-open"></i> <span class="ml-3">Presensi Piket</span></a></li>
          {{-- <li><a class="nav-link" href=""><i class="fas fa-chart-line"></i> <span class="ml-3">Statistik</span></a></li> --}}
          <li><a class="nav-link" href="{{ url('/satpam/logout') }}"><i class="fas fa-sign-out-alt"></i> <span class="ml-3">Keluar</span></a></li>
        </ul>
    </aside>
  </div>