<?php

namespace App\Http\Controllers;

use App\Http\Requests\nommaladieRequest;
use App\Models\Nommaladie;
use Illuminate\Http\Request;

class NommaladieController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maladie = Nommaladie::all();
        return view('maladies.index', compact('maladie'));
    }

    public function create()
    {
        return view('maladies.create');
    }
    public function store(nommaladieRequest $request)
    {
        $maladie = new Nommaladie();
        $maladie->code_nommaladies = $request->input('code_nommaladies');

        $maladie->nommaladies = $request->input('nommaladies');
        $maladie->save();
        session()->flash('success', 'La Maladie ' . $request->input('nommaladies') . ' a été bien enregistrée!!!');
        return redirect('maladies');
    }
    public function edit($id)
    {
        $maladie = Nommaladie::find($id);
        return view('maladies.edit', compact('maladie'));
    }
    public function update(Request $request, $id)
    {
        $maladie = Nommaladie::find($id);
        $maladie->code_nommaladies = $request->input('code_nommaladies');

        $maladie->nommaladies = $request->input('nommaladies');
        $maladie->save();
        session()->flash('success', 'La Maladie  a été bien modifiée!!!');
        return redirect('maladies');
    }
    public function destroy(Request $request)
    {
        try {
            $maladie = Nommaladie::find($request->id);
            $maladie->delete();
            session()->flash('success', 'Wilaya ' . $maladie->nommaladies . ' a été bien supprimée');
            return redirect('maladies');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('maladies');
        }
    }
}
