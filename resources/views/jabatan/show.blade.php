@extends('app', ['title' => 'Show jabatan'])

@section('content')
<h6>Jabatan</h6>
<p>{{$gaji->jabatan->jabatan}}</p>
<h6>Gaji Pokok</h6>
<p>{{$gaji->gaji_pokok}}</p>
@endsection