<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use App\Models\Composante;
use App\Models\Souscomposante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SouscomposanteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $souscomposante = Souscomposante::all();
        return view('souscomposante/index', compact('souscomposante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $axe = Axe::all();
        return view('souscomposante/create', compact('axe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $SousComposante = new SousComposante();
        $SousComposante->axe_id = $request->input('axe_id');
        $SousComposante->composante_id = $request->input('composante_id');
        $SousComposante->name_souscomposante = $request->input('name_souscomposante');
        $SousComposante->code_souscomposante = $request->input('code_souscomposante');

        $SousComposante->save();
        session()->flash('success', 'Success');
        return redirect('souscomposante');
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
        $souscomposante = SousComposante::find($id);
        return view('souscomposante/edit', compact('axe', 'souscomposante'));
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
        $SousComposante = SousComposante::find($id);
        $SousComposante->axe_id = $request->input('axe_id');
        $SousComposante->composante_id = $request->input('composante_id');
        $SousComposante->name_souscomposante = $request->input('name_souscomposante');
        $SousComposante->code_souscomposante = $request->input('code_souscomposante');

        $SousComposante->save();
        session()->flash('success', 'Success');
        return redirect('souscomposante');
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
            $SousComposante = Souscomposante::find($id);
            $SousComposante->delete();
            session()->flash('success', 'Success');
            return redirect('souscomposante');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('souscomposante');
        }
    }
    public function souscomposante2(Request $request)
    {
        $selectSousComposante['souscomposantes'] = Souscomposante::where('id', $request->id2)->get(["name_souscomposante","code_souscomposante", "id"]);
        return response()->json($selectSousComposante);
    }
    
    
    
    public function souscomposantefuntion(Request $request)
    {
        $selectSousComposante['souscomposantes'] = Souscomposante::where('composante_id', $request->input('composante_id'))->get(["name_souscomposante", "code_souscomposante","id"])->all();
        return response()->json($selectSousComposante);
    }
}
