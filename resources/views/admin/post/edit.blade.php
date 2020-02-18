@extends('template_backend.home')
@section('sub-judul', 'Edit Post')
@section('content')

    @if (count($errors)>0)
        @foreach ($errors->all() as $errors)
            <div class="alert alert-danger" role="alert">
                {{ $errors }}
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>   
    @endif

    <form action="{{ route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul Post</label>
            <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" id="" class="form-control">
                <option value="" holder>Pilih Kategori</option>
                @foreach ($category as $result)
                    <option value="{{ $result->id }}"
                        @if ($post->category_id == $result->id)
                            selected
                        @endif
                        > {{$result->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Pilih Tags</label>
            <select class="form-control select2" name="tags[]" multiple="">
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}"
                        @foreach ($post->tags as $value)
                            @if ($tag->id == $value->id)
                                selected
                            @endif
                        @endforeach
                        > {{$tag->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea name="content" class="form-control" id="content" cols="30" rows="10"> {{$post->content}} </textarea>
        </div>
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Post</button>
            <a href="{{ url('/post') }}">Kembali</a>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection