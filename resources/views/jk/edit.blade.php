@extends('app', ['title' => 'Edit Jenis Kelamin - '. $jk->jk])

@section('content')
<section class="mt-4">
  <div class="row">
    <div class="col-md-5">
      <div class="card p-3">
        <div class="card-body">
          <form action="{{ route('jenis_kelamin.update', $jk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="jk" class="form-label">Jenis Kelamin</label>
              <input type="text" class="form-control" id="jk" name="jk" value="{{ $jk->jk }}">
            </div>
            <div class="d-flex gap-3">
              <a href="{{ route('jenis_kelamin.index') }}" class="btn btn-dark w-50">&laquo; Kembali</a>
              <button type="submit" class="btn btn-primary w-50">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
