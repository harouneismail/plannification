<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotRequest;
use App\Models\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lot = Lot::all();
        return view('lot.index', compact('lot'));
    }

    public function create()
    {
        return view('lot.create');
    }
    public function store(LotRequest $request)
    {
        $lot = new Lot();
        $lot->numerolot = $request->input('numerolot');
        $lot->save();
        session()->flash('success', 'Le Nouveau Lot ' . $request->input('numerolot') . ' a été bien enregistrée!!!');
        return redirect('lot');
    }
    public function edit($id)
    {
        $lot = Lot::find($id);
        return view('lot.edit', compact('lot'));
    }
    public function update(Request $request, $id)
    {
        $lot = Lot::find($id);
        $lot->numerolot = $request->input('numerolot');
        $lot->save();
        session()->flash('success', 'Le Lot  a été bien modifiée!!!');
        return redirect('lot');
    }
    public function destroy(Request $request)
    {
        try {
            $lot = Lot::find($request->id);
            $lot->delete();
            session()->flash('success', 'Wilaya ' . $lot->numerolot . ' a été bien supprimée');
            return redirect('lot');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('lot');
        }
    }
}
