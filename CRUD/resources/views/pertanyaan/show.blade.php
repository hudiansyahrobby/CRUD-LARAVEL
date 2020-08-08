@extends('/partials/master')

@section('content')
<div class="container mt-2">
    <h2>{{ $pertanyaan->judul }}</h2>
    <p>{{ $pertanyaan->isi }}</p>
</div>

@endsection