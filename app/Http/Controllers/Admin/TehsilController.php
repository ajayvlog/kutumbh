<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tehsil;
use App\City;
use App\State;
use Illuminate\Http\Request;

class TehsilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tehsils = Tehsil::latest()->paginate(5);
        
        return view('admin.tehsils.index',compact('tehsils'))
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
        return view('admin.tehsils.create', compact('states'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tehsil_name' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
        ]);
  
        Tehsil::create($request->all());
   
        return redirect()->route('admin.tehsils.index')
                        ->with('success','Tehsil created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function show(Tehsil $tehsil)
    {
        return view('admin.tehsils.show',compact('tehsil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function edit(Tehsil $tehsil)
    {
        $states = State::select('*')->pluck("state_name","id");
        $cities = City::where("state_id",$tehsil->state_id)->pluck("city_name","id");
        return view('admin.tehsils.edit',compact('tehsil', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tehsil $tehsil)
    {
        $request->validate([
            'tehsil_name' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
        ]);
  
        $tehsil->update($request->all());
  
        return redirect()->route('admin.tehsils.index')
                        ->with('success','Tehsil updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tehsil $tehsil)
    {
        $tehsil->delete();
  
        return redirect()->route('admin.tehsils.index')
                        ->with('success','Tehsil deleted successfully');
    }
}
