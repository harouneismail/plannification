<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directeurregional;
use App\Models\Wilaya;
use App\Http\Requests\Drasrequest;
class DrasController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {

        $dras = Directeurregional::all();

        return view('dras.index', compact('dras'));
    }

    public function create()
    {
        $wilaya = Wilaya::all();
        return view('dras.create', compact('wilaya'));
    }
    public function store(Drasrequest $request)
    {
        $dras = new Directeurregional();
        $dras->wilaya_id = $request->input('wilaya_id');
        $dras->name_directeurregional = $request->input('name_directeurregional');
        $dras->save();
        session()->flash('success', 'SUCCESS');
        return redirect('dras');
    }
    public function edit($id)
    {
        $wilaya = Wilaya::all();
        $dras = Directeurregional::find($id);
        return view('dras.edit', compact('wilaya', 'dras'));
    }
    public function update(Request $request, $id)
    {
        $dras = Directeurregional::find($id);
        $dras->wilaya_id = $request->input('wilaya_id');
        $dras->name_directeurregional = $request->input('name_directeurregional');
        $dras->save();
        session()->flash('success', 'SUCCESS');
        return redirect('dras');
    }
    public function destroy(Request $request)
    {
        try {
            $dras = Directeurregional::find($request->id);
            $dras->delete();
            session()->flash('success', 'SUCCESS');
            return redirect('dras');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  constrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('dras');
        }
    }




}
