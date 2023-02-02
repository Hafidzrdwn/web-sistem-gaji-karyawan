@extends('app', ['title' => 'Master Pelanggaran'])

@section('content')
<table class="table table-borderless">
    <thead>
        <th>No</th>
        <th>Pelanggaran</th>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Pelanggaran</td>
            <td>
                <a href="pelanggaran/show" class="btn btn-primary btn-sm d-inline">Show</a>
                <a href="pelanggaran/add" class="btn btn-success btn-sm d-inline">Add</a>
                <a href="pelanggaran/edit" class="btn btn-warning btn-sm d-inline">Edit</a>
                <a href="" class="btn btn-danger btn-sm d-inline">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
    <div class="position-relative">
        <div class="position-absolute top-0 end-0">
            <form action="">
                <label for="">Jenis Pelanggaran</label>
                <input type="text" class="form-control" name="" id="">
                <label for="">Potongan Gaji</label>
                <input type="text" class="form-control" name="" id="">
                <button type="submit" class="btn btn-success btn-sm mt-2">Simpan</button>
            </form>
        </div>
    </div>
@endsection
