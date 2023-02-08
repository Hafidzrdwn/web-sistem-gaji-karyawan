@extends('app', ['title' => 'Tambah Tunjangan Baru'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card p-3">
        <div class="card-body">
          <form action="{{ route('tunjangan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis Tunjangan</label>
              <input type="text" class="form-control" id="jenis" name="jenis">
            </div>
            <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah Tunjangan</label>
              <input type="number" class="form-control" min="0" id="jumlah" name="jumlah">
            </div>
            <div class="form-check form-switch mb-4">
              <input class="form-check-input" type="checkbox" role="switch" id="khusus" name="khusus">
              <label class="form-check-label" for="khusus">Khusus?</label>
            </div>
            <div class="d-flex gap-3">
              <a href="{{ route('tunjangan.index') }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-success w-50">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('script')
<script>
  const khusus = document.getElementById('khusus');
  const jumlah = document.getElementById('jumlah');
  khusus.addEventListener('change', function() {
    if (khusus.checked) {
      jumlah.disabled = true;
      jumlah.placeholder = "nominal menyesuaikan.";
    } else {
      jumlah.disabled = false;
      jumlah.placeholder = "";
    }
  });

</script>
@endsection
