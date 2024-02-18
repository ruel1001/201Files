<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::orderBy('department_id', 'asc')->get();

        return view('department.department', [
            'department' => $department
        ]);
    }

    public function create()
    {
        return view('department.department-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_name' => 'required',
            'department_status' => 'required'


        ]);
        $department = Department::create($request->all());

        Alert::success('Success', 'Department has been saved !');
        return redirect('/department');
    }

    public function getDepartmentTypes()
    {
        $documentTypes = Department::orderBy('department_id', 'asc')->get();
        return response()->json($documentTypes);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function edit($department_id)
    {
        $department = Department::findOrFail($department_id);

        return view('department.department-edit', [
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $department_id)
    {
        $validated = $request->validate([
            'department_name' => 'required',
            'department_status' => 'required',


        ]);
        $department = Department::findOrFail($department_id);
        $department->update($validated);

        Alert::info('Success', 'Department Type has been updated !');
        return redirect('/department');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($department_id)
    {
        try {
            $department = Department::findOrFail($department_id);

            $department->delete();

            Alert::error('Success', 'Department has been deleted !');
            return redirect('/department');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Department Type  deleted,!');
            return redirect('/department');
        }
    }

}