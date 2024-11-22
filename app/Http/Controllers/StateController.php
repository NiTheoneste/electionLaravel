<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StateController extends Controller
{
    public function showHome(){
        $states = State::all();
        return view('state/state_home', ['states' => $states]);
    }

    public function showAddPage(){
        $flags = Flag::all();
        return view('state/state_add', ['flags' => $flags]);
    }

    public function createAndAdd(Request $request){
        $request->validate([
            //fields from state form
            'state_code'=>['required', 'min:2', 'max:2'],
            'state_name'=>['required', 'min:3', 'max:20'],
            'flag_image'=>'required',
            'gdp'=>'required',
            'area'=>'required',
            'population'=>'required|integer'
        ]);

        $filename = time(). '.' .$request->flag_image->extension();
        $imageUrl = $request->file('flag_image')->storeAs(
        'FlagImages',
        $filename,
        'public');

        $state = State::create([
            //fields from DB => fields from form
            'code'=>$request->state_code,
            'name'=>$request->state_name,
            'gdp'=>$request->gdp,
            'area'=>$request->area,
            'population'=>$request->population
        ]);

        $flag = new Flag();
        $flag->imageUrl	 = $imageUrl;
        $state->flag()->save($flag);
        return redirect('/state')->with('success', "State recorded");
    }

    public function showEditPage($pk){
        $state = State::findOrFail($pk);
        return view('state/state_edit', ['state'=>$state]);
    }

    public function update(Request $request, $pk){
        $request->validate([
            //fields from state form
            'state_code'=>['required', 'min:2', 'max:2'],
            'state_name'=>['required', 'min:3', 'max:20'],
            'gdp'=>'required',
            'area'=>'required',
            'population'=>'required|integer'
        ]);

        $state = State::find($pk);
        $state->code = $request->state_code;
        $state->name = $request->state_name;
        if ($request->hasFile('flag_image')) {
            Storage::disk('public')->delete($state->flag->imageUrl);
            $filename = time(). '.' .$request->flag_image->extension();
            $imageUrl = $request->file('flag_image')->storeAs(
            'FlagImages',
            $filename,
            'public');
            $state->flag->imageUrl = $imageUrl;
            $state->flag->update();
        }
        $state->gdp = $request->gdp;
        $state->area = $request->area;
        $state->population = $request->population;
        $state->update();
        return redirect('/state')->with('success', "State successfully updated");
    }

    public function delete($pk){
        $state = State::findOrFail($pk);
        $state->delete();
        return redirect('/state')->with('success', "State deleted successfully");
    }
}
