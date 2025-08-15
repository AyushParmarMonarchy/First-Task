<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\UserLogin;

// add middleware group 
Route::middleware('web')->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::get('/monarchy',function() {
        return view('index');
    })->name('monarchy');

    Route::get('/monarchy/home',[LoginController::class,'index'])->name('home');

    //Login Page show 
    Route::get('/monarchy/login',function(){
        // if(!session()->has('status'))
        //     {
        //         echo 'Log Out';
        //     }
        //     else{
        //         $name = session('login');
        //         echo $name ;
        //     }
        echo session('username');
        return view('login.login');
    })->name('login');
    //Login Check
    Route::post('/monarchy/login/submit',[LoginController::class,'check'])->name('login.submit');
    //logout
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    
    //show forgot password view
    Route::get('/monarchy/login/forgot-view',[LoginController::class,'view'])->name('forgot.view');
    //update password 
    Route::post('/monarchy/login/password-update',[LoginController::class,'password_update'])->name('password_update');
    


    //Registration Page
    Route::get('/monarchy/registration',[LoginController::class,'create'])->name('registration');
    //Registration submit
    Route::post('/monarchy/registration/submit',[LoginController::class,'store'])->name('registration.submit');



    //see the user data - Profile 
    Route::get('/monarchy/profile',[LoginController::class,'show'])->name('profile');
    //see profile - user data edit form
    Route::get('/monarchy/profile/edit',[LoginController::class,'edit'])->name('profile.edit');
    // Update the user data - profile
    Route::post('/monarchy/profile/update',[LoginController::class,'update'])->name('profile.update'); 


    /////////////////////////////////////////STUDENT ROUTES///////////
    //////////////////////////////////////////////////////////////////
    Route::get('/student',[StudentController::class,'index'])->name('student.home');
    Route::post('/student',[StudentController::class,'store'])->name('student.submit');
    Route::get('/student/get',[StudentController::class,'show'])->name('student.get');
    Route::get('/student/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::post('/student/{id}',[StudentController::class,'update'])->name('student.update');
    Route::delete('/student/{id}',[StudentController::class,'delete'])->name('student.delete');




    //TEST ROUTES.  ///////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    Route::get('/test',[LoginController::class,'test']);
    Route::get('/test2',[LoginController::class,'test2'])->name('test2');
});