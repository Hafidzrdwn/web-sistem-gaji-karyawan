@extends('app', ['title' => 'Master Jabatan'])

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
      <a href="{{ route('jabatan.create') }}" class="btn btn-success mb-3">Tambah jabatan <i class="ms-1 fas fa-plus-circle"></i></a>
    </div>
  </div>
  <table class="table table-responsive table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Jabatan</th>
        <th>Tingkat</th>
        <th>Gaji Pokok</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($jabatan as $key => $j)
      <tr>
        <td>{{ $jabatan->firstItem() + $key }}</td>
        <td>{{ $j->jabatan }}</td>
        <td>{{ $j->tingkat }}</td>
        <td>@rupiah($j->gaji->gaji_pokok)</td>
        <td>
          <a href="{{ route('jabatan.edit', $j->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
          <form action="{{ route('jabatan.destroy', $j->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus {{ $j->jabatan }}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">Tidak ada data jabatan.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  {{ $jabatan->links() }}
</section>
@endsection
