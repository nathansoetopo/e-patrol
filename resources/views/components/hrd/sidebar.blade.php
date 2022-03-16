
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">RUSYIDA MITRA PERKASA</a>
        <img src="{{ asset('images/logo.jpeg')}}" class="block text pl-5 pr-5" style="height: 5em" />
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">RMS</a>
      </div>
  
      <!--SIDEBAR-->
      <ul class="sidebar-menu">
        <li class="menu-header">&nbsp;</li>
        <li class="menu-header">&nbsp;</li>
        <li><a class="nav-link" href="{{ url('/hrd') }}"><i class="fas fa-columns"></i> <span class="ml-3">Dashboard</span></a></li>
        <li><a class="nav-link" href="{{ url('/hrd/profile') }}"><i class="fas fa-user"></i> <span class="ml-3">Profile</span></a></li>
        <li><a class="nav-link" href="{{ url('/hrd/data-shift') }}"><i class="fas fa-recycle"></i> <span class="ml-3">Data Shift</span></a></li>
        <li><a class="nav-link" href="{{ url('/hrd/data-satpam') }}"><i class="fas fa-user-shield"></i> <span class="ml-3">Data Satpam</span></a></li>
        <li><a class="nav-link" href="{{ url('/hrd/data-lokasi') }}"><i class="fas fa-map-marked-alt"></i> <span class="ml-3">Data Lokasi</span></a></li>
        <li><a class="nav-link" href="{{ url('/hrd/logout') }}"><i class="fas fa-sign-out-alt"></i> <span class="ml-3">Keluar</span></a></li>
      </ul>
    </aside>
  </div>