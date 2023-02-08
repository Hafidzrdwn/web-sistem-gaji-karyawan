@extends('app', ['title' => 'Beri Bonus Kepada Karyawan'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card p-3">
        <div class="card-body">
          <h4 class="mb-4">Untuk karyawan yang bernama {{ $karyawan->nama }} :</h4>
          <form action="{{ route('bonus.add') }}" method="POST">
            @csrf
            <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">
            <div class="mb-4">
              <label for="bonus_id" class="form-label">Bonus</label>
              <select name="bonus_id" id="bonus_id" class="form-control form-select">
                <option value="" selected disabled>Pilih bonus</option>
                @foreach ($bonus as $b)
                <option value="{{ $b->id }}">{{ $b->jenis }} - @rupiah($b->bonus)</option>
                @endforeach
              </select>
            </div>
            <div class="d-flex gap-3">
              <a href="{{ url()->previous() }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-success w-50">Berikan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
