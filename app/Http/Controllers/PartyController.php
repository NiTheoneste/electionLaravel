<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PartyController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware(middleware:'auth')];
    }

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
        return redirect('/parties')->with('success', "Party recorded");
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
        return redirect('/parties')->with('success', "Party successfully updated");
    }

    public function delete($pk){
        $party = Party::find($pk);
        $party->delete();
        return redirect('/parties')->with('success', "Party deleted successfully");
    }
}
