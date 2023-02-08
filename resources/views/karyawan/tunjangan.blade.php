@extends('app', ['title' => 'Berikan Tunjangan'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card p-3">
        <div class="card-body">
          <h4 class="mb-4">Untuk karyawan yang bernama {{ $karyawan->nama }} :</h4>
          <form action="{{ route('tunjangan.add') }}" method="POST">
            @csrf
            <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">
            <div class="mb-4">
              <label for="tunjangan_id" class="form-label">Tunjangan</label>
              <select name="tunjangan_id" id="tunjangan_id" class="form-control form-select">
                <option value="" selected disabled>Pilih tunjangan</option>
                @foreach ($tunjangan as $t)

                @if($karyawan->status == 'BELUM KAWIN' && strtolower($t->jenis) == "tunjangan keluarga")
                @continue
                @endif

                @if(strtolower($karyawan->jabatan->tingkat) == 'junior' && strtolower($t->jenis) == "tunjangan jabatan")
                @continue
                @endif

                <option value="{{ $t->id }}">{{ $t->jenis }} - @if($t->khusus) nominal menyesuaikan. @else @rupiah($t->jumlah) @endif</option>
                @endforeach
              </select>
            </div>
            <div class="d-flex gap-3">
              <a href="{{ url()->previous() }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-primary w-50">Berikan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
