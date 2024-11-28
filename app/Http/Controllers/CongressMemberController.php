<?php

namespace App\Http\Controllers;

use App\Models\CongressMember;
use App\Models\Party;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CongressMemberController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware(middleware:'auth')];
    }

    public function showHome(){
        $congress_members = CongressMember::all();
        return view('congressmember/congressmember_home', ['congress_members' => $congress_members]);
    }

    public function showAddPage(){
        $states = State::all();
        $parties = Party::all();
        return view('congressmember/congressmember_add', ['states'=>$states, 'parties'=>$parties]);
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
        CongressMember::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'state_id'=>$request->state,
            'party_id'=>$request->party
        ]);
        return redirect('/congressMembers')->with('success', "Congress Member recorded");
    }

    public function showEditPage($pk){
        $congress_member = CongressMember::Find($pk);
        $states = State::all();
        $parties = Party::all();
        return view('congressmember/congressmember_edit', ['congress_member'=>$congress_member, 'states'=>$states, 'parties'=>$parties]);
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
        $congress_member = CongressMember::find($pk);
        $congress_member->first_name = $request->first_name;
        $congress_member->last_name = $request->last_name;
        $congress_member->age = $request->age;
        $congress_member->gender = $request->gender;
        $congress_member->state_id = $request->state;
        $congress_member->party_id = $request->party;
        $congress_member->update();
        return redirect('/congressMembers')->with('success', "Congress member successfully updated");
    }

    public function delete($pk){
        $congress_member = CongressMember::find($pk);
        $congress_member->delete();
        return redirect('/congressMembers')->with('success', "Congress member deleted successfully");
    }

}
