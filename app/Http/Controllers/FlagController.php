<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;

class FlagController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware(middleware:'auth')];
    }

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
        return redirect('/flags')->with('success', "Flag recorded");
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
        return redirect('/flags')->with('success', "Flag successfully updated");
    }
    
    public function delete($pk){
        $flag = Flag::find($pk);
        Storage::disk('public')->delete($flag->imageUrl);
        $flag->delete();
        return redirect('/flags')->with('success', "Flag deleted successfully");
    }
}
