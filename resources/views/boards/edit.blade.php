<!-- resources/views/posts/edit.blade.php -->

@extends('common_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <div class="card-header" style="text-align: center;">Edit Article</div>

    <div class=card-body>
    <!-- 게시글 수정 폼 -->
    <form action="{{ route('boards.update', $board) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group" style="text-align: center;">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $board->title }}"
        class="form-control" required>
        </div>

        <div class="form-group" style="text-align: center;">
        <label for="content">Content</label>
        <textarea id="content" name="content" class="form-control" required>
            {{ $board->content }}</textarea>
        </div>

        <div class="card-footer" style="text-align: center;">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('boards.index') }}" class="btn btn-info">Back</a>
        </div>
    </form>
</div>

            </div>
        </div>
    </div>
</div>
@endsection
