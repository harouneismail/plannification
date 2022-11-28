<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use App\Models\Canavasappui;
use App\Models\Sourcefinancement;
use App\Models\Typeactivite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CanavasappuiController extends Controller
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
                $canavasappui=Canavasappui::get();
            }else if(Auth::user()->is_admin==="Utilisateur"){
                $canavasappui=Canavasappui::where('user_id',Auth::user()->id)->get();
            }
            return view('canavasappui.index',compact('canavasappui'));
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
            $users=DB::table('appuis')->leftJoin('users','users.appui_id','=','appuis.id')->select('appuis.id','appuis.name_appuis')->where('users.appui_id',Auth::user()->appui_id)->first();        
            $axe = Axe::get();
            $typeactivite=Typeactivite::get();
            $sourcedefina=Sourcefinancement::get();
            return view('canavasappui.create', compact(
                'users','axe','typeactivite','sourcedefina'));
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
    public function store(Request $request)
    {
        $canavasappui = new Canavasappui();
        $canavasappui->user_id = Auth::user()->id;
        $canavasappui->appui_id = $request->input('appui_id');
        $canavasappui->axe_id = $request->input('axe_id');
        $canavasappui->composante_id = $request->input('composante_id');
        $canavasappui->souscomposante_id = $request->input('souscomposante_id');
        $canavasappui->actionintervention_id = $request->input('actionintervention_id');
        $canavasappui->interventioncle_id = $request->input('interventioncle_id');
        $canavasappui->activite = $request->input('activite');
        $canavasappui->typeactivite_id = $request->input('typeactivite_id');
        $canavasappui->sourcefinancement_id = $request->input('sourcefinancement_id');
        $canavasappui->periode1 = $request->input('periode1');
        $canavasappui->periode2 = $request->input('periode2');
        $canavasappui->periode3 = $request->input('periode3');
        $canavasappui->periode4 = $request->input('periode4');
        $canavasappui->montant_cout = $request->input('montant_cout');
        $canavasappui->save();
        session()->flash('Success', 'Success');
        return redirect('canavasappui');
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
        $canavasappui=Canavasappui::find($id);
        $axe=Axe::get();
        $typeactivite=Typeactivite::get();
        $sourcedefina=Sourcefinancement::get();
        return view('canavasappui/edit', compact('canavas','axe','typeactivite','sourcedefina'));
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
        $canavasappui=Canavasappui::find($id);
        $canavasappui->user_id = $request->input('user_id');
        $canavasappui->appui_id = $request->input('appui_id');
        $canavasappui->axe_id = $request->input('axe_id');
        $canavasappui->composante_id = $request->input('composante_id');
        $canavasappui->souscomposante_id = $request->input('souscomposante_id');
        $canavasappui->actionintervention_id = $request->input('actionintervention_id');
        $canavasappui->interventioncle_id = $request->input('interventioncle_id');
        $canavasappui->activite = $request->input('activite');
        $canavasappui->typeactivite_id = $request->input('typeactivite_id');
        $canavasappui->sourcefinancement_id = $request->input('sourcefinancement_id');
        $canavasappui->periode = $request->input('periode');
        $canavasappui->montant_cout = $request->input('montant_cout');
        $canavasappui->type_financement = $request->input('type_financement');
        $canavasappui->responsable_mise_oeuvre = $request->input('responsable_mise_oeuvre');
        $canavasappui->save();
        return redirect('canavasappui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $canavasappui=Canavasappui::find($request->id);
        $canavasappui->delete();
        return redirect('canavasappui');
    }
}
