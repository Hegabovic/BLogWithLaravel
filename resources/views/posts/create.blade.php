@extends('layouts.app')

@section('title')
    Add Post
@endsection

@section('content')

    <form method="POST" action={{ route('post.store') }}>
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
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>

{{--            <input type="hidden" name="post_creator" value="{{ $user->name }}">--}}
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
