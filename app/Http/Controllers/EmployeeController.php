<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index(){
        $employees=Employee::with('team')->get();
        return view('employee.index',compact('employees'));
    }

    public function employeeForm(){
        $teams = Team::all();
        return view('employee.add-employee',compact('teams'));
    }


    public function storeEmployee(StoreEmployeeRequest $request){
        try {
            $validateData = $request->validated();
            $data = Employee::create($validateData);
            if($data){
                return redirect()->route('employee')->with('success', 'employee created successfully!');
            }
            return redirect()->back()->with('error', 'employee was not created!');

        } catch(\Exception $e) {
            Log::error('Error creating employee: ' . $e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while creating the employee.');
        }
    }


    public function edit($id)
    {
        try {
            $teams=Team::all();
            $employee = Employee::findOrFail($id);
            return view('employee.edit', compact('employee','teams'));
        } catch (\Exception $e) {
            Log::error('Error fetching employee: ' . $e->getMessage());
            return redirect()->route('employee')->with('error', 'employee not found.');
        }
    }

    public function update(StoreEmployeeRequest $request, $id)
    {
        try {
            $validateData = $request->validated();
            $employee = Employee::findOrFail($id);
            $employee->update($validateData);

            return redirect()->route('employee')->with('success', 'employee updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating employee: ' . $e->getMessage());
            return redirect()->route('employee.edit', $id)->with('error', 'Failed to update the employee.');
        }
    }


    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return redirect()->route('employee')->with('success', 'employee deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting employee: ' . $e->getMessage());
            return redirect()->route('employee')->with('error', 'Failed to delete the employee.');
        }
    }
    
}
