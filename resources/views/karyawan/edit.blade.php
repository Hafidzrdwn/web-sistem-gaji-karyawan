@extends('app', ['title' => 'Edit Karyawan'])

@section('content')
<form action="">
    <div class="col-md-6">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="" id="">
    </div>
    <div class="col-md-6 mt-2">
        <button type="submit" class="btn btn-warning" >Simpan</button>
        <a href="/karyawan" class="btn btn-danger">Batal</a>
    </div>
</form>

@endsection