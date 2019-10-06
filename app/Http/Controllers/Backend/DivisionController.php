<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index(){
        $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.pages.division.index',compact('divisions'));
    }

    public function create(){
        return view('backend.pages.division.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'priority' => 'required',
        ],
    [
        'name.required' => 'Please provide a division name',
        'priority.required' => 'Please provide a priority'
    ]);


    $division = new Division();
    $division->name = $request->name;
    $division->priority = $request->priority;

    $division->save();
    return redirect()->route('admin.divisions');

    }
    
    public function edit($id){
        $division = Division::find($id);
        if(!is_null($division)){
            return view('backend.pages.division.edit',compact('division'));
        }else{
            return redirect()->route('admin.divisions');
        }
        
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'priority' => 'required',
        ],
    [
        'name.required' => 'Please provide a division name',
        'priority.required' => 'Please provide a priority'
    ]);


    $division = Division::find($id);
    $division->name = $request->name;
    $division->priority = $request->priority;

    $division->save();

    session()->flash('success','Division has update successfully');
    return redirect()->route('admin.divisions');

    }

    public function destroy($id){
    $division = Division :: find($id);
    if(!is_null($division)){
        // delete all the district for the division
        $districts = District::where('division_id', $division->id)->get();
        foreach($districts as $district){
            $district->delete();
        }
    $division->delete();
    }
    session()->flash('success','Division deleted successfully');
    return back();
    }



}
