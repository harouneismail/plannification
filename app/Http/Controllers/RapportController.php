<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Structsanit;
use Illuminate\Http\Request;
use App\Models\Wilaya;
use App\Models\Mough;
use App\Models\Rapport;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapport = Rapport::select("nombretestrealises", DB::raw("SUM(nombretestrealises) as total"))
            ->orderBy("id", 'asc')
            ->pluck("total", "nombretestrealises");
        $rapport = array_column($rapport, 'total');

        return view('rapport.index')->with('rapport', json_encode($rapport, JSON_NUMERIC_CHECK));
    }

    public function chartjs()
    {

        return view('rapport/graphics');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayas = Wilaya::all();
        $mough = Mough::all();
        $structsanit = Structsanit::all();
        return view('rapport/create', compact('wilayas', 'mough', 'sousdirection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rapport = new Rapport();
        $rapport->daterapportage = $request->input('daterapportage');
        $rapport->wilaya_id = $request->input('wilaya_id');
        $rapport->mough_id = $request->input('mough_id');
        $rapport->structsanit_id = $request->input('structsanit_id');
        $rapport->nombretestrealises = $request->input('nombretestrealises');
        $rapport->etag = $request->input('etag');
        $rapport->testpcrnegatif = $request->input('testpcrnegatif');
        $rapport->testsuivipositifs = $request->input('testsuivipositifs');
        $rapport->testsuivinegatif = $request->input('testsuivinegatif');
        $rapport->cassimple = $request->input('cassimple');
        $rapport->casaveccomplication = $request->input('casaveccomplication');
        $rapport->testpcrpositif = $request->input('testpcrpositif');


        while (($rapport->nombretestrealises - $rapport->etag - $rapport->testpcrnegatif  - $rapport->testpcrpositif) == 0) {
            $rapport->save();
            session()->flash('success', 'Le Rapport  a été bien enregistrée!!!');
            return redirect('rapport');
        }


        session()->flash('alert', 'Ce Rapport n\' a été pas Sauvegardé, Vérifier bien vos Tests!!!!!!!!!!!!!!');
        return redirect('rapport');
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
        //
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
        $rapport = Rapport::find($id);
        $rapport->daterapportage = $request->input('daterapportage');
        $rapport->wilaya_id = $request->input('wilaya_id');
        $rapport->mough_id = $request->input('mough_id');
        $rapport->structsanit_id = $request->input('structsanit_id');
        $rapport->nombretestrealises = $request->input('nombretestrealises');
        $rapport->etag = $request->input('etag');
        $rapport->testpcrnegatif = $request->input('testpcrnegatif');
        $rapport->testsuivipositifs = $request->input('testsuivipositifs');
        $rapport->testsuivinegatif = $request->input('testsuivinegatif');
        $rapport->cassimple = $request->input('cassimple');
        $rapport->casaveccomplication = $request->input('casaveccomplication');
        $rapport->testpcrpositif = $request->input('testpcrpositif');


        while (($rapport->nombretestrealises - $rapport->etag - $rapport->testpcrnegatif  - $rapport->testpcrpositif) == 0) {
            $rapport->save();
            session()->flash('success', 'Le Rapport  a été bien enregistrée!!!');
            return redirect('rapport');
        }


        session()->flash('alert', 'Ce Rapport n\' a été pas Sauvegardé, Vérifier bien vos Tests!!!!!!!!!!!!!!');
        return redirect('rapport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rapport = Rapport::find($id);
        $rapport->delete();
        session()->flash('success', 'Success Suppression');
        return redirect('rapport');
    }
    public function analyse()
    {
        return view('rapport/analyse');
    }
}
