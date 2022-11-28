<?php

namespace App\Http\Controllers;

use App\Models\Actif;
use Illuminate\Http\Request;
use App\Models\Wilaya;

class ActifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actif=Actif::all();
        return view('actif.index',compact('actif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayas=Wilaya::all();
        
        return view('actif/create', compact('wilayas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actif=new Actif();
       
        $actif->wilaya_id=$request->input('wilaya_id');
        $actif->casasymptomatiquesave=$request->input('casasymptomatiquesave');
        $actif->cassimplesave=$request->input('cassimplesave');
        $actif->casgravesave=$request->input('casgravesave');
        $actif->save();
        session()->flash('success', 'Success');
            return redirect('actif');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actif=Actif::find($id);
        return view('actif/edit',compact('actif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actif= Actif::find($id);
       
        $actif->wilaya_id=$request->input('wilaya_id');
        $actif->casasymptomatiquesave=$request->input('casasymptomatiquesave');
        $actif->cassimplesave=$request->input('cassimplesave');
        $actif->casgravesave=$request->input('casgravesave');
        $actif->save();
        session()->flash('success', 'Success');
            return redirect('actif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actif=Actif::find($id);
        $actif->delete();
        session()->flash('success', 'Success Suppression');
        return redirect('actif');
    }
}
