@extends('app', ['title' => 'Master jabatan'])

@section('content')
<table class="table table-borderless">
    <thead>
        <th>No</th>
        <th>jabatan</th>
        <td>Action</td>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Karyawan</td>
            <td>
                <a href="jabatan/show" class="btn btn-primary btn-sm d-inline">Show</a>
                <a href="jabatan/add" class="btn btn-success btn-sm d-inline">Add</a>
                <a href="jabatan/edit" class="btn btn-warning btn-sm d-inline">Edit</a>
                <a href="" class="btn btn-danger btn-sm d-inline">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
<div class="position-relative">
    <div class="position-absolute top-0 end-0">
        <form action="">
            <label for="">jabatan</label>
            <input type="text" class="form-control" name="" id="">
            <label for=""> Gaji</label>
            <input type="text" class="form-control" name="" id="">
            <button type="submit" class="btn btn-success btn-sm mt-2">Simpan</button>
        </form>
    </div>
</div>
@endsection
