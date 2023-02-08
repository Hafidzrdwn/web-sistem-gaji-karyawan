@extends('app', ['title' => 'Master Karyawan'])

@section('content')
<section class="mt-5">
  <div class="row justify-content-end align-items-center">
    @if ($msg = Session::get('success'))
    <div class="col-md-8">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! $msg !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    @endif
    <div class="col-md-4 text-end">
      <a href="{{ route('karyawan.create') }}" class="btn btn-success mb-3">Tambah karyawan <i class="ms-1 fas fa-user-plus"></i></a>
    </div>
  </div>
  <table class="table table-responsive table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Usia</th>
        <th>Jabatan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($karyawan as $key => $k)
      <tr>
        <td>{{ $karyawan->firstItem() + $key }}</td>
        <td>{{ $k->nama }}</td>
        <td>{{ $k->email }}</td>
        <td>{{ $k->jenis_kelamin->jk }}</td>
        <td>{{ $k->usia }} Tahun</td>
        <td>{{ $k->jabatan->jabatan }}</td>
        <td>
          <a href="{{ route('karyawan.show', $k->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-address-card"></i></a>
          <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
          <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus karyawan bernama {{ $k->nama }}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i></button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="text-center">Tidak ada data karyawan.</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  <div class="row mt-5 mb-3 justify-content-center">
    <div class="col-md-8">
      <table class="table table-responsive table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th class="col-md-4">Nama</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($karyawan as $key => $k)
          <tr>
            <td>{{ $karyawan->firstItem() + $key }}</td>
            <td>{{ $k->nama }}</td>
            <td>
              <a href="{{ route('karyawan.pelanggaran', $k->id) }}" class="btn btn-sm btn-danger">Catat pelanggaran</a>
              <a href="{{ route('karyawan.bonus', $k->id) }}" class="btn btn-sm btn-success mx-1">Berikan bonus</a>
              <a href="{{ route('karyawan.tunjangan', $k->id) }}" class="btn btn-sm btn-primary">Berikan tunjangan</a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center">Tidak ada data karyawan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{ $karyawan->links()  }}
</section>
@endsection
