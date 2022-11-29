<?php

namespace App\Http\Controllers;

use App\Http\Requests\CanavasRequest;
use App\Models\Annee;
use App\Models\Axe;
use App\Models\Canavasappui;
use App\Models\Canneva;
use App\Models\Directioncentrale;
use App\Models\Niveauplanification;
use App\Models\Sourcefinancement;
use App\Models\Typeactivite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CanavasController extends Controller
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
        
        try {
            if (Auth::user()->is_admin==="Admin") {
                $canavas=Canneva::get();
            }else if(Auth::user()->is_admin==="Utilisateur" && Auth::user()->niveau==="DG"){
                $canavas=Canneva::where('directioncentrale_id',Auth::user()->directioncentrale_id)->get();
            }else if(Auth::user()->is_admin==="Utilisateur" && Auth::user()->niveau==="DR"){
                $canavas=Canneva::where('sousdirection_id',Auth::user()->sousdirection_id)->get();

            }else if(Auth::user()->is_admin==="Utilisateur" && Auth::user()->niveau==="DRAS"){
                $canavas=Canneva::where('directioncentrale_id', Auth::user()->directioncentrale_id)->get();

            
            }else if(Auth::user()->is_admin==="Utilisateur" && Auth::user()->niveau==="Chef"){
                $canavas=Canneva::where('user_id',Auth::user()->id)->get();

            }else if(Auth::user()->is_admin==="Utilisateur" && Auth::user()->niveau==="Mough"){
                $canavas=Canneva::where('user_id',Auth::user()->id)->get();
            }            
                return view('canavas.index', compact('canavas'));


            
          } catch (\Throwable $th) {
            session()->flash('Error','Entrer votre email et mot de passe correctement').$th->getMessage();
            return view('auth.login');
          }
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            //code...
            $users=User::where('service_id',Auth::user()->service_id)->first();
            $axe = Axe::get();
            $annee=Annee::get();
            $typeactivite=Typeactivite::get();
            $sourcedefina=Sourcefinancement::get();
            return view('canavas.create', compact(
                'users','axe','typeactivite','sourcedefina','annee'));
        } catch (\Throwable $th) {
            session()->flash('Error','Entrer votre email et mot de passe correctement').$th->getMessage();
            return view('auth.login');
        }
       
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CanavasRequest $request)
    {
        $canavas = new Canneva();
        $canavas->user_id = Auth::user()->id;
        $canavas->annee_id = $request->input('annee_id');

        $canavas->niveauplanification_id = $request->input('niveauplanification_id');
        $canavas->directioncentrale_id = $request->input('directioncentrale_id');
        $canavas->sousdirection_id = $request->input('sousdirection_id');
        $canavas->service_id = $request->input('service_id');
        $canavas->axe_id = $request->input('axe_id');
        $canavas->composante_id = $request->input('composante_id');
        $canavas->souscomposante_id = $request->input('souscomposante_id');
        $canavas->actionintervention_id = $request->input('actionintervention_id');
        $canavas->interventioncle_id = $request->input('interventioncle_id');
        $canavas->activite = $request->input('activite');
        $canavas->typeactivite_id = $request->input('typeactivite_id');
        $canavas->sourcefinancement_id = $request->input('sourcefinancement_id');
        $canavas->periode1 = $request->input('periode1');
        $canavas->periode2 = $request->input('periode2');
        $canavas->periode3 = $request->input('periode3');
        $canavas->periode4 = $request->input('periode4');
        $canavas->montant_cout = $request->input('montant_cout');
        $canavas->save();
        session()->flash('Success', 'Success');
        return redirect('canavas');
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
        $canavas=Canneva::find($id);
        $axe=Axe::get();
        $typeactivite=Typeactivite::get();
        $sourcedefina=Sourcefinancement::get();
        return view('canavas/edit', compact('canavas','axe','typeactivite','sourcedefina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CanavasRequest $request, $id)
    {
        $canavas=Canneva::find($id);
        $canavas->user_id = $request->input('user_id');
        $canavas->annee_id = $request->input('annee_id');

        $canavas->niveauplanification_id = $request->input('niveauplanification_id');
        $canavas->directioncentrale_id = $request->input('directioncentrale_id');
        $canavas->sousdirection_id = $request->input('sousdirection_id');
        $canavas->service_id = $request->input('service_id');
        $canavas->axe_id = $request->input('axe_id');
        $canavas->composante_id = $request->input('composante_id');
        $canavas->souscomposante_id = $request->input('souscomposante_id');
        $canavas->actionintervention_id = $request->input('actionintervention_id');
        $canavas->interventioncle_id = $request->input('interventioncle_id');
        $canavas->activite = $request->input('activite');
        $canavas->typeactivite_id = $request->input('typeactivite_id');
        $canavas->sourcefinancement_id = $request->input('sourcefinancement_id');
        $canavas->periode = $request->input('periode');
        $canavas->montant_cout = $request->input('montant_cout');
        $canavas->type_financement = $request->input('type_financement');
        $canavas->responsable_mise_oeuvre = $request->input('responsable_mise_oeuvre');
        $canavas->save();
        return redirect('canavas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $canavas=Canneva::find($request->id);
        $canavas->delete();
        return redirect('canavas');
    }
    public function details($id){
        $canavas=Canneva::find($id);
        return view('canavas/details', compact('canavas'));
    }
}
