@extends('layouts.app')

@section('title')
    Show Post
@endsection
@section('content')
{{--    @dd($post);--}}
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">
                <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                    <div class="profile-image"><img class="rounded-circle" src="https://i.pinimg.com/564x/cb/16/bb/cb16bb284a2a80c75041c80ba63e62d3.jpg" width="70"></div>

                    <div class="d-flex flex-column ml-3">
                        <div class="d-flex flex-row post-title">
{{--                            @dd($post)--}}
                            <h5>Post Title:- </h5><span class="ml-2">{{$post->title}}</span>
                        </div>
                        <div class="d-flex flex-row post-title"><span class="comments">{{ $post->description }}&nbsp;</span><span class="mr-2 dot"></span></div>
                        <span>{{ $post->created_at->toDayDateTimeString() }}</span>
                    </div>
                </div>
                <div class="coment-bottom bg-white p-2 px-4">
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4"><img class="img-fluid img-responsive rounded-circle mr-2" src="https://i.imgur.com/KLeobJk.jpg" width="38"><input type="text" class="form-control mr-3" placeholder="Add comment"><button class="btn btn-primary" type="button">Comment</button></div>
                    <div class="collapsable-comment">
                        <div class="d-flex flex-row justify-content-between align-items-center action-collapse p-2" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1"><span>Comments</span><i class="fa fa-chevron-down servicedrop"></i></div>
                        <div id="collapse-1" class="collapse">
                            <div class="comment-widgets mt-2">
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="https://i.imgur.com/J6l19aF.jpg" alt="user" width="50"
                                                          class="rounded-circle"></div>
                                    <div class="comment-text w-100">
{{--                                       @foreach()--}}
                                        @if ( ! $post->trashed())
                                        <h6 class="font-medium">{{ $post->comment }}</h6> <span class="m-b-15 d-block">Great industry leaders are not the real heroes of stock market. </span>
                                        <div class="comment-footer"><span class="text-muted float-right">August 1, 2019</span>
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeleteComment">
                                                <i class="bi bi-trash-fill"></i> Delete
                                            </button>
                                            @include("layouts.commentModal")
                                        </div>
                                        @else
                                            <form method="post" action="">
                                                @csrf
                                                @method('put')
                                                <button type="submit"  class="btn btn-warning"><i class="bi bi-pencil-square"></i> Restore</button>
                                                <input name="id" type="hidden" value="">
                                            </form>
                                        @endif
{{--                                        @endforeach--}}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
