<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\PresElector;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PresElectorController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware(middleware:'auth')];
    }

    public function showHome(){
        $pres_electors = PresElector::all(); 
        return view('preselector/preselector_home', ['pres_electors' => $pres_electors]);
    }

    public function showAddPage(){
        $states = State::all();
        $parties = Party::all();
        return view('preselector/preselector_add', ['states' => $states, 'parties' => $parties]);
    }

    public function createAndAdd(Request $request){
        $request->validate([
            //fields from pres_elector form
            'first_name'=>['required', 'max:20', 'min:3'/*,'unique:pres_electors'*/],
            'last_name'=>['required', 'max:20', 'min:3'],
            'age'=>'required|integer|min:1',
            'gender'=>['required'],
            'state'=>['required'],
            'party'=>['required']
        ]);
        PresElector::create([
            //fields from DB => fields from form
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'state_id'=>$request->state,
            'party_id'=>$request->party
        ]);
        return redirect('/presElector')->with('success', "Presidential Elector recorded");
    }

    public function showEditPage($pk){
        $pres_elector = PresElector::findOrFail($pk);
        $states = State::all();
        $parties = Party::all();
        return view('preselector/preselector_edit', ['pres_elector' => $pres_elector, 'states' => $states, 'parties' => $parties]);
    }

    public function update(Request $request, $pk){
        $request->validate([
            'first_name'=>['required', 'max:20', 'min:3'],
            'last_name'=>['required', 'max:20', 'min:3'],
            'age'=>'required|integer|min:1',
            'gender'=>['required'],
            'state'=>['required'],
            'party'=>['required']
        ]);
        $pres_elector = PresElector::find($pk);
        $pres_elector->first_name = $request->first_name;
        $pres_elector->last_name = $request->last_name;
        $pres_elector->age = $request->age;
        $pres_elector->gender = $request->gender;
        $pres_elector->state_id = $request->state;
        $pres_elector->party_id = $request->party;
        $pres_elector->update();
        return redirect('/presElector')->with('success', "Presidential Elector successfully updated");
    }

    public function showDeletePage(){
        return view('preselector/preselector_delete');
    }

    public function delete($pk){
        $pres_elector = PresElector::find($pk);
        $pres_elector->delete();
        return redirect('/presElector')->with('success', "Presidential Elector deleted successfully");
    }
}
