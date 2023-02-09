@extends('app', ['title' => 'Master Jenis Kelamin'])

@section('content')
<section class="mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <table class="table table-responsive table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Jenis Kelamin</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jenis_kelamin as $jk)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jk->jk }}</td>
            <td>
              <a href="{{ route('jenis_kelamin.edit', $jk->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
              <form action="{{ route('jenis_kelamin.destroy', $jk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis kelamin {{ $jk->jk }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h5 class="text-center mb-4">Tambah Jenis Kelamin Baru</h5>
          @if ($msg = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! $msg !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <form action="{{ route('jenis_kelamin.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="jk" class="form-label">Jenis Kelamin</label>
              <input type="text" name="jk" id="jk" class="form-control">
            </div>
            <button type="submit" class="btn btn-success w-100">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
