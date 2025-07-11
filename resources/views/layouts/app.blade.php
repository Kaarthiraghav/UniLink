<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'UniLink')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            font-family: 'Segoe UI', sans-serif;
        }
        .main-container {
            display: flex;
        }
        .content-area {
            flex: 1;
            padding: 30px;
        }
    </style>
    @stack('styles')
</head>
<body>
    @include('layouts.header')
    <div class="main-container">
        @include('layouts.sidebar')
        <div class="content-area">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
    @stack('scripts')
</body>
</html>
