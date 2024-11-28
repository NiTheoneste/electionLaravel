<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Senator;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SenatorController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware(middleware:'auth')];
    }

    public function showHome(){
        $senators = Senator::all();
        return view('senator/senator_home', ['senators' => $senators]);
    }

    public function showAddPage(){
        $states = State::all();
        $parties = Party::all();
        return view('senator/senator_add', ['states'=>$states, 'parties'=>$parties]);
    }

    public function createAndAdd(Request $request){
        $request->validate([
            //fields from senator form
            'first_name'=>['required', 'max:20', 'min:3'/*,'unique:senators'*/],
            'last_name'=>['required', 'max:20', 'min:3'],
            'age'=>'required|integer|min:1',
            'gender'=>['required'],
            'state'=>['required'],
            'party'=>['required']
        ]);
        Senator::create([
            //fields from DB => fields from form
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'state_id'=>$request->state,
            'party_id'=>$request->party
        ]);
        return redirect('/senators')->with('success', "Senator recorded");
    }

    public function showEditPage($pk){
        $senator = Senator::findOrFail($pk);
        $states = State::all();
        $parties = Party::all();
        return view('senator/senator_edit', ['senator'=>$senator, 'states'=>$states, 'parties'=>$parties]);
    }

    public function update(Request $request, $pk){
        $request->validate([
            //fields from senator form
            'first_name'=>['required', 'max:20', 'min:3'/*,'unique:senators'*/],
            'last_name'=>['required', 'max:20', 'min:3'],
            'age'=>'required|integer|min:1',
            'gender'=>['required'],
            'state'=>['required'],
            'party'=>['required']
        ]);
        $senator = Senator::find($pk);
        $senator->first_name = $request->first_name;
        $senator->last_name = $request->last_name;
        $senator->age = $request->age;
        $senator->gender = $request->gender;
        $senator->state_id = $request->state;
        $senator->party_id = $request->party;
        $senator->update();
        return redirect('/senators')->with('success', "Senator successfully updated");
    }

    public function delete($pk){
        $senator = Senator::find($pk);
        $senator->delete();
        return redirect('/senators')->with('success', "Senator deleted successfully");
    }
}
