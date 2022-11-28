<?php

namespace App\Http\Controllers;

use App\Models\Mough;
use Illuminate\Http\Request;
use App\Http\Requests\moughprelevRequest;
use App\Models\Wilaya;
use App\Http\Requests\mough2Request;
use App\Models\Directioncentrale;
use App\Models\Niveauplanification;
use Auth;
use Illuminate\Support\Facades\DB;

class DirectioncentralesController extends Controller
{
    
    public function index()
    {
        $directioncentrale = Directioncentrale::all();

        return view('directioncentrale.index', compact('directioncentrale'));
    }

    public function create()
    {
        $niveauplanification = Niveauplanification::all();
        return view('directioncentrale.create', compact('niveauplanification'));
    }
    public function store(Request $request)
    {
        $directioncentrale = new Directioncentrale();
        $directioncentrale->niveauplanification_id = $request->input('niveauplanification_id');
        $directioncentrale->name_directioncentrales = $request->input('name_directioncentrales');
        $directioncentrale->save();
        session()->flash('success', 'Success');
        return redirect('directioncentrale');
    }
    public function edit($id)
    {
        $niveauplanification = Niveauplanification::all();
        $directioncentrale = Directioncentrale::find($id);
        return view('directioncentrale.edit', compact('niveauplanification', 'directioncentrale'));
    }
    public function update(Request $request, $id)
    {
        $directioncentrale = Directioncentrale::find($id);
        $directioncentrale->niveauplanification_id = $request->input('niveauplanification_id');
        $directioncentrale->name_directioncentrales = $request->input('name_directioncentrales');
        $directioncentrale->save();
        session()->flash('success', 'Moughataa ' . $request->input('nommoughprelev') . 'a été bien modifiée!!!');
        return redirect('directioncentrale');
    }
    public function destroy(Request $request)
    {
        try {
            $directioncentrale = Directioncentrale::find($request->id);
            $directioncentrale->delete();
            session()->flash('success',  'Success');
            return redirect('directioncentrale');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  constrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('directioncentrale');
        }
    }
    public function directioncentraleselect(Request $request)
    {
        $directioncentraleselect = DB::table('directioncentrales')->where('niveauplanification_id', $request->niveauplanification_id)->pluck(
            "name_directioncentrales",
            "id"
        );
        return response()->json($directioncentraleselect);
    }
}
