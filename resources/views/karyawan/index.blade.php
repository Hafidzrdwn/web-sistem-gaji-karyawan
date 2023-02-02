@extends('app', ['title' => 'Master Karyawan'])

@section('content')
<table class="table table-borderless">
    <thead>
        <th>No</th>
        <th>Nama</th>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Karyawan</td>
            <td>
                <a href="karyawan/show" class="btn btn-primary btn-sm d-inline">Show</a>
                <a href="karyawan/create" class="btn btn-success btn-sm d-inline">Add</a>
                <a href="karyawan/show/edit" class="btn btn-warning btn-sm d-inline">Edit</a>
                <a href="" class="btn btn-danger btn-sm d-inline">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
