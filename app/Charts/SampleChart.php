<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Rapport;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {


        $groupe = DB::table('rapports')->select('nombretestrealises', DB::raw('SUM(nombretestrealises) as total'))->groupBy('nombretestrealises')->pluck('total', 'nombretestrealises')->all();

        return Chartisan::build()
            ->labels(['Nombre des Tests Réalisés'])
            ->dataset('Sample', array_values($groupe));
    }
}
