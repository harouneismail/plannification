<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Axe;
use Illuminate\Http\Request;

class AnneController extends Controller
{
    public function index()
    {
        $annee = Annee::all();
        return view('annee.index', compact('annee'));
    }

    public function create()
    {
        return view('annee.create');
    }
    public function store(Request $request)
    {
        $annee = new Annee();
        $annee->name_annees = $request->input('name_annees');
        $annee->save();
        session()->flash('success', 'Success');
        return redirect('annee');
    }
    public function edit($id)
    {
        $annee = Annee::find($id);
        return view('annee.edit', compact('annee'));
    }
    public function update(Request $request, $id)
    {
        $annee = Annee::find($id);
        $annee->name_annees = $request->input('name_annees');

        $annee->save();
        session()->flash('success', 'Success');
        return redirect('annee');
    }
    public function destroy(Request $request)
    {
        try {
            $annee = Annee::find($request->id);
            $annee->delete();
            session()->flash('success', 'Success');
            return redirect('annee');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('annee');
        }
    }
}
