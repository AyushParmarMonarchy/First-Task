<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title>
    <meta name="description" content="Register your self ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <x-header> </x-header>  

        <div class="cantant">
            <div class="card-box image-box">
                <img src="{{ asset('images/registration.jpg')}}" alt="Registration">
            </div>
            <div class="card-box form-box">
                <form action="{{ route('registration.submit')}}" method="post">
                    @csrf       
                    <div class="input-filed">
                        <label for="first">First Name</label>
                        <input type="text" name="first" id="first" value="{{ old('first') }}">
                        @error('first')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-filed">
                        <label for="last">Last Name</label>
                        <input type="text" name="last" id="last" value="{{ old('last') }}">
                        @error('last')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-filed">
                        <label for="email_id">Email Id</label>
                        <input type="text" name="email_id" id="email_id" value="{{ old('email_id') }}">
                        @error('email_id')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-filed">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}">
                        @error('mobile')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                <div class="input-filed gender">
                        <label>Gender</label>
                        <div class="gender-options">
                            <label><input type="radio" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked':'' }}>Male</label>
                            <label><input type="radio" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked':'' }}>Female</label>
                            <label><input type="radio" name="gender" value="Other" {{ old('gender') == 'Other' ? 'checked':'' }}>Other</label>
                            @error('gender')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-filed">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="dob" id="dob" value="{{ old('dob') }}">
                        @error('dob')
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
                        <label for="cn_password"> Confirm Password</label>
                        <input type="password" name="cn_password" id="cn_password" value="{{ old('cn_password') }}">
                        @error('cn_password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>  


                    <input type="submit" value="Register" name="submit" id="submit" class="submit">

                    <div class="last-line">
                        <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
                    </div>
    
                </form>
            </div>  
        </div>
    </div>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jquery link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>