<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;

class UserController extends Controller
{
    // Fetch data from the database and display it
    public function fetch()
    {
        $data = Userdata::all();
        return view('data', ['data' => $data]);
    }

    // Insert new student record
    public function insert(Request $req)
    {
        $student = new Userdata();
        $student->fname = $req->fname;
        $student->lname = $req->lname;
        $student->email = $req->email;
        $student->age = $req->age;

        if ($student->save()) {
            session()->flash('message', 'Student Inserted successfully');
            session()->flash('alert-type', 'success');
            return redirect('/data');
        }
    }

    // Delete student record by id
    public function delete($id)
    {
        $student = Userdata::find($id);
        if ($student) {
            $student->delete();
            session()->flash('message', 'Student deleted successfully');
            session()->flash('alert-type', 'success');
        } else {
            session()->flash('message', 'Student Not Found');
            session()->flash('alert-type', 'error');
        }

        return redirect('/data');
    }

    // Show student details for update
    public function update($id)
    {
        $data = Userdata::find($id);
        return view('update', ['data' => $data]);
    }

    // Update student record
    public function updateStudent($id, Request $req)
    {
        $student = Userdata::find($id);
        $student->fname = $req->fname;
        $student->lname = $req->lname;
        $student->email = $req->email;
        $student->age = $req->age;

        if ($student->save()) {
            session()->flash('message', 'Student Updated successfully');
            session()->flash('alert-type', 'success');
            return redirect('/data');
        }
    }
}
