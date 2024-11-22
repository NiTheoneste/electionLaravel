<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlagController extends Controller
{
    public function showHome(){
        $flags = Flag::all();
        return view('flag/flag_home', ['flags' => $flags]);
    }
    public function showAddPage(){
        return view('flag/flag_add');
    }

    public function createAndAdd(Request $request){
        $request->validate(['flag_image' => ['required']]);
        Flag::create(['imageUrl'=>$request->flag_image]);
        return redirect('/flag')->with('success', "Flag recorded");
    }

    public function showEditPage($pk){
        $flag = Flag::findOrFail($pk);
        return view('flag/flag_edit', ['flag'=>$flag]);
    }

    public function update(Request $request, $pk){
        if ($request->hasFile('flag_image')) {
            $flag = Flag::find($pk);
            Storage::disk('public')->delete($flag->imageUrl);
            $filename = time(). '.' .$request->flag_image->extension();
            $imageUrl = $request->file('flag_image')->storeAs(
            'FlagImages',
            $filename,
            'public');
            $flag->imageUrl = $imageUrl;
            $flag->update();
        }
        return redirect('/flag')->with('success', "Flag successfully updated");
    }

    public function showDeletePage(){
        return view('flag/flag_delete');
    }

    public function delete($pk){
        $flag = Flag::find($pk);
        $flag->delete();
        return redirect('/flag')->with('success', "Flag deleted successfully");
    }
}