@extends('app', ['title' => 'Master Pelanggaran'])

@section('content')
<section class="mt-5">
  <div class="row justify-content-end align-items-center">
    @if ($msg = Session::get('success'))
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! $msg !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    @endif
    <div class="col-md-6 text-end">
      <a href="{{ route('pelanggaran.create') }}" class="btn btn-success mb-3">Tambah pelanggaran <i class="ms-1 fas fa-plus-circle"></i></a>
    </div>
  </div>
  <table class="table table-responsive table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Jenis</th>
        <th>Potongan Gaji</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pelanggaran as $p)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->jenis }}</td>
        <td @if ($p->potongan_gaji >= 10000000)
          class="text-danger"
          @endif
          >@rupiah($p->potongan_gaji)</td>
        <td>
          <a href="{{ route('pelanggaran.edit', $p->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
          <form action="{{ route('pelanggaran.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapusnya?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="text-center">Tidak ada data pelanggaran.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</section>
@endsection
