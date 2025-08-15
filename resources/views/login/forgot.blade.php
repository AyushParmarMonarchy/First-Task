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
            <form action="{{ route('password_update') }}" method="post">
                @csrf 
                @method('POST')
                <div class="input-filed">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" id="old_password" >
                </div>
                <div class="error">
                    @error('old_password')
                        <span>{{ $message }}</span>
                    @enderror 
                    @error('forgot')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="input-filed">
                    <div class="show">
                        <input type="checkbox" name="show" id="show">Show Password
                    </div>
                </div>

                
                <div class="input-filed">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" >
                </div>
                <div class="error">
                    @error('new_password')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="input-filed">
                    <label for="cn_password">Confirm  Password</label>
                    <input type="password" name="cn_password" id="cn_password" >
                </div>
                <div class="error">
                    @error('cn_password')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                
                <div class="edit-button">
                    <input type="submit" value=" Change Password" name="password" id="password" class="submit" >                
                </div>
            </form>
        </div>
    </div>
<script>
    document.getElementById('show').addEventListener('change',function(){
        let old_password = document.getElementById('old_password');
        if(this.checked)
        {
            old_password.type = 'text' ;
        }
        else
        {
            old_password.type = 'password' ;
        }
    });
</script>
<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jquery link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>