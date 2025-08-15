<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First - Task</title>
    <meta name="description" content="This is my first task in internship.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
    <div class="container">
        <x-header></x-header>
        <!-- <div class="demo" id="demo"></div> -->

        <div class="student-form">
            <form id="student-form" enctype="multipart/form-data">
                @csrf 
                <!-- @if(session('status') == 'update')
                    @method('PUT')
                @endif  -->
                <input type="hidden" name="id" id="id">
                <div class="left">
                    <div class="input-filed">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" value = "{{ old('photo') }}">
                        <span id="photo-text"></span>
                    </div>
                    <div class="error">
                        <span id="photo-error"></span>
                    </div>

                    <div class="input-filed">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value = "{{ old('name') }}">
                    </div>
                    <div class="error">
                        <span id="name-error"></span>
                    </div>

                    <div class="input-filed">
                        <label>Gender</label>
                        <div class="radio">
                            <input type="radio" name="gender" id="male" value="Male" {{ old('gender') == 'Male' ? 'checked' : ''}}>Male
                            <input type="radio" name="gender" id="female" value="Female" {{ old('gender') == 'Female' ? 'checked' : ''}}>Female
                            <input type="radio" name="gender" id="other" value="Other" {{ old('gender') == 'Other' ? 'checked' : ''}}>Other
                        </div>
                    </div>
                    <div class="error">
                        <span id="gender-error"></span>
                    </div>

                    <div class="input-filed">
                        <label for="std">Standard</label>
                        <select name="std" id="std">
                            <option value="" selected disabled>~ Selsect ~</option>
                            @for($i=1; $i<=12; $i++)
                                <option value="{{ $i }}" {{ old('std') == $i ? 'selected' : ''}}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="error">
                        <span id="std-error"></span>
                    </div>

                    <div class="input-filed">
                        <label for="class">Class</label>
                        <select name="class" id="class">
                            <option value="" selected disabled>~ Select ~</option>
                            @foreach(['A','B','C','D'] as $cls)
                            <option value="{{ $cls }}" {{ old('class') == $cls ? 'selected' : ''}}>{{ $cls }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="error">
                        <span id="class-error"></span>
                    </div>
                    
                </div>
                <div class="right">
                    <div class="input-filed">
                        <label>Activity</label>
                        <div class="checkbox">
                            <input type="checkbox" name="activity[]" id="swimming" value="Swimming" > Swimming
                            <input type="checkbox" name="activity[]" id="karate" value="Karate" >Karate
                            <input type="checkbox" name="activity[]" id="dance" value="Dance" >Dance
                            <input type="checkbox" name="activity[]" id="skating" value="Skating" >Skating
                        </div>
                    </div>
                    <div class="error">
                        <span id="activity-error"></span>
                    </div>

                    <div class="input-filed">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" id="mobile" value = "{{ old('mobile') }}">
                    </div>
                    <div class="error">
                        <span id="mobile-error"></span>
                    </div>

                    <div class="input-filed">
                        <label for="email_id">Email Id</label>
                        <input type="text" name="email_id" id="email_id" value = "{{ old('email_id') }}">
                    </div>
                    <div class="error">
                        <span id="email_id-error"></span>
                    </div>

                    <div class="input-filed">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value = "{{ old('dob') }}">
                    </div>
                    <div class="error">
                        <span id="dob-error"></span>
                    </div>
                </div>
                <HR></HR>
                <input type="submit" id="submit" value="Insert_Student">
            </form>
        </div>
        <div class="student-data">
            <div class="student-tabel">
                <table id='student-data' style="width: auto" class="table table-success table-striped table-hover">
                    <thead calss="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>photo</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Standard</th>
                            <th>Class</th>
                            <th>Activites</th>
                            <th>Mobile</th>
                            <th>Email ID</th>
                            <th>Date of Birth</th>
                            <th>Created</th>
                            <th>Modify</th>
                            <th colspan=2> Operation</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">

                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
   <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Your custom script -->
<script>
    

    function StudentLoad()
    {
        $.ajax({
            url: "{{ route('student.get') }}",
            type: "GET",
            data: "json" ,
            success : function(data){
                let rows = '';
                data.forEach(function(student){
                    rows += `<tr>
                                <td>${student.id}</td>
                                <td><img src="${student.photo_url}" alt="Profile Image"  width="50" height="50" /> </td>
                                <td>${student.name}</td>
                                <td>${student.gender}</td>
                                <td>${student.std}</td>
                                <td>${student.class}</td>
                                <td>${student.activity}</td>
                                <td>${student.mobile}</td>
                                <td>${student.email_id}</td>
                                <td>${student.dob}</td>
                                <td>${student.created}</td>
                                <td>${student.updated}</td>
                                <td><a href="#" data-id="${student.id}" class="btn btn-secondary edit-btn">Edit</a></td>
                                <td><a href="#" data-id="${student.id}" class="btn btn-danger delete-btn">Delete</a></td>
                                </tr>`;
                });
                $('#table-body').html(rows);
            }
        });
    }

   

$(document).ready(function() {
    console.log("jQuery is working!");

    StudentLoad(); // function call
    $('#student-form').submit(function(e) {
        e.preventDefault();

        // clear old error 
        $('#photo-error').text('');
        $('#name-error').text('');
        $('#gender-error').text('');
        $('#std-error').text('');
        $('#class-error').text('');
        $('#activity-error').text('');
        $('#mobile-error').text('');
        $('#email_id-error').text('');
        $('#dob-error').text('');

        let formData = new FormData(this);

        let btn = $('#submit').val();

        // if(btn == 'Update_Student')
        // {
        //     alert('insert');
        //     console.log("inasert button");
        // }
        // else if(btn == 'Insert_Student')
        // {
        //     alert('update');
        //     console.log("update button");
        // }
        // else
        // {
        //     alert('undefine');
        //     console.log("not a toll");
        // }

        if($('#submit').val() == 'Insert_Student')
        {
            let url = "{{ route('student.submit')}}";
            $.ajax({
            
                url: url,
                type:"POST",
                data: formData,
                processData: false, // don't process into query string
                contentType: false, // let browser set multipart/form-data
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json' // <-- tell Laravel to return JSON
                },
                success: function(response){
                    if(response.success){
                        alert(response.message);
                        $('#student-form')[0].reset();
                        StudentLoad();
                    } else {
                        alert("logout");
                        window.location.href="/monarchy/login";
                    }
                },
                error: function(xhr){
                    let errors = xhr.responseJSON?.errors || {};

                    $('#photo-error').text(errors.photo ? errors.photo[0] : '');
                    $('#name-error').text(errors.name ? errors.name[0] : '');
                    $('#gender-error').text(errors.gender ? errors.gender[0] : '');
                    $('#std-error').text(errors.std ? errors.std[0] : '');
                    $('#class-error').text(errors.class ? errors.class[0] : '');
                    $('#activity-error').text(errors.activity ? errors.activity[0] : '');
                    $('#mobile-error').text(errors.mobile ? errors.mobile[0] : '');
                    $('#email_id-error').text(errors.email_id ? errors.email_id[0] : '');
                    $('#dob-error').text(errors.dob ? errors.dob[0] : '');
                }
            });
        }
        else if($('#submit').val() == 'Update_Student')
        {
            // $('student-form').html('@method("PUT")');
            let id = $('#id').val();
            $.ajax({            
                url: `student/${id}`,
                type:"POST",
                data: formData,
                processData: false, // don't process into query string
                contentType: false, // let browser set multipart/form-data
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json' // <-- tell Laravel to return JSON
                },
                success: function(response){
                    if(response.success){
                        alert(response.message);
                        $('#student-form')[0].reset();
                        $('#id').val('');
                        $('#photo-text').text('');
                        $('#submit').val('Insert_Student');
                        StudentLoad();
                    } else {
                        alert('logout');
                        window.location.href = '/monarchy/login/'
                    }
                },
                error: function(xhr){
                    let errors = xhr.responseJSON?.errors || {};

                    $('#photo-error').text(errors.photo ? errors.photo[0] : '');
                    $('#name-error').text(errors.name ? errors.name[0] : '');
                    $('#gender-error').text(errors.gender ? errors.gender[0] : '');
                    $('#std-error').text(errors.std ? errors.std[0] : '');
                    $('#class-error').text(errors.class ? errors.class[0] : '');
                    $('#activity-error').text(errors.activity ? errors.activity[0] : '');
                    $('#mobile-error').text(errors.mobile ? errors.mobile[0] : '');
                    $('#email_id-error').text(errors.email_id ? errors.email_id[0] : '');
                    $('#dob-error').text(errors.dob ? errors.dob[0] : '');
                }
            });
        }

    });

    // show selected data
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();
        edit_id=$(this).data('id');
        $.ajax({
            url: `student/${edit_id}`,
            type: "GET",
            success: function(response){
                $('#id').val(response.id);
                let photo_text = response.photo.split('/').pop() || '';
                $('#photo-text').text(photo_text);
                $('#name').val(response.name);
                // gender
                response.gender == 'Male' ? $('#male').prop('checked', true) : 
                response.gender == 'Female' ? $('#female').prop('checked', true) : 
                response.gender == 'Other' ? $('#other').prop('checked', true) : '';
                $('#std').val(response.std);
                $('#class').val(response.class);
                //activity
                let activities = response.activity ? response.activity.split(','): [];
                activities.forEach(function(act){
                    $('input[name="activity[]"][value="' + act.trim() + '"]').prop('checked', true);
                });
                $('#mobile').val(response.mobile);
                $('#email_id').val(response.email_id);
                $('#dob').val(response.dob);

                $('#submit').val('Update_Student');
            }   
        });
    }); 

    // Delete student

    $(document).on('click', '.delete-btn', function(e){
        let id = $(this).data('id');
        if(confirm('Are you sure want to Delete')){
            // alert('delete');
            $.ajax({
                url: `student/${id}`,
                type : "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json' // <-- tell Laravel to return JSON
                },
                success : function(response){
                    if(response.success){
                        alert(response.message);
                        StudentLoad();
                    }
                    else
                    {
                        alert('Logout');
                        window.location.href = '/monarchy/login';
                    }
                }
            });
        }
        else{
            
        }
    });
});
</script>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> -->
<!-- jquery link  -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
<!-- jQuery CDN -->

</body>
</html>