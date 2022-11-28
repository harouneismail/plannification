<?php

namespace App\Http\Controllers;

use App\Models\Typeactivite;
use Illuminate\Http\Request;

class TypeactiviteController extends Controller
{
    public function index()
    {
        $typeactivite = Typeactivite::all();
        return view('typeactivite.index', compact('typeactivite'));
    }

    public function create()
    {
        return view('typeactivite.create');
    }
    public function store(Request $request)
    {
        $typeactivite = new Typeactivite();
        $typeactivite->name_typeactivites = $request->input('name_typeactivites');
        $typeactivite->save();
        session()->flash('success', 'Success');
        return redirect('typeactivite');
    }
    public function edit($id)
    {
        $typeactivite = Typeactivite::find($id);
        return view('typeactivite.edit', compact('typeactivite'));
    }
    public function update(Request $request, $id)
    {
        $typeactivite = Typeactivite::find($id);
        $typeactivite->name_typeactivites = $request->input('name_typeactivites');
        $typeactivite->save();
        session()->flash('success', 'Success');
        return redirect('typeactivite');
    }
    public function destroy(Request $request)
    {
        try {
            $typeactivite = Typeactivite::find($request->id);
            $typeactivite->delete();
            session()->flash('success', 'Success');
            return redirect('typeactivite');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('typeactivite');
        }
    }
}
