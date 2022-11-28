<?php

namespace App\Http\Controllers;

use App\Models\fichedenotification;
use App\Models\Mough;
use App\Models\Structsanit;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Nette\Schema\Elements\Structure;
use App\Http\Requests\RapportRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateRapportRequest;
use App\Models\Lot;
use App\Models\Nommaladie;
use App\Models\Wilayaprelev;
use Auth;

class FichedenotficationController extends Controller
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
        $fiches = fichedenotification::all();
        return view('fichedenotification.index', compact('fiches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lot = Lot::all();
        $maladie = Nommaladie::all();
        $wilayaprelev = Wilayaprelev::all();
        $wilaya = Wilaya::all();
        return view('fichedenotification.create', compact('lot', 'wilaya', 'wilayaprelev', 'maladie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function getOldId($id_covidpositif)
    {
        $id_covidpositif = 0;
        if (fichedenotification::orderBy('id', 'desc')->first() === null) {
            $id_covidpositif = 0;
            return $id_covidpositif;
        } else {
            $data = DB::table('fichedenotifications')->orderBy('id', 'desc')->first();
            $id_covidpositif = $data->id;
            return $id_covidpositif;
        }
    }
    private function getCode($val1, $val2)
    {
        $val2 = '';
        $recherch = Nommaladie::where('id', $val1)->first();
        $val2 = $recherch->code_nommaladies;
        return $val2;
    }
    public function store(RapportRequest $request)
    {
        $valhasgoing2 = '';
        $id_covidpositifglobal = 0;

        $fiche = new fichedenotification();
        $fiche->user_id = Auth::user()->id;
        $fiche->covidid = "Lot: " . $request->input('lot_id') .  "" . $this->getCode($request->input('nommaladie_id'), $valhasgoing2) . "(" . ($this->getOldId($id_covidpositifglobal) + 1) . ")";
        $fiche->lot_id = $request->input('lot_id');
        $fiche->idsearch = $this->getOldId($id_covidpositifglobal) + 1;
        $fiche->nommaladie_id = $request->input('nommaladie_id');
        $fiche->wilayaprelev_id = $request->input('wilayaprelev_id');
        $fiche->moughprelev_id = $request->input('moughprelev_id');
        $fiche->structsanit_id = $request->input('structsanit_id');
        $fiche->wilaya_id = $request->input('wilaya_id');
        $fiche->mough_id = $request->input('mough_id');
        $fiche->datedurapporatge = $request->input('datedurapporatge');
        $fiche->tel1 = $request->input('tel1');
        $fiche->tel2 = $request->input('tel2');
        $fiche->prenom = $request->input('prenom');
        $fiche->nom = $request->input('nom');
        $fiche->age_annee = $request->input('age_annee');
        $fiche->age_mois = $request->input('age_mois');
        $fiche->sexe = $request->input('sexe');
        $fiche->motif_examen = $request->input('motif_examen');

        $fiche->typeprelev = $request->input('typeprelev');
        $fiche->resultat = $request->input('resultat');
        dd($fiche->save());
        session()->flash('success', 'Success');
        return redirect('fichedenotification');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $fiche = fichedenotification::find($id);
        $wilayaprelev = Wilayaprelev::all();
        $wilaya = Wilaya::all();
        $maladie = Nommaladie::all();
        return view('fichedenotification.print', compact('fiche', 'wilayaprelev', 'wilaya', 'maladie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lot = Lot::all();
        $fiche = fichedenotification::find($id);
        $wilayaprelev = Wilayaprelev::all();
        $wilaya = Wilaya::all();
        $maladie = Nommaladie::all();
        return view('fichedenotification.edit', compact('lot', 'fiche', 'wilayaprelev', 'wilaya', 'maladie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRapportRequest $request, $id)
    {
        $valhasgoing2 = '';
        $id_covidpositifglobal = 0;

        $fiche = fichedenotification::find($id);
        $fiche->id = $request->input('id');
        $fiche->user_id = Auth::user()->id;
        $fiche->idsearch = $request->input('idsearch');
        $fiche->covidid =
            "Lot: " . $request->input('lot_id') .  "" . $this->getCode($request->input('nommaladie_id'), $valhasgoing2) . "(" . ($this->getOldId($id_covidpositifglobal)) . ")";
        $fiche->lot_id = $request->input('lot_id');
        $fiche->nommaladie_id = $request->input('nommaladie_id');
        $fiche->wilayaprelev_id = $request->input('wilayaprelev_id');
        $fiche->moughprelev_id = $request->input('moughprelev_id');
        $fiche->structsanit_id = $request->input('structsanit_id');
        $fiche->wilaya_id = $request->input('wilaya_id');
        $fiche->mough_id = $request->input('mough_id');
        $fiche->datedurapporatge = $request->input('datedurapporatge');
        $fiche->tel1 = $request->input('tel1');
        $fiche->tel2 = $request->input('tel2');
        $fiche->prenom = $request->input('prenom');
        $fiche->nom = $request->input('nom');
        $fiche->age_annee = $request->input('age_annee');
        $fiche->age_mois = $request->input('age_mois');
        $fiche->sexe = $request->input('sexe');
        $fiche->motif_examen = $request->input('motif_examen');

        $fiche->typeprelev = $request->input('typeprelev');
        $fiche->resultat = $request->input('resultat');
        $fiche->save();
        session()->flash('success', 'Success');
        return redirect('fichedenotification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fiche = fichedenotification::find($id);
        $fiche->delete();
        session()->flash('success', 'Success Suppression');
        return redirect('fichedenotification');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $filterResult = fichedenotification::where('covidid', 'LIKE', '%' . $query . '%')->get();
        return view('fichedenotification.searchcode', compact('filterResult'));
    }
}
