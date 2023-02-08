@extends('app', ['title' => 'Rincian Gaji Karyawan'])

@section('content')
<section class="mt-5">
  <table class="table table-responsive table-hovered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Karyawan</th>
        <th>Jabatan</th>
        <th>Gaji Pokok</th>
        <th>Gaji Bersih</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($karyawan as $k)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $k->nama }}</td>
        <td>{{ $k->jabatan->jabatan }}</td>
        <td>@rupiah($k->gaji_karyawan->gaji->gaji_pokok)</td>
        <td>@rupiah($k->rincian_gaji->gaji_bersih->total)</td>
        <td>
          <a href="{{ route('gaji.show', $k->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-info-circle"></i></a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="9" class="text-center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</section>
@endsection
