<?php

namespace App\Http\Controllers;

use App\Models\Mough;
use App\Models\Structsanit;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use App\Http\Requests\structsanitRequest;
use App\Models\Moughprelev;
use App\Models\Wilayaprelev;
use Illuminate\Support\Facades\DB;
use Nette\Schema\Elements\Structure;

class StructsanitController extends Controller
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
        $sousdirection = Structsanit::all();
        return view('structsanit/index', compact('sousdirection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayaprelev = Wilayaprelev::all();
        $directioncentrale = Moughprelev::all();
        return view('structsanit/create', compact('wilayaprelev', 'directioncentrale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sousdirection = new Structsanit();
        $sousdirection->wilayaprelev_id = $request->input('wilayaprelev_id');
        $sousdirection->moughprelev_id = $request->input('moughprelev_id');
        $sousdirection->nomstructsanit = $request->input('nomstructsanit');
        $sousdirection->save();
        session()->flash('success', 'La Structure Sanitaire ' . $request->input('nomstructsanit') . ' a été bien enregistrée!!!');
        return redirect('sousdirection');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wilayaprelev = Wilayaprelev::all();
        $sousdirection = Structsanit::find($id);
        return view('structsanit/edit', compact('wilayaprelev', 'sousdirection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sousdirection = Structsanit::find($id);
        $sousdirection->wilayaprelev_id = $request->input('wilayaprelev_id');
        $sousdirection->moughprelev_id = $request->input('moughprelev_id');
        $sousdirection->nomstructsanit = $request->input('nomstructsanit');
        $sousdirection->save();
        session()->flash('success', 'La Structure Sanitaire ' . $request->input('nomstructsanit') . ' a été bien Modidifiée!!!');
        return redirect('sousdirection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $sousdirection = Structsanit::find($id);
            $sousdirection->delete();
            session()->flash('success', 'Wilaya ' . $sousdirection->nomstructsanit . ' a été bien supprimée');
            return redirect('sousdirection');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('sousdirection');
        }
    }
    public function selectstructsanit(Request $request)
    {
        $selectstructsanit = DB::table('structsanits')->where('moughprelev_id', $request->input('moughprelev_id'))->pluck("nomstructsanit", "id")->all();
        return response()->json($selectstructsanit);
    }
}
