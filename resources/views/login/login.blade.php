<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Log In</title>
    <meta name="description" content="This is my first task in internship.">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <x-header></x-header>

          <div class="cantant">
           
            <div class="card-box form-box">
                <form action="{{ route('login.submit') }}" method="post"> 
                    @csrf
                    @method('POST')
                    <div class="input-filed">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}">
                        @error('username')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-filed">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-filed">
                        <div class="show-forget">
                            <div class="show">
                                <input type="checkbox" name="show" id="show"> Show Password
                            </div>    
                            <div class="forget">
                                <input type="submit" value="Forgot Password" name = "submit">
                            </div>
                        </div>
                    </div>

                    <div class="input-filed">
                        @error('login')
                            <span>{{ $message }}</span>
                        @enderror 
                    </div>

                    <input type="submit" name="submit" id="submit" value="Login" class="submit">

                    <div class="last-line">
                        <p>Don't have an account? <a href="{{ route('registration') }}">Register here</a>.</p>
                    </div>
                </form>
            </div>  
            <div class="card-box image-box">
                <img src="{{ asset('images/login.jpg')}}" alt="Registration">
            </div>
        </div>
    </div>
<script>
    document.getElementById('show').addEventListener('change',function(){
        let password = document.getElementById('password');
        if(this.checked)
        {
            password.type = 'text';
        }
        else
        {
            password.type = 'password';
        }
    });
</script>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jquery link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>