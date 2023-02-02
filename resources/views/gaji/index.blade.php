@extends('app', ['title' => 'Master Gaji'])

@section('content')
<table class="table table-borderless">
    <thead>
        <th>No</th>
        <th>Karyawan</th>
        <th>Gaji</th>
        <td>Action</td>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Karyawan</td>
            <td>Gaji</td>
            <td>
                <a href="gaji/show" class="btn btn-primary btn-sm d-inline">Show</a>
                <a href="gaji/add" class="btn btn-success btn-sm d-inline">Add</a>
                <a href="gaji/edit" class="btn btn-warning btn-sm d-inline">Edit</a>
                <a href="" class="btn btn-danger btn-sm d-inline">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
<div class="position-relative">
    <div class="position-absolute top-0 end-0">
        <form action="">
            <label for="">Jenis Gaji</label>
            <input type="text" class="form-control" name="" id="">
            <label for=""> Gaji</label>
            <input type="text" class="form-control" name="" id="">
            <button type="submit" class="btn btn-success btn-sm mt-2">Simpan</button>
        </form>
    </div>
</div>
@endsection
