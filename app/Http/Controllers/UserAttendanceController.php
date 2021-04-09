<?php

namespace App\Http\Controllers;

use App\Http\Requests\addUserRequest;
use App\Http\Requests\editUserRequest;
use App\Mail\userCode;
use App\user_attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserAttendanceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $users = user_attendance::All();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }


    public function store(addUserRequest $request)
    {
        $new_code = mt_rand(100000, 999999);
        while (user_attendance::where('code',$new_code) ->first()){
            $new_code = mt_rand(100000, 999999);
        }

        $user = user_attendance::create([
            'name' => $request->name,
            'email' => $request->email,
            'code' => $new_code
        ]);

        // send email to user by code
//        Mail::to($user)->send(new userCode($user));

        return redirect()->route('users')->with(['message' => 'User successfully created!']);
    }

    public function edit($user)
    {
        $user = user_attendance::find($user);

        return view('users.update', compact('user'));
    }

    public function update($user, editUserRequest $request)
    {
        $user = user_attendance::find($user);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('users')->with(['message' => 'User Successfully Updated.']);
    }

    public function destroy($user)
    {
        user_attendance::find($user)->delete();

        return redirect()->route('users')->with(['message' => 'User Successfully deleted.']);
    }

}
