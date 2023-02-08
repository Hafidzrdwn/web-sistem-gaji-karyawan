@extends('app', ['title' => 'Tambah Jabatan Baru'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card p-3">
        <div class="card-body">
          <form action="{{ route('jabatan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="jabatan" class="form-label">Nama Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            <div class="mb-3">
              <label for="tingkat" class="form-label">Tingkat</label>
              <select name="tingkat" id="tingkat" class="form-control form-select">
                <option value="" selected disabled>Pilih tingkat jabatan</option>
                <option value="Senior">SENIOR</option>
                <option value="Junior">JUNIOR</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
              <input type="number" class="form-control" min="0" id="gaji_pokok" name="gaji_pokok">
            </div>
            <div class="d-flex gap-3">
              <a href="{{ route('jabatan.index') }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-success w-50">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
