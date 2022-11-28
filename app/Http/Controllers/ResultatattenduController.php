<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use App\Models\Resultatattendu;
use Illuminate\Http\Request;

class ResultatattenduController extends Controller
{
    public function index()
    {
        $resultatattendu = Resultatattendu::all();
        return view('resultatattendu.index', compact('resultatattendu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $axe = Axe::all();
        return view('resultatattendu.create', compact('axe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resultatattendu = new Resultatattendu();
        $resultatattendu->axe_id = $request->input('axe_id');
        $resultatattendu->composante_id = $request->input('composante_id');
        $resultatattendu->souscomposante_id = $request->input('souscomposante_id');

        $resultatattendu->name_resultatattendus = $request->input('name_resultatattendus');
        $resultatattendu->code_resultatattendus = $request->input('code_resultatattendus');
       
        $resultatattendu->save();
        session()->flash('success', 'Success');
        return redirect('resultatattendu');
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
        $resultatattendu = Resultatattendu::find($id);
        return view('resultatattendu.edit', compact('axe', 'resultatattendu'));
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
        $resultatattendu = Resultatattendu::find($id);
        $resultatattendu->axe_id = $request->input('axe_id');
        $resultatattendu->composante_id = $request->input('composante_id');
        $resultatattendu->souscomposante_id = $request->input('souscomposante_id');
        $resultatattendu->name_resultatattendus = $request->input('name_resultatattendus');
        $resultatattendu->code_resultatattendus = $request->input('code_resultatattendus');
       
       
        $resultatattendu->save();
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
            $resultatattendu = Resultatattendu::find($id);
            $resultatattendu->delete();
            session()->flash('success', 'Success');
            return redirect('resultatattendu');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('resultatattendu');
        }
    }
    public function getResultatattendu(Request $request)
    {
        $resultatattendu['resultatattendus']= Resultatattendu::where('souscomposante_id', $request->input('souscomposante1'))->get(["name_resultatattendus","code_resultatattendus","id"]);

        return response()->json($resultatattendu);
    }
}
