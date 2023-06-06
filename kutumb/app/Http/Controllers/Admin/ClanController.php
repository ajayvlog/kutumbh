<?php

namespace App\Http\Controllers\Admin;

use App\Clan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clans = Clan::latest()->paginate(5);
  
        return view('admin.clans.index',compact('clans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clans.create');
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
            'clan_name' => 'required',
        ]);
  
        Clan::create($request->all());
   
        return redirect()->route('admin.clans.index')
                        ->with('success','Clan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function show(Clan $clan)
    {
        return view('admin.clans.show',compact('clan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function edit(Clan $clan)
    {
        return view('admin.clans.edit',compact('clan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clan $clan)
    {
        $request->validate([
            'clan_name' => 'required',
        ]);
  
        $clan->update($request->all());
  
        return redirect()->route('admin.clans.index')
                        ->with('success','Clan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clan $clan)
    {
        $clan->delete();
  
        return redirect()->route('admin.clans.index')
                        ->with('success','Clan deleted successfully');
    }
}
