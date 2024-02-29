<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 기본경로 ('/')에 접속하면 'welcome' 페이지를 반환하는 라우트.
// 첨에 프로젝트 만들면 기본으로 하나 딸려있는 놈이다.
Route::get('/', function () {
    return view('welcome');
});

// 게시판의 첫 화면 메인 페이지에 접속하기 위한 라우트다.
// get요청이 '/boards' 경로로 들어오면 'BoardController'의 'main' 메소드를 호출하여,
// 게시글 목록을 보여주는 페이지로 이동한다. 이 라우트에는 board.index라는 이름이 지정됨.
// 나중에 이름을 이용하여, url을 생성할 수 있다. 한마디로 메인페이지다 이게.
Route::get('/boards', [BoardController::class, 'index'])->name('boards.index');

// 새로 글을 작성하는 페이지
// get요청이 'boards/create'경로로 오면 'BoardController'의 'create'메소드를 호출하여,
// 게시글을 작성하는 페이지로 이동하게 되는 것이다. 메인페이지에서 'NEW'버튼을 눌리면 여기로 이동이되서
// 게시글이 작성 가능해진다.
Route::get('/boards/create', [BoardController::class, 'create'])->name('boards.create');

// 새로 작성한 게시글을 저장하는 라우트
// 'post'요청이 '/posts' 경로로 오면 'BoardController'의 'save'메소드를 호출하여,
// 새로 작성한 글을 저장하고, 이후에는 저장된 게시글을 보여주는 페이지(메인) 페이지로 리다이렉션 한다.
Route::post('/boards', [BoardController::class, 'save'])->name('boards.save');

// 특정 게시글을 보여주는 페이지다.
// get요청이 '/boards/{board}' 경로로 오면, 'BoardController'의 'show'메서드를 호출하여,
// 특정 ID의 게시글을 보여주는 페이지로 이동한다. {board}는 변수처럼 동작하여, 어떤 글을 보여줄지
// 결정한다.
Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');

// 특정 게시글을 수정하는 페이지에 접속하기 위한 라우트. 수정페이지에 접속하는거다.
// get요청이 boards/{board} 경로로 들어오면 BoardController의 edit 메소드를 호출하여,
// 특정 id의 게시글을 수정하는 페이지로 이동한다.
Route::get('/boards/{board}/edit', [BoardController::class, 'edit'])->name('boards.edit');

// 수정된 내용을 저장하는 라우트
// put요청이 boards/{board} 경로로 들어오면 BoardController의 update 메소드를 호출하여,
// 특정 id의 게시물을 업데이트한다. 그 이후에는 업데이트한 게시글을 보여주는 페이지로 리다이렉트됨. (최초 해당글)
Route::put('/boards/{board}', [BoardController::class, 'update'])->name('boards.update');

// 게시글을 삭제하는 라우트
// Delete요청이 'boards/{board} 경로로 오면 PostController의 delete 메소드를 호출하여,
// 특정 id의 게시글을 삭제한다. {board}는 삭제할 게시글의 id를 나타낸다. 이 라우트에는 boards.delete
// 라는 이름이 지정되어 있어 나중에 이름을 이용하여 url을 생성할 수 있다.
Route::delete('/boards/{board}', [BoardController::class, 'delete'])->name('boards.delete');

// Jetstream Sanctum을 사용해서 사용자를 인증하고, 라우트 그룹에 미들웨어로 지정된
// auth:sanctum과 verified를 사용하여 인증 및 이메일 인증을 처리한다.
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// 로그인 페이지에 대한 라우트
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
