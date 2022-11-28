<?php

declare(strict_types=1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class SalesChart extends BaseChart
{

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */


    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */


    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sales', [1, 2, 3])
            ->dataset('Orders', [3, 2, 1]);
    }
}
