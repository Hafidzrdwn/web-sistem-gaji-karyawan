  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-4">
    <div class="position-sticky sidebar-sticky">
      <ul class="nav flex-column">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 @if(Request::is('/')) text-dark fw-bold @else text-muted @endif text-uppercase">
          <span>Home</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('/')) active @endif" aria-current="page" href="{{ route('dashboard') }}">
            <i class="fas fa-th-large me-1"></i>
            Dashboard
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted text-uppercase @if(Request::is('master*')) text-dark fw-bold @else text-muted @endif">
          <span>Data Master</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('master/jenis_kelamin*')) active @endif" href="{{ route("jenis_kelamin.index") }}">
            <i class="fas fa-venus-mars me-1"></i>
            Master Jenis Kelamin
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('master/jabatan*')) active @endif" href="{{ route("jabatan.index") }}">
            <i class="fas fa-user-tie me-1"></i>
            Master Jabatan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('master/karyawan*')) active @endif" href="{{ route('karyawan.index') }}">
            <i class="fas fa-users me-1"></i>
            Master Karyawan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('master/pelanggaran*')) active @endif" href="{{ route('pelanggaran.index') }}">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Master Pelanggaran
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('master/bonus*')) active @endif" href="{{ route('bonus.index') }}">
            <i class="fas fa-coins me-2"></i>
            Master Bonus
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('master/tunjangan*')) active @endif" href="{{ route('tunjangan.index') }}">
            <i class="fas fa-hand-holding-usd me-2"></i>
            Master Tunjangan
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase @if(Request::is('gaji*')) text-dark fw-bold @else text-muted @endif">
        <span>Report</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link @if(Request::is('gaji*')) active @endif" href="{{ route('gaji.index') }}">
            <i class="fas fa-money-bill-wave me-2"></i>
            Gaji Karyawan
          </a>
        </li>
      </ul>
    </div>
  </nav>
