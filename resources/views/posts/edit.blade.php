@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    <form method="POST" action={{ route('post.update',$post->id) }}>
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label @error('title') is-invalid @enderror">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $post->title }}">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label @error('description') is-invalid @enderror">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
<div class="mb-3">
        <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
