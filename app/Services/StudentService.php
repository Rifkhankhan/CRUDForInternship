<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentService{
    public static function create(){
        return view('add');
    }

    public static function index()
    {
        $students = Student::all();
        return $students;
    }


    public static function person($id)
    {
        $student = Student::where('id', $id)->first();
        // return view('edit', compact('student'));

        return $student;
    }


    // public static function view($id)
    // {
    //     $student = Student::where('id', $id)->first();
    //     return view('view', compact('student'));
    // }

    public static function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|gt:0',
            'image' => "required|mimes:jpg,jpeg,png"

        ]);

        $brand_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $image_extendtion = strtolower($brand_image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $image_extendtion;
        $up_location = 'image/';
        $last_img = $up_location . $image_name;
        $brand_image->move($up_location, $image_name);

        $Product = DB::table('students')->insert([
            'name' => $request->name,
            'status' => $request->status,
            'age' => $request->age,
            'image' => $last_img,
        ]);


        return redirect()->route('home')->with('success', 'successfully inserted');
    }

    public static function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|gt:0',
            'status' => 'required'
        ]);

        $oldimage = $request->oldimage;
        $brand_image = $request->file('image');
        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $image_extendtion = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $name_gen . '.' . $image_extendtion;
            $up_location = 'image/';
            $last_img = $up_location . $image_name;
            $brand_image->move($up_location, $image_name);

            unlink($oldimage);
            Student::find($id)->update([
                'name' => $request->name,
                "image" => $last_img,
                "age" => $request->age,
                "status" => $request->status,
            ]);

            return redirect()->route('home')->with('success', 'successfully updated');
        } else {
            Student::find($id)->update([
                'name' => $request->name,
                "age" => $request->age,
                "status" => $request->status,
            ]);

            return redirect()->route('home')->with('success', 'successfully updated');
        }
    }

    public static function changeStatus( $id)
    {

        $student = Student::find($id);

        if ($student->status === 'active') {
            Student::find($id)->update([
                'status' => 'inactive',
            ]);
            return Student::find($id)->status;
        } else if ($student->status === 'inactive') {
            Student::find($id)->first()->update([
                'status' => 'active',
            ]);
            return Student::find($id)->status;
        } else {
            return redirect()->route('home')->with('success', 'Failed updated status ');
        }
    }

    public static function delete($id)
    {
        $image = Student::find($id)->image;
        unlink($image);

        Student::where('id', $id)->delete();

   
    }


}