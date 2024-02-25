<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog')</title>
    <!-- 부트스트랩 CDN 추가 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 부트스트랩 아이콘 CDN 추가 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        font-family: JetBrains Mono, 나눔스퀘어; /* 글꼴을 지정. */
        background-color: whitesmoke;
    }
</style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('boards.index') }}">
                <i class="bi bi-braces"></i>
                Laravel CRUD
            </a>
            {{-- 검색창
            <form class="d-flex ms-auto" action="{{ route('boards.search') }}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search!"
                name="query" aria-label="Search">
                <button class="btn btn-light btn-sm" type="submit" style="width: 70px;">Search</button>
            </form> --}}
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-secondary text-light text-center py-2 fixed-bottom">
        &copy; {{ date('Y') }} Laravel Board. All rights reserved.
    </footer>

    <!-- 부트스트랩 JS 및 기타 스크립트 추가 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- 여기에 필요한 기타 스크립트 추가 -->
</body>

</html>
