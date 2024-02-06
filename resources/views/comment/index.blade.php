@extends('layout')

@section('title', 'Laravel')

@section('content')

    @foreach($comments as $comment)
        <div class="w-75 mb-3">
            <div class="pb-3">
                <div class="card w-75  bg-secondary-subtle">
                    <h5 class="card-header">{{ $comment->user->name }}</h5>
                    <div class="card-body">
                        <p class="card-text">{{ $comment->content }}</p>
                        <div class="d-flex">
                            <a href="{{route('comment.create', ['comment' => $comment->id])}}" class="btn btn-dark">Reply</a>
                            <a href="{{route('comment.edit', ['comment' => $comment->id])}}" class="btn btn-secondary">Edit</a>

                            <form action="{{route('comment.delete', ['comment' => $comment])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            @if($comment->childs)
            @foreach($comment->childs as $child)
                <div class="d-flex justify-content-end">
                    <div class="card w-75  bg-light">
                        <h5 class="card-header">{{ $child->user->name }}</h5>
                        <div class="card-body">
                            <p class="card-text">{{ $child->content }}</p>
                            <div class="d-flex">

                                <a href="{{route('comment.edit', ['comment' => $comment->id])}}" class="btn btn-secondary">Edit</a>

                                <form action="{{route('comment.delete', ['comment' => $comment])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>


            @endforeach
            @endif

        </div>

    @endforeach

    {{$comments->links()}}

@endsection