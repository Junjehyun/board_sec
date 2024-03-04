<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // 로그인 페이지를 보여주는 메서드
    public function showLoginForm() {
        // 'auth.login'뷰를 반환하여 로그인 페이지를 표시한다.
        return view('auth.login');
    }
}
