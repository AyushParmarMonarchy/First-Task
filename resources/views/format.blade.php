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
        
    </div>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jquery link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>

<script>
    $(document).ready(function(){
        alert('jquery is running'); // alert message to check jquery is running/ connent  or not 
        $('#form-name').submit(function(e){
            e.preventDefault(); // to not reload a page perform all action with out reload

            $('#name-error').text(''); // to clear all error span/ div tag ->> clear each an every 

            let formData = new FormData(this); // if use formdata in data -> for use radio, checkbox or dropbox in form

            $.ajax({
                url : "{{ route('submit')}}", // server/ logic route
                type : "POST" , // method
                // data : $(this).serialize(), // if text or date in form otherwise use formdata
                data : formData ,
                processData : false, // don't process into query string
                contentType : false, // let browser set multipart/form-data
                header: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'), // must be meta tag on head 
                    'Accept' : 'application/json' // to accept json format data from the laravel 
                },
                success: function(response){ // to show response from the conroller give
                    if(response.success)
                    {
                        alert(response.message); // show message in the response json
                        $('#form-name')[0].reset(); // reset the form 
                    }
                    else
                    {
                        alert(response.error);
                    }
                },
                error: function(xhr){ // errors are in xhr
                    let errors = xhr.responseJSON?.error || {} ; // errors are in xhr then store errors ans nothing then {}null

                    $('name-error').text(errors.name ? errors.name[0] : ''), // in this show the error in div/span check error is hear or not


                }
            });
        });
    });
</script>