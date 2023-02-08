@extends('app', ['title' => 'Detail Karyawan'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card p-4 pt-3">
        <div class="card-body">
          <h4 class="text-center mb-5">Data Lengkap ({{ $karyawan->nama }})</h4>
          <div class="row">
            <div class="col-md-6">
              <table class="table table-borderless">
                <tr>
                  <th>Nama Lengkap</th>
                  <td><span class="me-3">:</span>{{ $karyawan->nama }}</td>
                </tr>
                <tr>
                  <th>Alamat Email</th>
                  <td><span class="me-3">:</span>{{ $karyawan->email }}</td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td><span class="me-3">:</span>{{ $karyawan->jenis_kelamin->jk }}</td>
                </tr>
                <tr>
                  <th>No Telepon</th>
                  <td><span class="me-3">:</span>{{ $karyawan->no_telp }}</td>
                </tr>
                <tr>
                  <th>No Rekening</th>
                  <td><span class="me-3">:</span>{{ $karyawan->no_rek }}</td>
                </tr>
              </table>
              <a href="{{ route('karyawan.index') }}" class="btn btn-dark btn-sm mt-2">&laquo; Kembali</a>
            </div>
            <div class="col-md-6">
              <table class="table table-borderless">
                <tr>
                  <th>Alamat</th>
                  <td><span class="me-3">:</span>{{ $karyawan->alamat }}</td>
                </tr>
                <tr>
                  <th>Usia</th>
                  <td><span class="me-3">:</span>{{ $karyawan->usia }} Tahun</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td><span class="me-3">:</span>{{ $karyawan->status }}</td>
                </tr>
                <tr>
                  <th>Jabatan</th>
                  <td><span class="me-3">:</span>{{ $karyawan->jabatan->jabatan . " / " . $karyawan->jabatan->tingkat }}</td>
                </tr>
                <tr>
                  <th>Gaji Pokok / Bulan</th>
                  <td><span class="me-3">:</span>@rupiah($karyawan->jabatan->gaji->gaji_pokok)</td>
                </tr>
              </table>
              <a href="" class="btn btn-primary btn-sm mt-2"><i class="fas fa-money-bill-wave me-2"></i>Lihat detail gaji</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
