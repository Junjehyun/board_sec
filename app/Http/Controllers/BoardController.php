<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    // 모든 게시물을 가져와서 목록 페이지를 표시하는 메서드.
    // 메인페이지다.
    public function index() {
        // 최신 게시글을 10개씩 페이지네이션하여 가져온다.
        $boards = Board::latest()->paginate(10);

        // boards.index view를 반환하고, 게시물 데이터를 함께 전달.
        return view('boards.index', compact('boards'));
    }
        // 게시글 작성 페이지
    public function create() {
        return view('boards.create');
    }

    // 게시글 저장
    public function save(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

    // 게시글 생성
    $board = new Board();
    $board->title = $request->input('title');
    $board->content = $request->input('content');
    $board->save();

     // 성공 메세지와 함께 게시글 목록 페이지로 리다이렉션
     return redirect()->route('boards.index')
     ->with('success', '게시글이 작성되었습니다.');
    }

    // 게시글 상세보기
    public function show(Board $board) {
        return view('boards.show', compact('board'));
    }

    // 게시글 수정 페이지
    public function edit(Board $board) {
        return view('boards.edit', compact('board'));
    }

    // 게시글 수정
    public function update(Request $request, Board $board) {
        // 유효성 검사
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 게시글 모델을 사용하여 데이터베이스의 해당 게시글을 업데이트
        $board->update($validateData);
        // 성공 메세지와 함께 게시글 목록 페이지로 리다이렉션
        return redirect()->route('boards.index')
        ->with('success', '게시글이 수정 되었습니다.');
    }

    // 게시글 삭제
    public function delete(Board $board) {
        // 해당 게시글을 데이터베이스에서 삭제한다.
        $board->delete();

        // 성공 메세지와 함께 게시글 목록페이지로 리다이렉션
        return redirect()->route('boards.index')
        ->with('success', '게시글이 삭제 되었습니다.');
    }
}
