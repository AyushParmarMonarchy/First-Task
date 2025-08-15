<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">

</head>
<body>
    <div class="header">
        <header>
            <div class="heading-text">
                <a href="{{ route('home') }}">
                    <h1>Monarchy Infotech </h1>
                </a>
            </div>
            <div class="header-link">
                @if(auth()->check())
                <a href="{{ route('profile')}}">Profile </a>
                <a href="{{ route('logout')}}" onclick="return confirm('confirm LogOut ?')">Log out </a>
                @else
                <a href="{{ route('login')}}">Log In </a>
                <a href="{{ route('registration') }}"> Registration </a>
                @endif
            </div>
        </header>
    </div>
    {{ $slot }}
</body>
</html>