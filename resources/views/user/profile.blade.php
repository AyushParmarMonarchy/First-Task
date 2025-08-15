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
<body>
    <div class="container">
        <x-header></x-header>

        <div class="user-data">
            <div class="user-field">
                <h2>Name</h2>
                <h3>{{ $user->first}}   {{ $user-> last}}</h3>
            </div>
            <div class="user-field">
                <h2>Email Id</h2>
                <h3>{{ $user->email_id }}</h3>
            </div>
            <div class="user-field">
                <h2>Mobile</h2>
                <h3>{{ $user->mobile }}</h3>
            </div>
            <div class="user-field">
                <h2>Gender</h2>
                <h3>{{ $user->gender}}</h3>
            </div>
            <div class="user-field">
                <h2>Date of Birth</h2>
                <h3>{{ \Carbon\Carbon::parse($user->dob)->format('d - m - Y') }}</h3>
            </div>
            <div class="user-field">
                <h2>Join with Us</h2>
                <h3>{{ $user->created_at->format('d - m - Y h:i A') }}</h3>
            </div>
            <div class="user-field">
                <h2>Last Modify</h2>
                <h3>{{ $user->updated_at->format('d - m - Y h:i A') }}</h3>
            </div>
            <div class="edit-button">
                <a href="{{ route('profile.edit')}}">Edit Information </a>
            </div>
        </div>
        
    </div>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jquery link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>