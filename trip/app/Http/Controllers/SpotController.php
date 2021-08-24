<?php

namespace App\Http\Controllers;

use App\Category;
use App\Spot;

use App\Http\Requests\SpotRequest;

use Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SpotController extends Controller
{
    public function index(Spot $spot)
    {
        $auths = Auth::user();
        
        $pref = config('app.pref');
        
        return view('index')->with(['pref' => $pref])->with(['spots' => $spot->getPaginateByLimit()]);
    }
    
    public function search(Request $request)
    {
        
        
        $RequestedPref=$request->spot['prefecture'];
        
        $pref = config('app.pref');
        
        if($request->spot['prefecture'] == '未選択') {
        $spot = new Spot;
        $test = $spot->getPaginateByLimit();
        }
        
        else{
            $test = DB::table('spots')->where('prefecture','=',$RequestedPref)->paginate(10);
        }
        
        return view('index')->with(['pref' => $pref])->with(['spots' => $test]);
    }
    
    
    public function show(Spot $spot)
    {
        $auths = Auth::user();
        $user_id = Auth::id();
        
        return view('show')->with(['spot' => $spot])->with(['id' => $user_id]);
    }

    public function create()
    {
         $auths = Auth::user();
         $user_id = Auth::id();
         $pref = config('app.pref');
        return view('create')->with(['pref' => $pref]);
    }
    
    public function store(Spot $spot, SpotRequest $request)
    {
        $input = $request['spot'];
        
        $user_id = Auth::id();
        
        $spot->fill($input);
        $spot->user_id = $user_id;
        $spot->save();
        return redirect('/spots/' . $spot->id);
    }
    
    public function edit(Spot $spot)
    {
        $pref = config('app.pref');
         
        return view('edit')->with(['pref' => $pref])->with(['spot' => $spot]);
        
    }
    
    public function update(SpotRequest $request, Spot $spot)
    {
        
        $input = $request['spot'];
        
        $spot->fill($input);
        $spot->save();
        return redirect('/spots/' . $spot->id);
    }
    
    public function destroy(Spot $spot)
    {
        $spot->delete();
        return redirect('/');
    }
    
 
    
}