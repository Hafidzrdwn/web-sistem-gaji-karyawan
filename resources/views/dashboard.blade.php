@extends('app', ['title' => 'Dashboard'])

@section('content')
<section class="mt-5">
  <h4><i class="fas fa-user-friends me-2"></i>Anggota Kelompok 1</h4>
  <div class="row mt-2 mb-4 align-items-start justify-content-center gy-3">
    <div class="col-md-6">
      <div class="card">
        <ul class="list-group list-group-flush">
          @foreach ($kelompoks as $key => $anggota)
          @if($key == 6)
          @break;
          @endif
          <li class="list-group-item">{{ $anggota['nama'] }} - XII RPL 1 - {{ $anggota['absen'] }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <ul class="list-group list-group-flush">
          @foreach ($kelompoks as $key => $anggota)
          @if($key > 5) <li class="list-group-item">{{ $anggota['nama'] }} - XII RPL 1 - {{ $anggota['absen'] }}</li>
          @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <h4><i class="fas fa-table me-2"></i>Rincian Data</h4>
  <div class="row mt-3 mb-5 align-items-center justify-content-center gy-3">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <h2 class="fw-bold">{{ $jabatan }}</h2>
          <h5>Jumlah Jabatan</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <h2 class="fw-bold">{{ $karyawan }}</h2>
          <h5>Jumlah Karyawan</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <h2 class="fw-bold">{{ $pelanggaran }}</h2>
          <h5>Jenis Pelanggaran</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <h2 class="fw-bold">{{ $bonus }}</h2>
          <h5>Jenis Bonus</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <h2 class="fw-bold">{{ $tunjangan }}</h2>
          <h5>Jenis Tunjangan</h5>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
