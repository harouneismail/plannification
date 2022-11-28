<?php

namespace App\Http\Controllers;

use App\Models\Directioncentrale;
use App\Models\Niveauplanification;
use App\Models\Service;
use App\Models\Sousdirection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveauplanification = Niveauplanification::all();
        return view('service.create', compact('niveauplanification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->niveauplanification_id = $request->input('niveauplanification_id');
        $service->directioncentrale_id = $request->input('directioncentrale_id');
        $service->sousdirection_id = $request->input('sousdirection_id');
        $service->name_service = $request->input('name_service');
        $service->save();
        session()->flash('success', 'Success');
        return redirect('service');
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
        $service = Service::find($id);
        return view('service.edit', compact('niveauplanification', 'service'));
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
        $service = Service::find($id);
        $service->niveauplanification_id = $request->input('niveauplanification_id');
        $service->directioncentrale_id = $request->input('directioncentrale_id');
        $service->sousdirection_id = $request->input('sousdirection_id');
        $service->name_service = $request->input('name_service');
        $service->save();
        session()->flash('success', 'Success');
        return redirect('service');
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
            $service = Service::find($id);
            $service->delete();
            session()->flash('success', 'Success');
            return redirect('service');
        } catch (\Throwable $th) {
            session()->flash('Throwable', 'Impossible de supprimer un enregistrement père: une  contrainte extèrne qui l\'empéche') . $th->getMessage();
            return redirect('niveauplanification');
        }
    }
    public function selectallservice(Request $request)
    {
        $selectservice = DB::table('services')->where('sousdirection_id', $request->input('sousdirection_id'))->pluck("name_service", "id")->all();
        return response()->json($selectservice);
    }
}
