@extends('app', ['title' => 'Edit Karyawan - ' . $karyawan->nama])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card p-3">
        <div class="card-body">
          <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}">
              </div>
              <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $karyawan->email }}" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $karyawan->no_telp }}">
              </div>
              <div class="col-6">
                <label for="no_rek" class="form-label">No Rekening</label>
                <input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ $karyawan->no_rek }}">
              </div>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $karyawan->alamat }}">
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" class="form-control" min="0" id="usia" name="usia" value="{{ $karyawan->usia }}">
              </div>
              <div class="col-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control form-select">
                  <option value="" selected disabled>Pilih status karyawan</option>
                  <option value="BELUM KAWIN" @if($karyawan->status == "BELUM KAWIN") selected @endif>BELUM KAWIN</option>
                  <option value="KAWIN" @if($karyawan->status == "KAWIN") selected @endif>KAWIN</option>
                  <option value="CERAI HIDUP" @if($karyawan->status == "CERAI HIDUP") selected @endif>CERAI HIDUP</option>
                  <option value="CERAI MATI" @if($karyawan->status == "CERAI MATI") selected @endif>CERAI MATI</option>
                </select>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan" class="form-control form-select">
                  <option value="" selected disabled>Pilih jabatan karyawan</option>
                  @foreach ($jabatan as $j)
                  <option value="{{ $j->id }}" @if($karyawan->jabatan_id == $j->id) selected @endif>{{ $j->jabatan }} - {{ $j->tingkat }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label class="form-label d-block">Jenis Kelamin</label>
                @foreach ($jenis_kelamin as $jk)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin_id" id="inlineRadio{{ $loop->iteration }}" value="{{ $jk->id }}" @if($karyawan->jenis_kelamin_id == $jk->id) checked @endif>
                  <label class="form-check-label" for="inlineRadio{{ $loop->iteration }}">{{ $jk->jk }}</label>
                </div>
                @endforeach
              </div>
            </div>
            <div class="d-flex justify-content-center gap-3">
              <a href="{{ route('karyawan.index') }}" class="btn btn-dark w-25">&laquo; Kembali</a>
              <button type="submit" class="btn btn-primary w-25">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
