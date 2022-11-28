<?php

namespace App\Http\Controllers;

use App\Models\Composante;
use Illuminate\Http\Request;
use App\Http\Requests\ComposanteRequest;
use App\Models\axe;
use App\Http\Requests\Composante2Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ComposanteController extends Controller
{
    
    public function index()
    {
        $composante = Composante::all();

        return view('composante.index', compact('composante'));
    }

    public function create()
    {
        $axe = axe::all();
        return view('composante.create', compact('axe'));
    }
    public function store(Request $request)
    {
        $Composante = new Composante();
        $Composante->axe_id = $request->input('axe_id');
        $Composante->name_composante = $request->input('name_composante');
        $Composante->code_composante = $request->input('code_composante');

        $Composante->save();
        session()->flash('success', 'Success');
        return redirect('composante');
    }
    public function edit($id)
    {
        $axe = axe::all();
        $composante = Composante::find($id);
        return view('Composante.edit', compact('axe', 'composante'));
    }
    public function update(Request $request, $id)
    {
        $Composante = Composante::find($id);
        $Composante->axe_id = $request->input('axe_id');
        $Composante->name_composante = $request->input('name_composante');
        $Composante->code_composante = $request->input('code_composante');

        $Composante->save();
        session()->flash('success', 'Success');
        return redirect('composante');
    }
    public function destroy(Request $request)
    {
        try {
            $Composante = Composante::find($request->id);
            $Composante->delete();
            session()->flash('success', 'Success');
            return redirect('composante');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  constrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('composante');
        }
    }





    public function selectComposante2(Request $request)
    {
        $selectcomposante['composantes'] = Composante::where('axe_id', $request->axe_id)->get(["name_composante","code_composante",
            "id"]
        );
        return response()->json($selectcomposante);
    }
   
    
    public function selectComposante3(Request $request)
    {
        $selectlibelle['composantes'] = Composante::where('id', $request->id3)->get(["name_composante", "code_composante",
            "id"]
        );
        return response()->json($selectlibelle);
    }
    
    public function selectComposantesimple(Request $request)
    {
        $selectcompose = DB::table('composes')->where('axe_id', $request->axe_id)->pluck("name_composante",
            "id"
        )->all();
        return response()->json($selectcompose);
    }
}
