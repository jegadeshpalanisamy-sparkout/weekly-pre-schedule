<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    
    public function index() {
        $teams = Team::all();
        return view('team.index',compact('teams'));

    }

    public function teamForm(){
        return view('team.add-team');
    }

    public function storeTeam(Request $request){
        try {
            $validatedData = $request->validate([
                'team_name' => 'required|string|max:255',
            ]);
            $data = Team::create([
                'team_name' => $validatedData['team_name'],
            ]);
           if($data){
            return redirect()->route('team')->with('success', 'team created successfully!');
           }
           return redirect()->back()->with('error', 'team was not created!');

        } catch(\Exception $e) {
            Log::error('Error creating team: ' . $e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while creating the team.');
        }
    }


    public function edit($id)
    {
        try {
            $team = Team::findOrFail($id);
            return view('team.edit', compact('team'));
        } catch (\Exception $e) {
            Log::error('Error fetching team: ' . $e->getMessage());
            return redirect()->route('team')->with('error', 'team not found.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'team_name' => 'required|string|max:255',
            ]); 
            $team = Team::findOrFail($id);
            $team->update($validatedData);

            return redirect()->route('team')->with('success', 'team updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating team: ' . $e->getMessage());
            return redirect()->route('team.edit', $id)->with('error', 'Failed to update the team.');
        }
    }

    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            $team->delete();

            return redirect()->route('team')->with('success', 'team deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting team: ' . $e->getMessage());
            return redirect()->route('team')->with('error', 'Failed to delete the team.');
        }
    }

}
