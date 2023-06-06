<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Village;
use App\City;
use App\State;
use App\Tehsil;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages = Village::latest()->paginate(5);
        
        return view('admin.villages.index',compact('villages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::select('*')->pluck("state_name","id");
        return view('admin.villages.create', compact('states'));
    }

    public function getCity($id=0) 
    {     
        $cities = City::where("state_id",$id)->pluck("city_name","id");
        return json_encode($cities);
    }

    public function getEditCity($edit=0,$id=0) 
    {        
        $cities = City::where("state_id",$id)->pluck("city_name","id");
        return json_encode($cities);
    }

    public function getTehsil($id=0) 
    {     
        $tehsils = Tehsil::where("city_id",$id)->pluck("tehsil_name","id");
        return json_encode($tehsils);
    }

    public function getEditTehsil($edit=0,$id=0) 
    {        
        $tehsils = Tehsil::where("city_id",$id)->pluck("tehsil_name","id");
        return json_encode($tehsils);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'village_name' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'tehsil_id' => 'required',
        ]);
  
        Village::create($request->all());
   
        return redirect()->route('admin.villages.index')
                        ->with('success','Village created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        return view('admin.villages.show',compact('village'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        $states = State::select('*')->pluck("state_name","id");
        $cities = City::where("state_id",$village->state_id)->pluck("city_name","id");
        $tehsils = Tehsil::where("city_id",$village->city_id)->pluck("tehsil_name","id");
        return view('admin.villages.edit',compact('village', 'states', 'cities','tehsils'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        $request->validate([
            'village_name' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'tehsil_id' => 'required',
        ]);
  
        $village->update($request->all());
  
        return redirect()->route('admin.villages.index')
                        ->with('success','Village updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        $village->delete();
  
        return redirect()->route('admin.villages.index')
                        ->with('success','Village deleted successfully');
    }
}
