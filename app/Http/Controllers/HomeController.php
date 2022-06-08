<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '0')
            {
                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
            }else{
                return view('admin.home');
            }
        }else{
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }else {
        $doctor = Doctor::all();
        return view('user.home',compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new Appointment();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->date = $request->input('date');
        $data->phone = $request->input('number');
        $data->message = $request->input('message');
        $data->doctor = $request->input('doctor');
        $data->status = 'In Progress';

        if(Auth::id())
        {
        $data->user_id = Auth::user()->id;
        }

        $data->save();
        return redirect()->back()->with('message','Succssesfully . Wait That Connect Your Doctor');
    }

    public function myapppointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appoint = appointment::where('user_id',$userid)->get();
        return view('user.my_apppointment',compact('appoint'));
        }else {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);

        $data->delete();
        return redirect()->back();
    }
}
