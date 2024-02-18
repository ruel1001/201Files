<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $faculty = Faculty::orderBy('first_name', 'asc')->get();

        return view('faculty.faculty', [
            'faculty' => $faculty
        ]);
    }

    public function create()
    {
        return view('faculty.faculty-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'sex' => 'required',
            'civil_status' => 'required',
            'citizenship' => 'required',
            'gsis_id' => 'required',
            'pag_ibig_id' => 'required',
            'sss_id' => 'required',
            'resid_add' => 'required',
            'mobile_no' => 'required',
            'tin' => 'required',
            'department' => 'required',
            'status' => 'required',
            'email' => 'required|unique:users',

        ]);

        $validated2 = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);

        $validated2 = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'

        ]);


        $validated['password'] = Hash::make($request['password']);
        $faculty = Faculty::create($request->all());


        $user = new User();
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->user_type = 'faculty';
        $user->save();



        Alert::success('Success', 'Faculty has been saved !');
        return redirect('/faculty');
    }

    /**
     * Display the specified resource.
     */




     public function profile($email)
     {
         $faculty = Faculty::where('email', $email)->firstOrFail();
         return view('faculty.faculty-profile', [
             'faculty' => $faculty,
         ]);
     }






    public function edit($employee_id)
    {
        $faculty = faculty::findOrFail($employee_id);

        return view('faculty.faculty-edit', [
            'faculty' => $faculty,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $employee_id)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'sex' => 'required',
            'civil_status' => 'required',
            'citizenship' => 'required',
            'gsis_id' => 'required',
            'pag_ibig_id' => 'required',
            'sss_id' => 'required',
            'resid_add' => 'required',
            'mobile_no' => 'required',
            'tin' => 'required',
            'department' => 'required',
            'status' => 'required',
            'email' => 'required|unique:users',
        ]);

        $validated2 = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);

        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);






        $faculty = Faculty::findOrFail($employee_id);
        $validated['password'] = Hash::make($request['password']);
        $faculty->update($validated);


        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password =   $validated['password'] ;
        $user->user_type = 'faculty';
        $user->save();


        Alert::info('Success', 'Faculty has been updated !');
        return redirect('/faculty');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($employee_id)
    {
        try {
            $faculty = Faculty::findOrFail($employee_id);

            $faculty->delete();

            Alert::error('Success', 'Faculty has been deleted !');
            return redirect('/faculty');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Faculty deleted, Barang already used !');
            return redirect('/faculty');
        }
    }
}