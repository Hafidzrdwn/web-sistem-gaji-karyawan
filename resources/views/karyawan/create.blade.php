@extends('app', ['title' => 'Tambah Karyawan Baru'])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card p-3">
        <div class="card-body">
          <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <div class="col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp">
              </div>
              <div class="col-6">
                <label for="no_rek" class="form-label">No Rekening</label>
                <input type="text" class="form-control" id="no_rek" name="no_rek">
              </div>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" class="form-control" min="0" id="usia" name="usia">
              </div>
              <div class="col-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control form-select">
                  <option value="" selected disabled>Pilih status karyawan</option>
                  <option value="BELUM KAWIN">BELUM KAWIN</option>
                  <option value="KAWIN">KAWIN</option>
                  <option value="CERAI HIDUP">CERAI HIDUP</option>
                  <option value="CERAI MATI">CERAI MATI</option>
                </select>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan" class="form-control form-select">
                  <option value="" selected disabled>Pilih jabatan karyawan</option>
                  @foreach ($jabatan as $j)
                  <option value="{{ $j->id }}">{{ $j->jabatan }} - {{ $j->tingkat }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label class="form-label d-block">Jenis Kelamin</label>
                @foreach ($jenis_kelamin as $jk)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin_id" id="inlineRadio{{ $loop->iteration }}" value="{{ $jk->id }}">
                  <label class="form-check-label" for="inlineRadio{{ $loop->iteration }}">{{ $jk->jk }}</label>
                </div>
                @endforeach
              </div>
            </div>
            <div class="d-flex gap-3 justify-content-center">
              <a href="{{ route('karyawan.index') }}" class="btn btn-dark w-25">&laquo; Kembali</a>
              <button type="submit" class="btn btn-success w-25">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
