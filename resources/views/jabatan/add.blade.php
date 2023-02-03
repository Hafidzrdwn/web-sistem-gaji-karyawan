@extends('app', ['title' => 'Add jabatan'])

@section('content')
<form action="{{route('jabatan.store')}}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="jabatan_id">Jabatan</label>
        <select class="form-control form-select" name="jabatan_id" id="jabatan_id">
            @foreach ($jabatan as $item)
                <option value="{{$item->id}}">{{$item->jabatan}}</option>
            @endforeach
        </select>
        <label for="gaji_pokok">Gaji Pokok</label>
        <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" value="{{old('gaji_pokok')}}">
    </div>
    <div class="col-md-6 mt-2">
        <button type="submit" class="btn btn-success" >Simpan</button>
        <a href="/jabatan" class="btn btn-danger">Batal</a>
    </div>
    @if (count($errors) > 0)
    <ul class="text-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
</form>
@endsection