@extends('layouts.app')

@section('title')
    Show Post
@endsection
@section('content')

    @foreach ($post->comments as $comment)
    @endforeach
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">
                <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                    <div class="profile-image"><img class="rounded-circle"
                                                    src="https://i.pinimg.com/564x/cb/16/bb/cb16bb284a2a80c75041c80ba63e62d3.jpg"
                                                    width="70"></div>
                    {{--                    @dd($comments)--}}
                    <div class="d-flex flex-column ml-3">
                        <div class="d-flex flex-row post-title">
                            <h5>Post Title:- </h5><span class="ml-2">{{$post->title}}</span>
                        </div>
                        <div class="d-flex flex-row post-title"><span
                                class="comments">{{ $post->description }}&nbsp;</span><span class="mr-2 dot"></span>
                        </div>
                        <span>{{ $post->created_at->toDayDateTimeString() }}</span>
                    </div>
                </div>

                <div class="coment-bottom bg-white p-2 px-4">
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4"><img
                            class="img-fluid img-responsive rounded-circle mr-2" src="https://i.pinimg.com/564x/cb/16/bb/cb16bb284a2a80c75041c80ba63e62d3.jpg"
                            width="38"><input type="text" class="form-control mr-3" placeholder="Add comment">
                        <button class="btn btn-primary" type="button">Comments  </button>
                    </div>
                    <!-- Start of comments section  -->
                    <div class="collapsable-comment">
                        <div class="d-flex flex-row justify-content-between align-items-center action-collapse p-2"
                             data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1">
                            <span> Comments </span><i class="fa fa-chevron-down servicedrop"></i></div>
                        <br>
                        <div id="collapse-1" class="collapse">
{{--                            $post->comments--}}
                            @foreach($comments as $comment)
                                @if ( ! $comment->trashed())
                                    <section>
                                        <div class="row">
                                            <div class="col-2 d-flex justify-content-between align-items-center">
                                                <img class="img-fluid img-responsive rounded-circle" src="https://i.pinimg.com/564x/cb/16/bb/cb16bb284a2a80c75041c80ba63e62d3.jpg" alt="img">
                                            </div>
                                            <div class="col-10">
                                                <h2>{{ $comment->user->name }}</h2>
                                                <p>${{ $comment->comments }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-space align-items-center ">
                                            <div class="col-4"></div>
                                            <div lass="col-8">
                                            <a href="" class="btn btn-primary"><i
                                                    class="bi bi-pencil-square"></i> Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#ModalDeleteComment{{ $comment->id }}">
                                                <i class="bi bi-trash-fill"></i> Delete
                                            </button>
                                                @include("layouts.commentModal")
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                    </section>
                                @else
                                    <form method="post" action="{{ route('post.restoreComment', ['id' => $comment->id])}}">
                                        @csrf
                                        @method('put')
                                        <div class="col-12 d-flex justify-content-between align-items-center">
                                            <div class="col-4"></div>
                                            <div class="col-8">
                                            <button type="submit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i> Restore
                                            </button>
                                            <input name="id" type="hidden" value="{{ $comment->id }}">
                                            </div>
                                        </div>

                                    </form>
                                    <br>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!--  End of Comments section -->
                </div>
            </div>
        </div>
    </div>
@endsection



