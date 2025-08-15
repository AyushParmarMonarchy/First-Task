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
            <form action="{{ route('profile.update') }}" method="post">
                @csrf 
                @method('POST')
                <div class="user-field">
                    <h2>First</h2>
                    <input type="text" name="first" id="first" value = "{{ old('first',$user->first)}} ">
                </div>
                <div class="error">
                    @error('first')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="user-field">
                    <h2>Last</h2>
                    <input type="text" name="last" id="last" value = "{{ old('last',$user->last) }}">
                </div>
                <div class="error">
                    @error('last')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="user-field">
                    <h2>Email Id</h2>
                    <input type="text" name="email_id" id="email_id" value = "{{ old('email_id', $user->email_id) }}">
                </div>
                <div class="error">
                    @error('email_id')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="user-field">
                    <h2>Mobile</h2>
                    <input type="text" name="mobile" id="mobile" value = "{{ old('mobile',$user->mobile) }}">
                </div>
                <div class="error">
                    @error('mobile')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="user-field">
                    <h2>Gender</h2>
                    <div class="radio">
                        <input type="radio" name="gender" id="male" value = "Male" {{old('gender',$user->gender) == 'Male' ? 'checked' : ''}}> Male
                        <input type="radio" name="gender" id="female" value = "Female" {{old('gender',$user->gender) == 'Female' ? 'checked' : ''}}> Female
                        <input type="radio" name="gender" id="other" value = "Other" {{old('gender',$user->gender) == 'Other' ? 'checked' : ''}}> Other
                    </div>
                </div>
                <div class="error">
                    @error('gender')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="user-field">
                    <h2>Date of Birth</h2>
                    <input type="date" name="dob" id="dob" value = "{{ old('dob',$user->dob) }}">
                </div>
                <div class="error">
                    @error('dob')
                        <span>{{ $message }}</span>
                    @enderror 
                </div>
                <div class="edit-button">
                    <input type="submit" value="Save Changes" name="submit" id="submit" class="submit" >                </div>
            </form>
        </div>
    </div>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jquery link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>