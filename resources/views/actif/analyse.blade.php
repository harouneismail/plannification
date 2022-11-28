@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{url('rapport')}}" method="get">
           
            <div class="row">
                <table class="table table-bordered border-primary">
                    <thead>
                        
                        <TH>Wilaya</TH>
                        <th>Cas Positifs</th>
                        <th>Guérisons</th>
                        <th>Décés</th>
                        <th>Difference (Positifs, Guerisons, Deces) </th>
                        <th>Cas Asymptomatique</th>
                        <th>Cas Simple</th>
                        <th>Cas Avec Complication</th>
                        <th>Total (Asymptomatique, Simple et Complication)</th>
                    </thead>
                    @foreach ($positifsHEC as $item) 
                    <tbody>
                        <TR>
                            <th>HEC</th>
                            <td>{{ $item->wilaya->nomwilaya}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{$item->totalgueri}}</td>
                            <td>{{$item->totaldeces}}</td>
                            <td>{{$item->total - $item->totalgueri - $item->totaldeces}}</td>
                            <td>{{ $item->totalasymptomatique}}</td>
                            <td>{{$item->totalcassimple}}</td>
                            <td>{{$item->totalcasaveccomplication}}</td>
                            <td>{{$item->totalasymptomatique + $item->totalcassimple + $item->totalcasaveccomplication}}</td>
                        </TR>
                        <TR>
                            <th>HEG</th><td>{{ $item->wilaya->nomwilaya}}</td> 
                            <td>{{$item->total}}</td>
                            <td>{{$item->totalgueri}}</td>
                            <td>{{$item->totaldeces}}</td>
                            <td>{{$item->total - $item->totalgueri - $item->totaldeces}}</td>
                            <td>{{ $item->totalasymptomatique}}</td>
                            <td>{{$item->totalcassimple}}</td>
                            <td>{{$item->totalcasaveccomplication}}</td>
                            <td>{{$item->totalasymptomatique + $item->totalcassimple + $item->totalcasaveccomplication}}</td>
                        </TR>
                        <tr>
                            <th>ASS</th><td>{{ $item->wilaya->nomwilaya}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{$item->totalgueri}}</td>
                            <td>{{$item->totaldeces}}</td>
                            <td>{{$item->total - $item->totalgueri - $item->totaldeces}}</td>
                            <td>{{ $item->totalasymptomatique}}</td>
                            <td>{{$item->totalcassimple}}</td>
                            <td>{{$item->totalcasaveccomplication}}</td>
                            <td>{{$item->totalasymptomatique + $item->totalcassimple + $item->totalcasaveccomplication}}</td>
                        </tr>
                        <tr>
                            <TH>GOR</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                            <td>{{$item->total}}</td>
                        <td>{{$item->totalgueri}}</td>
                        <td>{{$item->totaldeces}}</td>
                        <td>{{$item->total - $item->totalgueri - $item->totaldeces}}</td>
                        <td>{{ $item->totalasymptomatique}}</td>
                        <td>{{$item->totalcassimple}}</td>
                        <td>{{$item->totalcasaveccomplication}}</td>
                        <td>{{$item->totalasymptomatique + $item->totalcassimple + $item->totalcasaveccomplication}}</td>
                        </tr>
                        
                        
                        
                        
                        <th>BRA</th><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>TRA</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>ADR</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>NDB</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <th>TAG</th><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>GUI</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>TRZ</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>INC</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>NKC NORD</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>NKC OUEST</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        <TH>NKC SUD</TH><td>{{ $item->wilaya->nomwilaya}}</td>
                        
                        
                    </tbody>
                    @endforeach
                </table>
            </div>
        
        </form>
        <form action="{{}}" method="post">


        </form>
    </div>
@endsection