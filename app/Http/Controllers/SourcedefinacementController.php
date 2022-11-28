<?php

namespace App\Http\Controllers;

use App\Models\Sourcefinancement;
use Illuminate\Http\Request;

class SourcedefinacementController extends Controller
{
    public function index()
    {
        $sourcedefina = Sourcefinancement::all();
        return view('sourcedefina.index', compact('sourcedefina'));
    }

    public function create()
    {
        return view('sourcedefina.create');
    }
    public function store(Request $request)
    {
        $sourcedefina = new Sourcefinancement();
        $sourcedefina->name_sourcefinance = $request->input('name_sourcefinance');
        $sourcedefina->save();
        session()->flash('success', 'Success');
        return redirect('sourcedefina');
    }
    public function edit($id)
    {
        $sourcedefina = Sourcefinancement::find($id);
        return view('sourcedefina.edit', compact('sourcedefina'));
    }
    public function update(Request $request, $id)
    {
        $sourcedefina = Sourcefinancement::find($id);
        $sourcedefina->name_sourcefinance = $request->input('name_sourcefinance');
        $sourcedefina->save();
        session()->flash('success', 'Success');
        return redirect('sourcedefina');
    }
    public function destroy(Request $request)
    {
        try {
            $sourcedefina = Sourcefinancement::find($request->id);
            $sourcedefina->delete();
            session()->flash('success', 'Success');
            return redirect('sourcedefina');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('sourcedefina');
        }
    }
}
