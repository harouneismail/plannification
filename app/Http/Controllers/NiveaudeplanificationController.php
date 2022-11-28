<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayaprelev;
use App\Http\Requests\wilayaprelevRequest;
use App\Models\Niveauplanification;

class NiveaudeplanificationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveauplanification = Niveauplanification::all();
        return view('niveauplanification.index', compact('niveauplanification'));
    }

    public function create()
    {
        return view('niveauplanification.create');
    }
    public function store(Request $request)
    {
        $niveauplanification = new Niveauplanification();
        $niveauplanification->name_niveauplanification = $request->input('name_niveauplanification');
        $niveauplanification->save();
        session()->flash('success', 'Success');
        return redirect('niveauplanification');
    }
    public function edit($id)
    {
        $niveauplanification = Niveauplanification::find($id);
        return view('niveauplanification.edit', compact('niveauplanification'));
    }
    public function update(Request $request, $id)
    {
        $niveauplanification = Niveauplanification::find($id);
        $niveauplanification->name_niveauplanification = $request->input('name_niveauplanification');
        $niveauplanification->save();
        session()->flash('success', 'Wilaya  a été bien modifiée!!!');
        return redirect('niveauplanification');
    }
    public function destroy(Request $request)
    {
        try {
            $niveauplanification = Niveauplanification::find($request->id);
            $niveauplanification->delete();
            session()->flash('success', 'Success');
            return redirect('niveauplanification');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('niveauplanification');
        }
    }
}
