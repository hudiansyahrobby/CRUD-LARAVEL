@extends('/partials/master')

@section('content')
<div class="m-2">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1 class='mt-2'>List Pertanyaan</h1>
    <a href="/pertanyaan/create" class="btn btn-primary my-2">Buat Pertanyaan Baru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Judul</th>
                <th>Pertanayan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pertanyaan as $key => $tanya)
            <tr>
                <td>{{ $key + 1}}</td>
                <td>{{ $tanya->judul }}</td>
                <td>{{ $tanya->isi }}</td>
                <td>
                    <div class="d-flex">
                        <a href="/pertanyaan/{{$tanya->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/pertanyaan/{{$tanya->id}}/edit" class="btn btn-warning btn-sm mx-1">Edit</a>
                        <form action="/pertanyaan/{{$tanya->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" align='center'>
                    Tidak Ada Pertanyaan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection