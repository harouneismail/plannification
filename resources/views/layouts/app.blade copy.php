<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styletable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm container">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span>La Base de Données des MPE</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('lot')}}">Lots</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('maladies')}}">Maladies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('fichedenotification')}}">Liste des Cas</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{url('fichedenotification')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Découpage Administratif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('wilaya')}}">Wilaya du Patient</a></li>
                                <li><a class="dropdown-item" href="{{url('mough')}}">
                                        <main>Moughataa du Patient</main>
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{url('wilayaprelev')}}">Wilaya du prelevement</a></li>
                                <li><a class="dropdown-item" href="{{url('directioncentrale')}}">Moughataa du prelevement</a></li>
                                <li><a class="dropdown-item" href="{{url('sousdirection')}}">Structure Sanitaire du prelevement</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="{{route('search')}}" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("select[name='symptomatique']").change(function() {
                var hasgoing = $(this).val();
                if (hasgoing === "Oui") {
                    return $("#symptomemaladie").css('display', 'inline');
                } else if (hasgoing = "Non") {
                    return $("#symptomemaladie").css('display', 'none');
                } else {
                    return $("#symptomemaladie").css('display', 'inline');
                }
            });
            $("select[name='vaccine']").change(function() {
                var hasgoing2 = $(this).val();
                if (hasgoing2 === "Oui") {
                    return $("#Typevaccin").css('display', 'inline');
                } else if (hasgoing = "Non") {
                    return $("#Typevaccin").css('display', 'none');
                } else {
                    return $("#Typevaccin").css('display', 'inline');
                }
            });
            $("select[name='comorbidite']").change(function() {
                var hasgoing2 = $(this).val();
                if (hasgoing2 === "Oui") {
                    return $("#maladiechronique").css('display', 'inline');
                } else if (hasgoing = "Non") {
                    return $("#maladiechronique").css('display', 'none');
                } else {
                    return $("#maladiechronique").css('display', 'inline');
                }
            });

            $('#wilayaprelev_id').change(function() {
                var wilayaprelev_id = $(this).val();
                if (wilayaprelev_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('
                        moughprelevselect ')}}?wilayaprelev_id=' + wilayaprelev_id,
                        success: function(res) {
                            if (res) {
                                $("#moughprelev_id").empty();
                                $("#moughprelev_id").append('<option>Choisissez une Moughataa du Prelevement</option>');
                                $.each(res, function(key, value) {
                                    $("#moughprelev_id").append('<option value="' + key + '">' + value + '</option>');
                                });
                            } else {
                                $("#moughprelev_id").empty();
                            }
                        }
                    });
                } else {
                    $("#moughprelev_id").empty();
                }
                $('#moughprelev_id').change(function() {
                    var moughprelev_id = $(this).val();
                    if (moughprelev_id) {
                        $.ajax({
                            type: 'GET',
                            url: '{{ url('
                            selectstructsanit ')}}?moughprelev_id=' + moughprelev_id,
                            success: function(res) {
                                if (res) {
                                    $("#structsanit_id").empty();
                                    $("#structsanit_id").append('<option>Choisissez une Structure Sanitaire</option>');
                                    $.each(res, function(key, value) {
                                        $("#structsanit_id").append('<option value="' + key + '">' + value + '</option>');
                                    });
                                } else {
                                    $("#structsanit_id").empty();
                                }
                            }
                        });
                    } else {
                        $("#structsanit_id").empty();
                    }
                });
            });
            $('#wilaya_id').change(function() {
                var wilaya_id = $(this).val();
                if (wilaya_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('
                        selectmoughpatient ')}}?wilaya_id=' + wilaya_id,
                        success: function(res) {
                            if (res) {
                                $("#mough_id").empty();
                                $("#mough_id").append('<option>Choisissez une Moughataa du Patient</option>');
                                $.each(res, function(key, value) {
                                    $("#mough_id").append('<option value="' + key + '">' + value + '</option>');
                                });
                            } else {
                                $("#mough_id").empty();
                            }
                        }
                    });
                } else {
                    $("#mough_id").empty();
                }

            });

        });
    </script>
    <script type="text/javascript">
        function printelement() {
            var app = document.getElementById('app').innerHTML;
            var mysection = document.getElementById('mysection').innerHTML;
            document.getElementById('app').innerHTML = mysection;
            window.print();
            document.getElementById('app').innerHTML = app;

        }
    </script>

</body>

</html>