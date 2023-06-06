<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subclan;
use App\Clan;
use Illuminate\Http\Request;

class SubclanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subclans = Subclan::latest()->paginate(5);
        
        return view('admin.subclans.index',compact('subclans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clans = Clan::select('*')->pluck("clan_name","id");
        return view('admin.subclans.create', compact('clans'));
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
            'subclan_name' => 'required',
            'clan_id' => 'required',
        ]);
  
        Subclan::create($request->all());
   
        return redirect()->route('admin.subclans.index')
                        ->with('success','Subclan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subclan  $subclan
     * @return \Illuminate\Http\Response
     */
    public function show(Subclan $subclan)
    {
        return view('admin.subclans.show',compact('subclan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subclan  $subclan
     * @return \Illuminate\Http\Response
     */
    public function edit(Subclan $subclan)
    {
        $clans = Clan::select('*')->pluck("clan_name","id");
        return view('admin.subclans.edit',compact('subclan', 'clans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subclan  $subclan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subclan $subclan)
    {
        $request->validate([
            'subclan_name' => 'required',
            'clan_id' => 'required',
        ]);
  
        $subclan->update($request->all());
  
        return redirect()->route('admin.subclans.index')
                        ->with('success','Subclan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subclan  $subclan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subclan $subclan)
    {
        $subclan->delete();
  
        return redirect()->route('admin.subclans.index')
                        ->with('success','Subclan deleted successfully');
    }
}
