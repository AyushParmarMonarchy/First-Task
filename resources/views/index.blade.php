<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First - Task</title>
    <meta name="description" content="This is my first task in internship.">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="body">
    <div class="container">
        <x-header></x-header>
        <x-student></x-student>

        <div class="demo" id="demo"></div>

    </div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
    async function time()
    {
        let min = 4 ;
        let second = 60;

        for ( let i = min ; i >= 0 ; i--)
        {
            for ( let j = second ; j >=0 ; j--)
            {
                $('#demo').text(i + ': ' + j);
                // console.log(i + ": " + j);
                await new Promise(resolve => setTimeout(resolve, 1000));
            }
            if(i == 0 )
            {
                $('#demo').text('Time Up');
                console.log("Time Up");
            }
        }

    }
    $(document).ready(function()
    {
        alert ('ready');
        time();
    });
</script>
<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jquery link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>