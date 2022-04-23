@extends('layouts.app')

@section('title')
    Index
@endsection

@section('content')

    <div class="text-center">
        <a href="{{ route('post.create') }}" class="mt-4 btn btn-success"><i class="bi bi-plus-circle-fill"></i> Add
            Post</a>
    </div>

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ( $posts as $post)
            @if ( ! $post->trashed())
                {{--                @dd($post->user);--}}
                <tr>
                    <td>
                        {{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->post_creator }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        {{--                    {{ route('posts.edit', ['post' => $post['id']]) }}--}}
                        <a href="{{ route('post.show',  $post->id) }}" class="btn btn-info"><i
                                class="bi bi-eye-fill"></i> View</a>
                        <a href="{{ route('post.edit',  $post->id) }}" class="btn btn-primary"><i
                                class="bi bi-pencil-square"></i> Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{ $post->id }}">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                        @include("layouts.modal")
                    </td>
                </tr>


            @else
                <tr align="center">
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>

                    <td  align="center">
                        <form method="post" action="{{ route('post.restore', ['id' => $post->id])}}">
                            @csrf
                            @method('put')
                            <button type="submit"  class="btn btn-warning"><i class="bi bi-pencil-square"></i> Restore</button>
                            <input name="id" type="hidden" value="{{ $post->id }}">
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach

        </tbody>
    </table>


    <div>
        {{ $posts->links() }}
    </div>



@endsection
