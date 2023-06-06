<?php

namespace App\Http\Controllers\Admin;

use App\Dynastie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DynastyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dynasties = Dynastie::latest()->paginate(5);
  
        return view('admin.dynasties.index',compact('dynasties'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dynasties.create');
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
            'dynasty_name' => 'required',
        ]);
  
        Dynastie::create($request->all());
   
        return redirect()->route('admin.dynasties.index')
                        ->with('success','Dynasty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dynastie  $dynastie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dynastie = Dynastie::find($id);
        return view('admin.dynasties.show',compact('dynastie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dynastie  $dynastie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dynastie = Dynastie::find($id);
        return view('admin.dynasties.edit',compact('dynastie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dynastie  $dynastie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dynasty_name' => 'required',
        ]);

        Dynastie::where('id', $id)
                ->update(['dynasty_name' => $request->input('dynasty_name')]);
  
        // $dynastie->update($request->all());
  
        return redirect()->route('admin.dynasties.index')
                        ->with('success','Dynasty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dynastie  $dynastie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dynastie = Dynastie::find($id);
        $dynastie->delete();
        // $dynastie->delete();
  
        return redirect()->route('admin.dynasties.index')
                        ->with('success','Dynasty deleted successfully');
    }
}
