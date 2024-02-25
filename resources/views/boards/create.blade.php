@extends('common_layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <div class="card-header">새 글 작성</div>

    <div class="card-body">
    <!-- 게시글 작성 폼 -->
    <form action="{{ route('boards.save') }}" method="POST">
        @csrf

        <div class="form-group">
        <label for="title">제목</label>
        <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="content">내용</label>
        <textarea id="content" name="content" required class="form-control" rows="5" required></textarea>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">작성하기</button>
            <a href="{{ route('boards.index') }}" class="btn btn-info">돌아가기</a>
        </div>

    </form>
    </div>

            </div>
        </div>
    </div>
</div>
















@endsection
