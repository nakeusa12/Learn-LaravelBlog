@extends('template_backend.home')
@section('sub-judul', 'Edit User')
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

    <form action="{{ route('user.update', $user->id )}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
        </div>
        <div class="form-group">
            <label>Tipe User</label>
            <select name="tipe" class="form-control" id="">
                <option value="" holder>Pilih Tipe</option>
                <option value="1" holder
                @if ($user->tipe == 1)
                    selected
                @endif
                >Administrator</option>
                <option value="0" holder
                @if ($user->tipe == 0)
                    selected
                @endif>Author</option>
            </select>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update User</button>
            <a href="{{ url('/tag') }}">Kembali</a>
        </div>
    </form>

    
@endsection