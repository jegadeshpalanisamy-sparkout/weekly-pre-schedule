<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWeekRequest;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeekController extends Controller
{
    
    public function index(){
        $weeks=Week::all();
        return view('week.index',compact('weeks'));
    }

    public function WeekForm(){
        return view('week.add-week');
    }

    public function storeWeek(StoreWeekRequest $request){
        try {
            $validateData = $request->validated();
           $data = Week::create($validateData);
           if($data){
            return redirect()->route('week')->with('success', 'Week created successfully!');
           }
           return redirect()->back()->with('error', 'Week was not created!');

        } catch(\Exception $e) {
            Log::error('Error creating week: ' . $e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while creating the week.');
        }
    }

    public function edit($id)
    {
        try {
            $week = Week::findOrFail($id);
            return view('week.edit', compact('week'));
        } catch (\Exception $e) {
            Log::error('Error fetching week: ' . $e->getMessage());
            return redirect()->route('week')->with('error', 'Week not found.');
        }
    }

    public function update(StoreWeekRequest $request, $id)
    {
        try {
            $validateData = $request->validated();
            $week = Week::findOrFail($id);    
            $week->update($validateData);

            return redirect()->route('week')->with('success', 'Week updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating week: ' . $e->getMessage());
            return redirect()->route('week.edit', $id)->with('error', 'Failed to update the week.');
        }
    }

    public function destroy($id)
    {
        try {
            $week = Week::findOrFail($id);
            $week->delete();

            return redirect()->route('week')->with('success', 'Week deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting week: ' . $e->getMessage());
            return redirect()->route('week')->with('error', 'Failed to delete the week.');
        }
    }
}
