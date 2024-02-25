<!-- resources/views/posts/show.blade.php -->
{{-- Layout을 가져옴<div class=""></div> --}}
@extends('common_layouts.app')

@section('content')
    <br>
    <br>
<div class="container text-center mb-5 card">
    <div class="card-body">
        <h2 class="card-title">{{ $board->title }}</h2>
    <hr>
        <p class="card-text">{{ $board->content }}</p>
    <br>
        <p class="card-text"><small class="text-muted">
            {{ $board->created_at }}</small></p>
    </div>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
<small class="text-black-50">{{ \Carbon\Carbon::parse($board->created_at)->format('Y.m.d H:i:s') }}</small>

<div style="display: flex; justify-content: flex-end;">
    <a href="{{ route('boards.edit', $board) }}" class="btn btn-warning btn-sm" style="margin-right: 5px;">Edit</a>
    <form action="{{ route('boards.delete', $board) }}" method="POST" style="margin-right: 5px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm
        ('정말 삭제하시겠습니까?')">Delete</button>
    </form>
    <a href="{{ route('boards.index') }}" class="btn btn-primary btn-sm">List</a>
</div>



@endsection
