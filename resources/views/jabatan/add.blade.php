@extends('app', ['title' => 'Add jabatan'])

@section('content')
<form action="">
    <div class="col-md-6">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="" id="">
    </div>
    <div class="col-md-6 mt-2">
        <button type="submit" class="btn btn-success" >Simpan</button>
        <a href="/jabatan" class="btn btn-danger">Batal</a>
    </div>
</form>
@endsection