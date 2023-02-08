@extends('app', ['title' => 'Edit Pelanggaran - ' . $pelanggaran->jenis])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card p-3">
        <div class="card-body">
          <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis Pelanggaran</label>
              <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $pelanggaran->jenis }}">
            </div>
            <div class="mb-3">
              <label for="potongan_gaji" class="form-label">Jumlah Potongan Gaji</label>
              <input type="number" class="form-control" min="0" id="potongan_gaji" name="potongan_gaji" value="{{ $pelanggaran->potongan_gaji }}">
            </div>
            <div class="d-flex gap-3">
              <a href="{{ route('pelanggaran.index') }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-primary w-50">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
