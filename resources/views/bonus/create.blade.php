@extends('app', ['title' => 'Tambah Bonus Baru'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card p-3">
        <div class="card-body">
          <form action="{{ route('bonus.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis Bonus</label>
              <input type="text" class="form-control" id="jenis" name="jenis">
            </div>
            <div class="mb-3">
              <label for="bonus" class="form-label">Jumlah Tambahan Gaji</label>
              <input type="number" class="form-control" min="0" id="bonus" name="bonus">
            </div>
            <div class="d-flex gap-3">
              <a href="{{ route('bonus.index') }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-success w-50">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
