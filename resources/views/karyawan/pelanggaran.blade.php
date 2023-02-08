@extends('app', ['title' => 'Catat Pelanggaran Baru'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card p-3">
        <div class="card-body">
          <h4 class="mb-4">Untuk karyawan yang bernama {{ $karyawan->nama }} :</h4>
          <form action="{{ route('pelanggaran.add') }}" method="POST">
            @csrf
            <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">
            <div class="mb-4">
              <label for="pelanggaran_id" class="form-label">Pelanggaran</label>
              <select name="pelanggaran_id" id="pelanggaran_id" class="form-control form-select">
                <option value="" selected disabled>Pilih pelanggaran</option>
                @foreach ($pelanggaran as $p)
                <option value="{{ $p->id }}">{{ $p->jenis }} - @rupiah($p->potongan_gaji)</option>
                @endforeach
              </select>
            </div>
            <div class="d-flex gap-3">
              <a href="{{ url()->previous() }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-danger w-50">Catat</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
