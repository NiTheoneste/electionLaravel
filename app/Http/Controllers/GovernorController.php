<?php

namespace App\Http\Controllers;

use App\Models\Governor;
use App\Models\Party;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GovernorController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware(middleware:'auth')];        
    }

    public function showHome(){
        $governors = Governor::all();
        return view('governor/governor_home', ['governors'=>$governors]);
    }

    public function showAddPage(){
        $states = State::all();
        $parties = Party::all();
        return view('governor/governor_add', ['states'=>$states, 'parties'=>$parties]);
    }

    public function createAndAdd(Request $request){
        $request->validate([
            'first_name'=>['required', 'max:20', 'min:3'],
            'last_name'=>['required', 'max:20', 'min:3'],
            'age'=>'required|integer|min:1',
            'gender'=>['required'],
            'state'=>['required'],
            'party'=>['required']
        ]);
        Governor::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'state_id'=>$request->state,
            'party_id'=>$request->party
        ]);
        return redirect('/governor')->with('success', "Governor recorded");
    }

    public function showEditPage($pk){
        $governor = Governor::Find($pk);
        $states = State::all();
        $parties = Party::all();
        return view('governor/governor_edit', ['governor'=>$governor, 'states'=>$states, 'parties'=>$parties]);
    }

    public function update(Request $request, $pk){
        $request->validate([
            //fields from governor form
            'first_name'=>['required', 'max:20', 'min:3'],
            'last_name'=>['required', 'max:20', 'min:3'],
            'age'=>'required|integer|min:1',
            'gender'=>['required'],
            'state'=>['required'],
            'party'=>['required']
        ]);
        $governor = governor::find($pk);
        $governor->first_name = $request->first_name;
        $governor->last_name = $request->last_name;
        $governor->age = $request->age;
        $governor->gender = $request->gender;
        $governor->state_id = $request->state;
        $governor->party_id = $request->party;
        $governor->update();
        return redirect('/governor')->with('success', "governor successfully updated");
    }

    public function showDeletePage($pk){
        return view('governor/governor_delete');
    }

    public function delete($pk){
        $governor = Governor::find($pk);
        $governor->delete();
        return redirect('/governor')->with('success', "Senator deleted successfully");
    }
}
