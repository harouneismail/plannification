<?php

namespace App\Http\Controllers;

use App\Models\Directioncentrale;
use App\Models\axe;
use App\Models\actionintervention;
use App\Models\Sousdirection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActioninterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actionintervention = Actionintervention::all();
        return view('actionintervention.index', compact('actionintervention'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $axe = axe::all();
        return view('actionintervention.create', compact('axe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actionintervention = new actionintervention();
        $actionintervention->axe_id = $request->input('axe_id');
        $actionintervention->composante_id = $request->input('composante_id');
        $actionintervention->souscomposante_id = $request->input('souscomposante_id');
        $actionintervention->name_actionintervention = $request->input('name_actionintervention');
        $actionintervention->code_actionintervention = $request->input('code_actionintervention');

        $actionintervention->save();
        session()->flash('success', 'Success');
        return redirect('actionintervention');
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
        $actionintervention = actionintervention::find($id);
        return view('actionintervention.edit', compact('axe', 'actionintervention'));
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
        $actionintervention = actionintervention::find($id);
        $actionintervention->axe_id = $request->input('axe_id');
        $actionintervention->composante_id = $request->input('composante_id');
        $actionintervention->souscomposante_id = $request->input('souscomposante_id');
        $actionintervention->name_actionintervention = $request->input('name_actionintervention');
        $actionintervention->code_actionintervention = $request->input('code_actionintervention');

        
        $actionintervention->save();
        session()->flash('success', 'Success');
        return redirect('actionintervention');
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
            $actionintervention = actionintervention::find($id);
            $actionintervention->delete();
            session()->flash('success', 'Success');
            return redirect('actionintervention');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('axe');
        }
    }
    public function actioninterventionselect(Request $request)
    {
        $actioninterventionselect['actioninterventions'] = actionintervention::where('souscomposante_id', $request->input('souscomposante_id'))->get(["name_actionintervention", "code_actionintervention", "id"]);
        return response()->json($actioninterventionselect);
    }
    public function actioninterventionselectid7(Request $request)
    {
        $actioninterventionselect['actioninterventions'] = actionintervention::where('id', $request->input('id7'))->get(["name_actionintervention","code_actionintervention", "id"]);
        return response()->json($actioninterventionselect);
    }
    public function actioninterventionsimple(Request $request)
    {
        $actioninterventionselect = DB::table('actioninterventions')->where('souscomposante_id', $request->input('souscomposante_id'))->pluck("name_actionintervention", "id")->all();
        return response()->json($actioninterventionselect);
    }
}
