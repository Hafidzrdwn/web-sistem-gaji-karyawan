@extends('app', ['title' => 'Edit jabatan'])

@section('content')
<form action="{{route('jabatan.update',$gaji->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="col-md-6">
        <label for="jabatan_id">Jabatan</label>
        <select class="form-control form-select" name="jabatan_id" id="jabatan_id">
            @foreach ($jabatan as $item)                     
            @if ($gaji->jabatan_id == $item->id)
            <option value ="{{$item->id}}" selected>{{$item->jabatan}}</option>  
            @else
            <option value="{{$item->id}}">{{$item->jabatan}}</option> 
            @endif
            @endforeach
        </select>
        <label for="gaji_pokok">Gaji Pokok</label>
        <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" value="{{$gaji->gaji_pokok}}">
    </div>
    <div class="col-md-6 mt-2">
        <button type="submit" class="btn btn-warning" >Simpan</button>
        <a href="/jabatan" class="btn btn-danger">Batal</a>
    </div>
</form>


@endsection