<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use Illuminate\Http\Request;
use App\Http\Requests\AxeRequest;

class AxeController extends Controller
{
    
    public function index()
    {
        $axe = Axe::all();
        return view('axe.index', compact('axe'));
    }

    public function create()
    {
        return view('axe.create');
    }
    public function store(Request $request)
    {
        $axe = new Axe();
        $axe->name_axe = $request->input('name_axe');
        $axe->code_axe = $request->input('code_axe');
        $axe->save();
        session()->flash('success', 'Success');
        return redirect('axe');
    }
    public function edit($id)
    {
        $axe = Axe::find($id);
        return view('axe.edit', compact('axe'));
    }
    public function update(Request $request, $id)
    {
        $axe = Axe::find($id);
        $axe->name_axe = $request->input('name_axe');
        $axe->code_axe = $request->input('code_axe');

        $axe->save();
        session()->flash('success', 'Success');
        return redirect('axe');
    }
    public function destroy(Request $request)
    {
        try {
            $axe = Axe::find($request->id);
            $axe->delete();
            session()->flash('success', 'Success');
            return redirect('axe');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('axe');
        }
    }
    public function selectaxe(Request $request){
            $selectaxe['axes']=Axe::where('id',$request->input('id'))->get(['name_axe','code_axe','id']);
            return response()->json($selectaxe);
    }
}
