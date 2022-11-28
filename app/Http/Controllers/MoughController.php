<?php

namespace App\Http\Controllers;

use App\Models\Mough;
use Illuminate\Http\Request;
use App\Http\Requests\moughRequest;
use App\Models\Wilaya;
use App\Http\Requests\mough2Request;
use Auth;
use Illuminate\Support\Facades\DB;

class MoughController extends Controller
{
    
    public function index()
    {
        $mough = Mough::all();

        return view('mough.index', compact('mough'));
    }

    public function create()
    {
        $wilaya = Wilaya::all();
        return view('mough.create', compact('wilaya'));
    }
    public function store(moughRequest $request)
    {
        $mough = new Mough();
        $mough->wilaya_id = $request->input('wilaya_id');
        $mough->nommough = $request->input('nommough');
        $mough->save();
        session()->flash('success', 'Moughataa ' . $request->input('nommough') . ' a été bien enregistrée!!!');
        return redirect('mough');
    }
    public function edit($id)
    {
        $wilaya = Wilaya::all();
        $mough = Mough::find($id);
        return view('mough.edit', compact('wilaya', 'mough'));
    }
    public function update(Request $request, $id)
    {
        $mough = Mough::find($id);
        $mough->wilaya_id = $request->input('wilaya_id');
        $mough->nommough = $request->input('nommough');
        $mough->save();
        session()->flash('success', 'Moughataa ' . $request->input('nommough') . 'a été bien modifiée!!!');
        return redirect('mough');
    }
    public function destroy(Request $request)
    {
        try {
            $mough = Mough::find($request->id);
            $mough->delete();
            session()->flash('success', 'Moughataa ' . $mough->nommough . 'a été bien supprimée');
            return redirect('mough');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  constrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('mough');
        }
    }





    public function selectmoughpatient(Request $request)
    {
        $selectmoug = DB::table('moughs')->where('wilaya_id', $request->wilaya_id)->pluck(
            "nommough",
            "id"
        );
        return response()->json($selectmoug);
    }
}
