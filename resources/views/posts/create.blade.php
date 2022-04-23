@extends('layouts.app')

@section('title')
    Add Post
@endsection

@section('content')

    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label @error('title') is-invalid @enderror">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label @error('description') is-invalid @enderror">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <div>
            <label class="form-label" for="customFile @error('fileUpload') is-invalid @enderror">Upload File</label>
            <input type="file" name="fileUpload" class="form-control" id="customFile" />
            </div>
            @error('fileUpload')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
