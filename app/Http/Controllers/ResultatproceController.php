<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use App\Models\Resultatproce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultatproceController extends Controller
{
    public function index()
    {
        $resultatproces = Resultatproce::all();
        return view('resultatproces.index', compact('resultatproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $axe = Axe::all();
        return view('resultatproces.create', compact('axe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resultatproces = new Resultatproce();
        $resultatproces->axe_id = $request->input('axe_id');
        $resultatproces->composante_id = $request->input('composante_id');
        $resultatproces->souscomposante_id = $request->input('souscomposante_id');
        $resultatproces->actionintervention_id = $request->input('actionintervention_id');
        $resultatproces->name_resultatproces = $request->input('name_resultatproces');
        $resultatproces->cible2022 = $request->input('cible2022');  
        $resultatproces->cible2023 = $request->input('cible2023');  


        $resultatproces->save();
        session()->flash('success', 'Success');
        return redirect('resultatproces');
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
        $axe = axe::all();
        $resultatproces = Resultatproce::find($id);
        return view('resultatproces.edit', compact('axe', 'resultatproces'));
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
        $resultatproces = Resultatproce::find($id);
        $resultatproces->axe_id = $request->input('axe_id');
        $resultatproces->composante_id = $request->input('composante_id');
        $resultatproces->souscomposante_id = $request->input('souscomposante_id');
        $resultatproces->actionintervention_id = $request->input('actionintervention_id');
        $resultatproces->name_resultatproces = $request->input('name_resultatproces');
        $resultatproces->cible2022 = $request->input('cible2022');  
        $resultatproces->cible2023 = $request->input('cible2023');  

        $resultatproces->save();
        session()->flash('success', 'Success');
        return redirect('resultatproces');
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
            $resultatproces = Resultatproce::find($id);
            $resultatproces->delete();
            session()->flash('success', 'Success');
            return redirect('resultatproces');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('axe');
        }
    }
    public function getResultatproces(Request $request)
    {
        $processus['resultatproces']= Resultatproce::where('actionintervention_id', $request->input('actionintervention_id'))->get(["name_resultatproces","cible2022","cible2023"]);

        return response()->json($processus);
    }
}
