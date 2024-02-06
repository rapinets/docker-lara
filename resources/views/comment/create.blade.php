@extends('layout')

@section('content')

<h5 class="card-header">Add Comment</h5>
<form method="post" action="{{ route('comment.store') }}">
    @csrf

    <div class="visually-hidden">
        <input type="text" id="parent" name="parent" value="{{$_GET['comment'] ?? 0}}">
    </div>

    <div class="row mb-3">
    <label for="textarea" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <textarea class="@error('content') is-invalid @enderror form-control" id="textarea" name="content" style="height: 100px"></textarea>
            @error('content')
                <div class="alert">Fill in the field</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-dark">Add</button>
</form>

@endsection