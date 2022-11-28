<?php

namespace App\Http\Controllers;

use App\Models\Mough;
use App\Models\Structsanit;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use App\Http\Requests\structsanitRequest;
use App\Models\Directioncentrale;
use App\Models\Moughprelev;
use App\Models\Niveauplanification;
use App\Models\Sousdirection;
use App\Models\Wilayaprelev;
use Illuminate\Support\Facades\DB;
use Nette\Schema\Elements\Structure;

class SousdirectionController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sousdirection = Sousdirection::all();
        return view('sousdirection/index', compact('sousdirection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveauplanification = Niveauplanification::all();
        $directioncentrale = Directioncentrale::all();
        return view('sousdirection/create', compact('niveauplanification', 'directioncentrale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sousdirection = new Sousdirection();
        $sousdirection->niveauplanification_id = $request->input('niveauplanification_id');
        $sousdirection->directioncentrale_id = $request->input('directioncentrale_id');
        $sousdirection->name_sousdirection = $request->input('name_sousdirection');
        $sousdirection->save();
        session()->flash('success', 'Success');
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
        $niveauplanification = Niveauplanification::all();
        $sousdirection = Sousdirection::find($id);
        return view('sousdirection/edit', compact('niveauplanification', 'sousdirection'));
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
        $sousdirection = Sousdirection::find($id);
        $sousdirection->niveauplanification_id = $request->input('niveauplanification_id');
        $sousdirection->directioncentrale_id = $request->input('directioncentrale_id');
        $sousdirection->name_sousdirection = $request->input('name_sousdirection');
        $sousdirection->save();
        session()->flash('success', 'Success');
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
            $sousdirection = Sousdirection::find($id);
            $sousdirection->delete();
            session()->flash('success', 'Success');
            return redirect('sousdirection');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('sousdirection');
        }
    }
    public function selectsousdirection(Request $request)
    {
        $selectsousdirection = DB::table('sousdirections')->where('directioncentrale_id', $request->input('directioncentrale_id'))->pluck("name_sousdirection", "id")->all();
        return response()->json($selectsousdirection);
    }
}
