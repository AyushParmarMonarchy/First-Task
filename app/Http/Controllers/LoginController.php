<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registrationrequest;
use App\Http\Requests\loginrequest;
use App\Http\Requests\forgotrequest;
// use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\login;



class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $time = session('login-time')->diffInMinutes(now());
        // echo $time ."<br>";
        // if(!session()->has('login'))
        // {
        //     echo 'Log Out';
        // }
        // else{
        //     $name = session('login');
        //     echo $name ;
        // }
        return view('index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(registrationrequest $request)
    {
        $hashpassword = Hash::make($request->password);
        login::create([
            'first'=>$request->first,
            'last'=>$request->last,
            'email_id'=>$request->email_id,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
            'password'=>$hashpassword,
        ]);
        return redirect()->route('login')->with(['success','Registration success..']);
    }

    //check login logic
    public function check(loginrequest $request)
    {
        if($request->submit === 'Forgot Password')
        {
            // dd($request->all());
            $user = login::where('email_id',$request->username)->orWhere('mobile',$request->username)->first();
            if(!$user)
            {
                return back()->withErrors(['login'=>'User Not Found..'])->withInput();
            }
            else
            {
                $username = $user->id;
                session(['username'=> $username]);
                // return view('login.forgot');
                return redirect()->route('forgot.view');
            }
        }
        elseif($request->submit === 'Login')
        {
        
            $user = login::where('email_id',$request->username)->orWhere('mobile',$request->username)->first();
            // if($user->isEmpty())
            if(!$user)
            {
                return back()->withErrors(['login'=>'User Not Found..'])->withInput();
            }
            else
            {
                if(Hash::check($request->password,$user->password))
                {
                    auth()->login($user);
                    session(['login'=>$user->first,'login-time'=>now()]);
                    return redirect()->route('home');
                }
                else
                {
                    return back()->withErrors(['login'=>'Password does not match..'])->withInput();
                }
            }
        }
    }

    // logout user 
    public function logout()
    {
        auth()->logout();
        Session()->forget(['login','status']);
        return redirect()->route('home');
    }

    // forgot password show
    public function view()
    {
        return view('login.forgot');
    }

    //update Password logic
    public function password_update(forgotrequest $request)
    {
        $id = session('username');
        $user = login::findOrFail($id);
        // dd($request->all(), $user->password);

        if(Hash::check($request->old_password,$user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('login');
        }
        else
        {
            return back()->withErrors(['forgot'=>'Old Password is invalid'])->withInput();
        }


    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = auth()->user()->id;
        $user = login::findOrFail($id);
        return view('user.profile',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
    */
    public function edit()
    {
        $id = auth()->user()->id;
        $user = login::findOrFail($id);
        return view('user.edit',compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $request->validate([
            'first' => 'required|string|max:20|regex:/^[A-Za-z\s]+$/',
            'last' => 'required|string|max:20|regex:/^[A-Za-z\s]+$/',
            'email_id' => 'required|email|unique:logins,email_id,'.$id,
            'mobile' => 'required|integer|digits:10|unique:logins,mobile,'.$id,
            'gender' => 'required',
            // 'dob' => 'required|date|before:2006-01-01', // specific date 
            'dob' => 'required|date|before:'.now()->subYears(18)->format('Y-m-d'), // validation of current date to 18 years 
        ]);

        $user = login::findOrFail($id);

        $user->first = $request->first;
        $user->last = $request->last;
        $user->email_id = $request->email_id;
        $user->mobile = $request ->mobile ;
        $user->gender = $request ->gender ;
        $user->dob = $request->dob;

        $user->save();

        return redirect()->route('profile');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function test()
    {
        $hash = Hash::make('aYush@123');
        // Session:: put('hash',$hash);

        return $hash;
    }

    public function test2()
    {
        $hash = Session::get('hash');
        if(Hash::check('Ayush@123',$hash))
        {
            return '<br>match' ;
        }
        else
        {
            return '<br>not match' ;
        }
    }
}
