<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\studentrequest;
use App\Models\student;
class StudentController extends Controller
{

    public function login_check()
    {
        if(session()->has('login-time'))
        {
            if(session('login-time')->diffInMinutes(now())>=5)
            {
                session()->forget(['login','login-time']);
            }
            if(!session()->has('login'))
            {
                auth()->logout();
                return false;                
            }
            else
            {
                return true;
            }
        }
        else{
            return false;
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = '';
        $data = '';

        return view('student.student',compact('student','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(studentrequest $request)
    {
        $check= $this->login_check(); //function call
        if($check == true)
        {
            if($request->hasFile('photo'))
            {
                $photo = $request->file('photo');
                $imageName = now()->format('YmdHis') . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('images', $imageName, 'public');

            }
            
            $validate = $request->all();
            $activity = implode(',', $validate['activity']);
            $user = student::create([
                'photo' => $imageName ,
                'name' => $request->name,
                'gender' => $request->gender,
                'std' => $request->std,
                'class' => $request->class,
                'activity' => $activity, 
                'mobile' => $request->mobile,
                'email_id' => $request->email_id,
                'dob' => $request->dob,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Student is inserted',
                'data' => $user 
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'You are logout' ,
                'data' => 'please Login ',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $student = student::orderBy('id','desc')->get();
        foreach ($student as $students) {
            // Convert DB filename to full public URL
            $students->photo_url = asset('storage/images/' . $students->photo);
            $students->created = $students->created_at->format('d-m-Y h:i A');
            $students->updated = $students->updated_at->format('d-m-Y h:i A');
        }
        return response()->json($student);
        if($request->hasFile('photo'))
        {
            $image = $request->file('photo')->store('images','public');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = student::findOrFail($id);
        
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $check= $this->login_check(); //function call
        if($check == true)
        {
            $request->validate([
                'photo'       => 'image|mimes:jpeg,png,jpg,gif|max:2048', // image file, max 2MB
                'name'        => 'required|string|max:255',
                'gender'      => 'required', // only these values allowed
                'std'         => 'required|integer|min:1|max:12', // class standard 1-12
                'class'       => 'required|string|max:10',
                'activity'    => 'required|array|min:1',
                'activity.*'  => 'string|max:50',
                'mobile'      => 'required|digits:10|numeric|unique:students,mobile,'.$id,
                'email_id'    => 'required|email|max:255|unique:students,email_id,'.$id,
                'dob'         => 'required | date | before:'.now()->subYears(5)->format('Y-m-d'),
            ]);
            $student = student::findOrFail($id);

            if($request->hasFile('photo'))
            {
                if ($student->photo && Storage::disk('public')->exists('images/'.$student->photo)) {
                    Storage::disk('public')->delete('images/'.$student->photo);
                }
                $photo = $request->file('photo');
                $imageName = now()->format('YmdHis') . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('images', $imageName, 'public');
                $student->photo = $imageName ;
            }
            $activity = implode(',', $request['activity']);


            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->std = $request->std;
            $student->class = $request->class;
            $student->activity = $activity;
            $student->mobile = $request->mobile;
            $student->email_id = $request->email_id;
            $student->dob = $request->dob;

            $student->save();

            return response()->json([
                'success' => true,
                'message' => 'Update Successfully',
                'data' => $student,
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'You are logout' ,
                'data' => 'please Login ',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $check= $this->login_check(); //function call
        if($check == true)
        {
            $student = student::findOrFail($id);
            if ($student->photo && Storage::disk('public')->exists('images/'.$student->photo)) {
                Storage::disk('public')->delete('images/'.$student->photo);
            }
            $student->delete();
            return response()->json([
                'success'=>true,
                'message'=> 'Delete successfull',
                'data' => $student
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'You are logout' ,
                'data' => 'please Login ',
            ]);
        }
    }
}
