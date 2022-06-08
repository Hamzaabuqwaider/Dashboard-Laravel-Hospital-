<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new Doctor();

        $image = $request->file;
        $image_name = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$image_name);
        $doctor->image=$image_name;

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $doctor->save();

        return redirect()->back()->with('status','Dcotor Added Succsessfully');
    }

    public function showappintment()
    {
        $Appointment = Appointment::all();
        return view('admin.show_appintment',compact('Appointment'));
    }

    public function Approvaled($id)
    {
        $approve = Appointment::find($id);
        $approve->status = 'Approved';
        $approve->save();
        return redirect()->back()->with('message','Status Is Updated');
    }

    public function Canceled($id)
    {
        $canceled = Appointment::find($id);
        $canceled->status = 'Canceld';
        $canceled->save();
        return redirect()->back()->with('message','Status Is Updated');
    }
}
