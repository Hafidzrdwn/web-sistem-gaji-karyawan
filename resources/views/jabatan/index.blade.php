@extends('app', ['title' => 'Master jabatan'])

@section('content')
<div class = "col-md-12">
    <a href="jabatan/create" class="btn btn-success btn-sm d-inline">Add</a>
    <table class="table table-borderless">
        <thead>
            <th>No</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <td>Action</td>
        </thead>
        <tbody>
            <tr>
                @foreach ($gaji as $item)            
                <td>{{$loop->iteration}}</td>
                <td>{{$item->jabatan->jabatan}}</td>
                <td>{{$item->gaji_pokok}}</td>
                <td>
                    <a href="jabatan/{{$item->id}}" class="btn btn-primary btn-sm d-inline">Show</a>
                    <a href="jabatan/{{$item->id}}/edit" class="btn btn-warning btn-sm d-inline">Edit</a>
                    <form action="jabatan/{{$item->id}}" method="POST" enctype="multipart/form-data" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm d-inline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div class="position-absolute top-0 end-0 mt-5">
        <div class="container-fluid py-4 mt-4">
            <div class = "row">
                <div class = "col-lg-12">
                    <div class = "card shadow">
                        <div class = "card-body text-center">
                            <form action="jabatan/action" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="jabatan">Nama Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{old('jabatan')}}">
                                <button type="submit" class="btn btn-success btn-sm mt-2">Simpan</button>
                            </form>
                            @if (count($errors) > 0)
                                <ul class="text-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <table class="table table-responsive">
                                <thead>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach ($jabatan as $item) 
                                        <td>{{$loop->iteration}}</td>                 
                                        <td>{{$item->jabatan}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection