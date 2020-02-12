@extends('template_backend.home')
@section('sub-judul', 'Edit Kategori')
@section('content')


<form action="{{ route('category.update', $category->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Ubah Kategori</button>
    </div>
</form>

@endsection