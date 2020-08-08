@extends('/partials/master')

@section('content')
<form role="form" method="POST" action="/pertanyaan">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="judul">Judul Pertanyaan</label>
            <input type="text" class="form-control" id="pertanyaan" value="{{ old('judul', '') }}" name="judul"
                placeholder="Judul Pertanyaan">
            @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="isi">Isi Pertanyaan</label>
            <input type="text" class="form-control" id="isi" name="isi" value="{{ old('isi', '') }}"
                placeholder="Isi Pertanyaan">
            @error('isi')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</form>
@endsection