@extends('template_backend.home')
@section('sub-judul', 'Edit Tag')
@section('content')


<form action="{{ route('tag.update', $tags->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label>Tag</label>
        <input type="text" class="form-control" name="name" value="{{ $tags->name }}">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Ubah Tag</button>
    </div>
</form>

@endsection