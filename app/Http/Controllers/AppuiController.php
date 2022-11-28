<?php

namespace App\Http\Controllers;

use App\Models\Appui;
use App\Models\Niveauplanification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppuiController extends Controller
{
    public function index()
    {
        $appui = Appui::all();
        return view('appui/index', compact('appui'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveauplanification = Niveauplanification::all();
        return view('appui/create', compact('niveauplanification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appui = new Appui();
        $appui->niveauplanification_id = $request->input('niveauplanification_id');
        $appui->directioncentrale_id = $request->input('directioncentrale_id');

        $appui->name_appuis = $request->input('name_appuis');
        $appui->save();
        session()->flash('success', 'Success');
        return redirect('appui');
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
        $appui = Sousdirection::find($id);
        return view('appui/edit', compact('niveauplanification', 'appui'));
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
        $appui = Appui::find($id);
        $appui->niveauplanification_id = $request->input('niveauplanification_id');
        $appui->directioncentrale_id = $request->input('directioncentrale_id');

        $appui->name_appuis = $request->input('name_appuis');
        $appui->save();
        session()->flash('success', 'Success');
        return redirect('appui');
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
            $appui = Appui::find($id);
            $appui->delete();
            session()->flash('success', 'Success');
            return redirect('appui');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('appui');
        }
    }
    public function selectsousdirection(Request $request)
    {
        $selectsousdirection = DB::table('sousdirections')->where('directioncentrale_id', $request->input('directioncentrale_id'))->pluck("name_sousdirection", "id")->all();
        return response()->json($selectsousdirection);
    }
}
