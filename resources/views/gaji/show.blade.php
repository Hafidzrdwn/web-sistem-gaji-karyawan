@extends('app', ['title' => 'Rincian Gaji Karyawan'])

@section('content')
<section class="mt-4">
  <a href="{{ route('gaji.index') }}" class="btn btn-sm btn-dark mb-3">&laquo; Kembali</a>
  <div class="row justify-content-center align-items-center mb-4">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header"><i class="fas fa-user me-2"></i>Data Diri Karyawan</div>
        <div class="card-body">
          <table class="table table-borderless">
            <tr>
              <th class="col-md-4">Nama Lengkap</th>
              <td><span class="me-3">:</span>{{ $karyawan->nama }}</td>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <td><span class="me-3">:</span>{{ $karyawan->jenis_kelamin->jk }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td><span class="me-3">:</span>{{ $karyawan->status }}</td>
            </tr>
            <tr>
              <th>Jabatan</th>
              <td><span class="me-3">:</span>{{ $karyawan->jabatan->jabatan }} / {{ $karyawan->jabatan->tingkat }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <table class="table table-borderless">
            <tr>
              <th class="col-md-5">Gaji Pokok / Bulan</th>
              <td><span class="me-3">:</span>@rupiah($karyawan->gaji_karyawan->gaji->gaji_pokok)</td>
            </tr>
            <tr>
              <th>Pelanggaran dilakukan</th>
              <td><span class="me-3">:</span><span class="text-danger">{{ $karyawan->pelanggaran_karyawan->count() }}</span></td>
            </tr>
            <tr>
              <th>Bonus diterima</th>
              <td><span class="me-3">:</span><span class="text-success">{{ $karyawan->bonus_karyawan->count() }}</span></td>
            </tr>
            <tr>
              <th>Tunjangan diterima</th>
              <td><span class="me-3">:</span><span class="text-primary">{{ $karyawan->tunjangan_karyawan->count() }}</span></td>
            </tr>
            <tr>
              <th>Total gaji bersih</th>
              <th><span class="me-3">:</span>@rupiah($karyawan->rincian_gaji->gaji_bersih->total)</th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center align-items-start gy-4">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-danger">
          <i class="fas fa-exclamation-triangle me-1"></i>
          Pelanggaran Karyawan
        </div>
        <div class="card-body">
          <table class="table table-responsive table-hover text-center">
            <thead>
              <tr>
                <th class="col-md-2">No.</th>
                <th>Jenis</th>
                <th>Potongan</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($karyawan->pelanggaran_karyawan as $pk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pk->pelanggaran->jenis }}</td>
                <td>@rupiah($pk->pelanggaran->potongan_gaji)</td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center">Tidak melakukan pelanggaran sama sekali.</td>
              </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2" class="text-center">Total</th>
                <td>
                  @if ($karyawan->pelanggaran_karyawan->count() > 0)
                  @rupiah($karyawan->rincian_gaji->total_nominal_potongan)
                  @else
                  -
                  @endif
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-success">
          <i class="fas fa-coins me-1"></i>
          Bonus Karyawan
        </div>
        <div class="card-body">
          <table class="table table-responsive table-hover text-center">
            <thead>
              <tr>
                <th class="col-md-2">No.</th>
                <th>Jenis</th>
                <th>Bonus</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($karyawan->bonus_karyawan as $bk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bk->bonus->jenis }}</td>
                <td>@rupiah($bk->bonus->bonus)</td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center">Tidak ada bonus.</td>
              </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2" class="text-center">Total</th>
                <td>
                  @if ($karyawan->bonus_karyawan->count() > 0)
                  @rupiah($karyawan->rincian_gaji->total_nominal_bonus)
                  @else
                  -
                  @endif
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-primary">
          <i class="fas fa-hand-holding-usd me-1"></i>
          Tunjangan Karyawan
        </div>
        <div class="card-body">
          <table class="table table-responsive table-hover text-center">
            <thead>
              <tr>
                <th class="col-md-2">No.</th>
                <th>Jenis</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($karyawan->tunjangan_karyawan as $tk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tk->tunjangan->jenis }}</td>
                <td>
                  @if(strtolower($tk->tunjangan->jenis) == 'tunjangan hari raya')
                  @rupiah($karyawan->gaji_karyawan->gaji->gaji_pokok * 0.25)
                  @else
                  @rupiah($tk->tunjangan->jumlah)
                  @endif
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center">Tidak ada tunjangan.</td>
              </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2" class="text-center">Total</th>
                <td>
                  @if ($karyawan->tunjangan_karyawan->count() > 0)
                  @rupiah($karyawan->rincian_gaji->total_nominal_tunjangan)
                  @else
                  -
                  @endif
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-money-bill-wave me-1"></i>
          Gaji Bersih
        </div>
        <div class="card-body">
          <table class="table table-responsive table-hover text-center">
            <tbody>
              <tr>
                <th>Gaji Pokok</th>
                <td>
                  @rupiah($karyawan->gaji_karyawan->gaji->gaji_pokok)
                </td>
              </tr>
              <tr>
                <th>Potongan</th>
                <td class="text-danger">
                  -
                  @rupiah($karyawan->rincian_gaji->total_nominal_potongan)
                </td>
              </tr>
              <tr>
                <th>Bonus</th>
                <td class="text-success">
                  +
                  @rupiah($karyawan->rincian_gaji->total_nominal_bonus)
                </td>
              </tr>
              <tr class="border-bottom border-dark">
                <th>Tunjangan</th>
                <td class="text-success">
                  +
                  @rupiah($karyawan->rincian_gaji->total_nominal_tunjangan)
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr class="border border-dark">
                <th>Total Gaji Bersih :</th>
                <th>
                  @rupiah($karyawan->rincian_gaji->gaji_bersih->total)
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
