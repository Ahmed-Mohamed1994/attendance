<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Http\Requests\reguestAttend;
use App\user_attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['dashboard']);
    }

    public function index(){
        return view('welcome');
    }

    public function store(reguestAttend $request){
        $user_exsit = user_attendance::where('code',$request->code)->first();
        if (!$user_exsit){
            return redirect()->route('home')->with(['message_err' => 'Wrong Code!']);
        }
        Attendance::create([
            'code' => $request->code,
            'status' => $request->attendance_status
        ]);
        return redirect()->route('home')->with(['message' => 'Thank You!']);
    }

    public function dashboard(){
        $users = Attendance::all();
        return view('dashboard', compact('users'));
    }

}
