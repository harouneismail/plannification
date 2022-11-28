<?php

namespace App\Http\Controllers;

use App\Http\Requests\RapportRequest;
use Illuminate\Http\Request;
use App\Http\Requests\wilayaRequest;


use App\Models\Wilaya;

class WilayaController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $wilaya = Wilaya::all();
        return view('wilaya.index', compact('wilaya'));
    }

    public function create()
    {
        return view('wilaya.create');
    }
    public function store(wilayaRequest $request)
    {
        $wilaya = new Wilaya();
        $wilaya->nomwilaya = $request->input('nomwilaya');
        $wilaya->save();
        session()->flash('success', 'Wilaya ' . $request->input('nomwilaya') . ' a été bien enregistrée!!!');
        return redirect('wilaya');
    }
    public function edit($id)
    {
        $wilaya = Wilaya::find($id);
        return view('wilaya.edit', compact('wilaya'));
    }
    public function update(Request $request, $id)
    {
        $wilaya = Wilaya::find($id);
        $wilaya->nomwilaya = $request->input('nomwilaya');
        $wilaya->save();
        session()->flash('success', 'Wilaya  a été bien modifiée!!!');
        return redirect('wilaya');
    }
    public function destroy(Request $request)
    {
        try {
            $wilaya = Wilaya::find($request->id);
            $wilaya->delete();
            session()->flash('success', 'Wilaya ' . $wilaya->nomwilaya . ' a été bien supprimée');
            return redirect('wilaya');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('wilaya');
        }
    }
    public function getWilaya()
    {
        $getwilaya = Wilaya::get();
        return response()->json($getwilaya);
    }
    public function getstrtoime()
    {
    }
}
