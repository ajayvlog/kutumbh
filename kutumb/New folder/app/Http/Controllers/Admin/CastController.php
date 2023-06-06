<?php

namespace App\Http\Controllers\Admin;

use App\Cast;
use App\Religion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casts = Cast::latest()->paginate(5);
        
        return view('admin.casts.index',compact('casts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $religions = Religion::select('*')->pluck("relgn_name","id");
        return view('admin.casts.create', compact('religions'));
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
            'cast_name' => 'required',
            'relgn_id' => 'required',
        ]);
  
        Cast::create($request->all());
   
        return redirect()->route('admin.casts.index')
                        ->with('success','Cast created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function show(Cast $cast)
    {
        return view('admin.casts.show',compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit(Cast $cast)
    {
        $religions = Religion::select('*')->pluck("relgn_name","id");
        return view('admin.casts.edit',compact('cast', 'religions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cast $cast)
    {
        $request->validate([
            'cast_name' => 'required',
            'relgn_id' => 'required',
        ]);
  
        $cast->update($request->all());
  
        return redirect()->route('admin.casts.index')
                        ->with('success','Cast updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cast $cast)
    {
        $cast->delete();
  
        return redirect()->route('admin.casts.index')
                        ->with('success','Cast deleted successfully');
    }
}
