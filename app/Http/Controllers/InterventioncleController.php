<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use App\Models\Interventioncle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterventioncleController extends Controller
{
    public function index()
    {
        $interventioncle = Interventioncle::all();
        return view('interventioncle.index', compact('interventioncle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $axe = Axe::all();
        return view('interventioncle.create', compact('axe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $interventioncle = new Interventioncle();
        $interventioncle->axe_id = $request->input('axe_id');
        $interventioncle->composante_id = $request->input('composante_id');
        $interventioncle->souscomposante_id = $request->input('souscomposante_id');
        $interventioncle->actionintervention_id = $request->input('actionintervention_id');
        $interventioncle->name_interventions = $request->input('name_interventions');
        $interventioncle->code_interventions = $request->input('code_interventions');

        $interventioncle->save();
        session()->flash('success', 'Success');
        return redirect('interventioncle');
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
        $interventioncle = Interventioncle::find($id);
        return view('interventioncle.edit', compact('axe', 'interventioncle'));
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
        $interventioncle = Interventioncle::find($id);
        $interventioncle->axe_id = $request->input('axe_id');
        $interventioncle->composante_id = $request->input('composante_id');
        $interventioncle->souscomposante_id = $request->input('souscomposante_id');
        $interventioncle->actionintervention_id = $request->input('actionintervention_id');
        $interventioncle->name_interventions = $request->input('name_interventions'); 
        $interventioncle->code_interventions = $request->input('code_interventions');
   
        $interventioncle->save();
        session()->flash('success', 'Success');
        return redirect('interventioncle');
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
            $interventioncle = Interventioncle::find($id);
            $interventioncle->delete();
            session()->flash('success', 'Success');
            return redirect('interventioncle');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('axe');
        }
    }
    public function interventioncleselect(Request $request)
    {
        $interventioncleselect['interventioncles'] = Interventioncle::where('actionintervention_id', $request->input('actionintervention_id'))->get(["name_interventions","code_interventions", "id"]);
        return response()->json($interventioncleselect);
    }
    
    public function interventioncleselect2(Request $request)
    {
        $interventioncleselect['interventioncles'] = Interventioncle::where('id', $request->input('id8'))->get(["name_interventions","code_interventions", "id"]);
        return response()->json($interventioncleselect);
    }
}
