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
                <div class="demo" id="demo" > </div>
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

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
     async function time()
    {
        let min = 4 ;
        let second = 59;

        for ( let i = min ; i >= 0 ; i--)
        {
            for ( let j = second ; j >=0 ; j--)
            {
                $('#demo').text(i + ': ' + j );
                // console.log(i + ": " + j);
                await new Promise(resolve => setTimeout(resolve, 1000));
            }
            if(i == 0 )
            {
                $('#demo').text('Reload Page ');
                console.log("Time Up");
            }
        }

    }
    $(document).ready(function()
    {
        if($('#demo').length)
        {
            time();
            // alert('div');
        }
        else
        {
            // alert('not div');
        }
       
    });
</script>
</body>
</html>