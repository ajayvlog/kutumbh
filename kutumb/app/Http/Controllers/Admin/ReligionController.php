<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $religions = Religion::latest()->paginate(5);
  
        return view('admin.religions.index',compact('religions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.religions.create');
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
            'relgn_name' => 'required',
        ]);
  
        Religion::create($request->all());
   
        return redirect()->route('admin.religions.index')
                        ->with('success','Religion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function show(Religion $religion)
    {
        return view('admin.religions.show',compact('religion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function edit(Religion $religion)
    {
        return view('admin.religions.edit',compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Religion $religion)
    {
        $request->validate([
            'relgn_name' => 'required',
        ]);
  
        $religion->update($request->all());
  
        return redirect()->route('admin.religions.index')
                        ->with('success','Religion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Religion $religion)
    {
        $religion->delete();
  
        return redirect()->route('admin.religions.index')
                        ->with('success','Religion deleted successfully');
    }
}
