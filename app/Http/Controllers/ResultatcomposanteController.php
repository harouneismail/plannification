<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use App\Models\Resultatcomposante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultatcomposanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultatcomposante = Resultatcomposante::all();
        return view('resultatcomposante.index', compact('resultatcomposante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $axe = axe::all();
        return view('resultatcomposante.create', compact('axe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resultatcomposante= new Resultatcomposante();
        $resultatcomposante->axe_id = $request->input('axe_id');
        $resultatcomposante->composante_id = $request->input('composante_id');
        $resultatcomposante->souscomposante_id = $request->input('souscomposante_id');
        $resultatcomposante->name_resultatcomposantes = $request->input('name_resultatcomposantes');
        $resultatcomposante->cible_2025 = $request->input('cible_2025');
        $resultatcomposante->cible_2030 = $request->input('cible_2030');



        $resultatcomposante->save();
        session()->flash('success', 'Success');
        return redirect('resultatcomposante');
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
        $axe = Axe::all();
        $resultatcomposante = Resultatcomposante::find($id);
        return view('resultatcomposante.edit', compact('axe', 'resultatcomposante'));
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
        $resultatcomposante = Resultatcomposante::find($id);
        $resultatcomposante->axe_id = $request->input('axe_id');
        $resultatcomposante->composante_id = $request->input('composante_id');
        $resultatcomposante->souscomposante_id = $request->input('souscomposante_id');
        $resultatcomposante->cible_2025 = $request->input('cible_2025');
        $resultatcomposante->cible_2030 = $request->input('cible_2030');
         $resultatcomposante->save();
        session()->flash('success', 'Success');
        return redirect('resultatcomposante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $resultatcomposante = Resultatcomposante::find($id);
            $resultatcomposante->delete();
            session()->flash('success', 'Success');
            return redirect('resultatcomposante');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('axe');
        }
    }
    public function resultatcomposanteselect(Request $request)
    {
        $select['resultatcomposantes'] = Resultatcomposante::where('souscomposante_id', $request->input('souscomposante_id'))->get(['name_resultatcomposantes','cible_2025','cible_2030']);

        return response()->json($select);
    }
}
