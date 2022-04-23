@extends('layouts.app')

@section('title')
    Add Post
@endsection

@section('content')

    <form method="POST" action={{ route('post.store') }}>
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>

{{--            <input type="hidden" name="post_creator" value="{{ $user->name }}">--}}
            <select class="form-control" name="user_id">
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
