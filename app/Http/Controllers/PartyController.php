<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function showHome(){
        $parties = Party::all();
        return view('party/party_home', ['parties'=> $parties]);
    }

    public function showAddPage(){
        return view('party/party_add');
    }

    public function createAndAdd(Request $request){
        $request->validate([
            'name' => ['required']
        ]);
        Party::create(['name'=>$request->name]);
        return redirect('/party')->with('success', "Party recorded");
    }

    public function showEditPage($pk){
        $party = Party::findOrFail($pk);
        return view('party/party_edit', ['party'=>$party]);
    }

    public function update(Request $request, $pk){
        $request->validate([
            'name' => ['required']
        ]);
        $party = Party::find($pk);
        $party->name = $request->name;
        $party->update();
        return redirect('/party')->with('success', "Party successfully updated");
    }

    public function delete($pk){
        $party = Party::find($pk);
        $party->delete();
        return redirect('/party')->with('success', "Party deleted successfully");
    }
}
