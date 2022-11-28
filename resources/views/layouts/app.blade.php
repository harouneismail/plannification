<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{asset('js/app.js')}}" defer></script>


    <!-- Fonts -->
    

<!-- MDB -->
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}"/>
<link rel="stylesheet" href="{{  asset('css/bootstrap.min.css')}}">
<link href="https://fonts.cdnfonts.com/css/force-commander" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/anonymous-pro" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/tt-globs-trial" rel="stylesheet">
<!-- Styles -->
</head>
<style>
    body{
        background-color: rgb(92, 179, 228);

    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h5 style="font-family: 'Force Commander', sans-serif">MS | Planification</h6>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:10%">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('canavas/create')}}">Nouvelle Saisie</a>
                          </li>
                          <li class="nav-item me-auto">
                            <a class="nav-link active" aria-current="page" href="{{url('canavas/create')}}">Liste des Activites</a>
                          </li>
                          
                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Se Connecter') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'Inscrire') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Se Deconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer style="position: relative; margin-top:15%; padding-bottom:2.5%; " class="bg-white shadow-1-strong">
            <div class="footer-content" style="margin-bottom:10px">
                <h6 class="text-center">Tous les Droits sont reservés <span style="font-family: 'Force Commander', sans-serif">MS|Planification</span></h6>
            </div>
        </footer>
    </div>
   
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>

    


</body>
<script>
$(document).ready(function(){
    $('#myTable').DataTable();

    
    getResultatComposaante();
    getInterventioncle();
    $('#niveauplanification_id').change(function() {
        var niveauplanification_id = $(this).val();
        if (niveauplanification_id) {
            $.ajax({
                type: 'GET',
                url: '{{ url('directioncentraleselect') }}?niveauplanification_id=' +
                    niveauplanification_id,
                success: function(res) {
                    if (res) {
                        $("#directioncentrale_id").empty();
                        $("#directioncentrale_id").append(
                            '<option>Choisissez une Direction Centrale</option>');
                        $.each(res, function(key, value) {
                            $("#directioncentrale_id").append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $("#directioncentrale_id").empty();
                    }
                }
            });
        } else {
            $("#directioncentrale_id").empty();
        }
        $('#directioncentrale_id').change(function() {
            var directioncentrale_id = $(this).val();
            if (directioncentrale_id) {
                $.ajax({
                    type: 'GET',
                    url: '{{ url('selectsousdirection') }}?directioncentrale_id=' +
                        directioncentrale_id,
                    success: function(res) {
                        if (res) {
                            $("#sousdirection_id").empty();
                            $("#sousdirection_id").append(
                                '<option value="">Choisissez une Direction</option>');
                            $.each(res, function(key, value) {
                                $("#sousdirection_id").append(
                                    '<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        } else {
                            $("#sousdirection_id").empty();
                        }
                    }
                });
            } else {
                $("#sousdirection_id").empty();
            }

            $('#sousdirection_id').change(function() {
                var sousdirection_id = $(this).val();
                if (sousdirection_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('selectallservice') }}?sousdirection_id=' +
                            sousdirection_id,
                        success: function(res) {
                            if (res) {
                                $("#service_id").empty();
                                $("#service_id").append(
                                '<option value="">Choisissez une Direction</option>');
                          
                                $.each(res, function(key, value) {
                                    $("#service_id").append(
                                        '<option value="' + key + '">' +
                                        value + '</option>');
                                });
                            } else {
                                $("#service_id").empty();
                            }
                        }
                    });
                } else {
                    $("#service_id").empty();
                }
            });
           });
    });
    $('#wilaya_id').change(function() {
        var wilaya_id = $(this).val();
        if (wilaya_id) {
            $.ajax({
                type: 'GET',
                url: '{{ url('selectmoughpatient') }}?wilaya_id=' + wilaya_id,
                success: function(res) {
                    if (res) {
                        $("#mough_id").empty();
                        $("#mough_id").append(
                            '<option>Choisissez une Moughataa du Patient</option>');
                        $.each(res, function(key, value) {
                            $("#mough_id").append('<option value="' + key +
                                '">' + value + '</option>');
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
<script>
    function getResultatComposaante(){
        $('#axe_id').change(function() {
            var id=$(this).val();
            if(id){
                $.ajax({
                    type: 'GET',
                    url: '{{url('selectaxe')}}?id=' +id,
                    success: function(res){
                        if(res){
                            $("#axelibel").empty();
                            $.each(res.axes, function(key, value) {
                                $("#axelibel").append(
                                    '<td><b style="color:red">' 
                                        + value.code_axe + '</b>: ' + value.name_axe+'</td>');
                            });
                        }else{
                            $("#axelibel").empty();
                        }
                    }
                });
            }else{
                $("#axelibel").empty();
            }
            var axe_id = $(this).val();
            if (axe_id) {
                $.ajax({
                    type: 'GET',
                    url: '{{ url('selectComposante2') }}?axe_id=' + axe_id,
                    success: function(res) {
                        if (res) {
                            $("#composante_id").empty();
                            $("#composante_id").append(
                                '<option>Choisir un Sous-Programme</option>');
                            $.each(res.composantes, function(key, value) {
                                $("#composante_id").append('<option value="' + value.id +
                                    '">' + value.code_composante + '</option>');
                                   
                            });
                            
                        } else {
                            $("#composante_id").empty();
                        }
                    }
                });
            } else {
                $("#composante_id").empty();
            }
            //
            $('#composante_id').change(function() {
               
                var composante_id = $(this).val();
                if (composante_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('souscomposantefuntion') }}?composante_id=' +
                            composante_id,
                        success: function(res) {
                            if (res) {
                                $("#souscomposante_id").empty();
                                $("#souscomposante_id").append(
                                    '<option>Choisir une Composante</option>'
                                );
                                $.each(res.souscomposantes, function(key, value) {
                                    $("#souscomposante_id").append(
                                        '<option value="' + value.id + '">' +
                                        value.code_souscomposante + '</option>');
                                });
                            } else {
                                $("#souscomposante_id").empty();
                            }
                        }
                    });
                } else {
                    $("#souscomposante_id").empty();
                }
               
            
                var id3 = $(this).val();
            if (id3) {
                $.ajax({
                    type: 'GET',
                    url: '{{ url('selectComposante3') }}?id3=' + id3,
                    success: function(res) {
                        if (res) {
                            $("#composantelibelle").empty();
                            
                            $.each(res.composantes, function(key, value) {
                                $("#composantelibelle").append(
                                    '<td><b style="color:red">' 
                                        +value.code_composante +'</b>:  ' +value.name_composante +'</td>');
                                   
                            });
                            
                        } else {
                            $("#composantelibelle").empty();
                        }
                    }
                });
            } else {
                $("#composantelibelle").empty();
            }
           
                $('#souscomposante_id').change(function() {
                   
                    //
                   
                     var souscomposante_id = $(this).val();
                    if (souscomposante_id) {
                        $.ajax({
                            type: 'GET',
                            url: '{{ url('resultatcomposanteselect') }}?souscomposante_id=' +
                                souscomposante_id,
                            success: function(res) {
                                if (res) {
                                    $("#resultatcomposante_id").empty();
                                    $("#hasgoing").css('display','inline');

                                    
                                    
                                    $.each(res.resultatcomposantes, function(key, value) {
                                        $("#resultatcomposante_id").append(
                                         '<tr style="text-align: center; color:#00008b; font-size:1.1rem"><td>'+value.name_resultatcomposantes + '</td><td>' +
                                                value.cible_2025 +'</td><td>'+value.cible_2030+'</td></tr>');
                                                
                                    });
                                } else {
                                    $("#resultatcomposante_id").empty();
                                }
                            }
                        });
                    } else {
                        $("#resultatcomposante_id").empty();
                    }
                    var id2=$(this).val();
                    if (id2) {
                        $.ajax({
                            type: 'GET',
                            url: '{{ url('souscomposante2') }}?id2=' +
                            id2,
                            success: function(res) {
                                if (res) {
                                    $("#souscomposantelibelle").empty();
                                    
                                    $.each(res.souscomposantes, function(key, value) {
                                        $("#souscomposantelibelle").append(
                                            
                                                '<td><b style="color:red">'+value.code_souscomposante+ '</b>: ' +value.name_souscomposante+ '</td>'
                                                );
                                                
                                    });
                                } else {
                                    $("#souscomposantelibelle").empty();
                                }
                            }
                        });
                    } else {
                        $("#souscomposantelibelle").empty();
                    }
                    var souscomposante1 = $(this).val();
                    if (souscomposante1) {
                        $.ajax({
                            type: 'GET',
                            url: '{{ url('getResultatattendu') }}?souscomposante1=' +
                            souscomposante1,
                            success: function(res) {
                                if (res) {
                                    $("#resultatattendu").empty();
                                    
                                    
                                    $.each(res.resultatattendus, function(key, value) {
                                        $("#resultatattendu").append(
                                            
                                            
                                                '<td><span><b style="color:red">'+value.code_resultatattendus + '</b>:</span><br><span class="span" style="font-style:italic">' +value.name_resultatattendus +'</span></li></ul></td>');
                                                
                                    });
                                } else {
                                    $("#resultatattendu").empty();
                                }
                            }
                        });
                    } else {
                        $("#resultatattendu").empty();
                    }
               
                        if (souscomposante_id) {
                            $.ajax({
                                type: 'GET',
                                url: '{{ url('actioninterventionselect') }}?souscomposante_id=' +
                                    souscomposante_id,
                                success: function(res) {
                                    if (res) {
                                        $("#actionintervention_id").empty();
                                        $("#actionintervention_id").append(
                                            '<option>Choisir une Stratégie</option>'
                                        );
                                        $.each(res.actioninterventions, function(key, value) {
                                            $("#actionintervention_id").append(
                                                '<option value="' + value.id + '">' +
                                                value.code_actionintervention + '</option>');
                                        });
                                    } else {
                                        $("#actionintervention_id").empty();
                                    }
                                }
                            });
                        } else {
                            $("#actionintervention_id").empty();
                        }
                        $('#actionintervention_id').change(function() {
                            var actionintervention_id = $(this).val();
                            if (actionintervention_id) {
                                $.ajax({
                                    type: 'GET',
                                    url: '{{ url('interventioncleselect') }}?actionintervention_id=' +
                                    actionintervention_id,
                                    success: function(res) {
                                        if (res) {
                                            $("#interventioncle_id").empty();
                                            $("#interventioncle_id").append(
                                                '<option>Choisir une Intervention Clée</option>'
                                            );
                                            $.each(res.interventioncles, function(key, value) {
                                                $("#interventioncle_id").append(
                                                    '<option value="' + value.id + '">' +
                                                    value.code_interventions + '</option>');
                                            });
                                        } else {
                                            $("#interventioncle_id").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#interventioncle_id").empty();
                            }
                            //
                           
                            var id7 = $(this).val();
                            if (id7) {
                                $.ajax({
                                    type: 'GET',
                                    url: '{{ url('actioninterventionselectid7') }}?id7=' +
                                    id7,
                                    success: function(res) {
                                        if (res) {
                                            $("#hasgoingactionintervention").css('display','inline');
                                            $("#actioninterventionlibelle").empty();
                                           
                                            $.each(res.actioninterventions, function(key, value) {
                                                $("#actioninterventionlibelle").append(
                                                    '<td><b style="color:red">'+ value.code_actionintervention +
                                                    ':</b>'+value.name_actionintervention + '</td>');
                                            });
                                        } else {
                                            $("#actioninterventionlibelle").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#actioninterventionlibelle").empty();
                            }
                                if (actionintervention_id) {
                                    $.ajax({
                                        type: 'GET',
                                        url: '{{ url('getResultatproces') }}?actionintervention_id=' + actionintervention_id,
                                        success: function(res) {
                                            if (res) {
                                                $("#hasgoingstrategie").css('display','inline');
                                                $("#resultatproce_id").empty();
                                           
                                                $.each(res.resultatproces, function(key, value) {
                                                    $("#resultatproce_id").append(
                                                        '<tr style="text-align: center; color:#00008b"><td>'
                                                          + value.name_resultatproces + '</td><td>'+value.cible2022+'</td><td>'+value.cible2023+'</td></tr>');
                                                });
                                            } else {
                                                $("#resultatproce_id").empty();
                                            }
                                        }
                                    });
                                } else {
                                    $("#resultatproce").empty();
                                }
                                if (actionintervention_id) {
                                    $.ajax({
                                        type: 'GET',
                                        url: '{{ url('interventioncleselect') }}?actionintervention_id=' + actionintervention_id,
                                        success: function(res) {
                                            if (res) {
                                                $("#hasgoing3").css('display','inline');
                                                $("#getResultatinterventioncle").empty();
                                           
                                                $.each(res.interventioncles, function(key, value) {
                                                    $("#getResultatinterventioncle").append(
                                                        '<tr style="text-align: center"><td style="text-decoration:underline"><strong>' +value.name_interventions + '<strong></td></tr>');
                                                });
                                            } else {
                                                $("#getResultatinterventioncle").empty();
                                            }
                                        }
                                    });
                                } else {
                                    $("#getResultatinterventioncle").empty();
                                }
                                $("#interventioncle_id").change(function(){
                                    var id8 = $(this).val();
                            if (id8) {
                                $.ajax({
                                    type: 'GET',
                                    url: '{{ url('interventioncleselect2') }}?id8=' +
                                    id8,
                                    success: function(res) {
                                        if (res) {
                                            $("#hasgoinginterventionlib").css('display','inline')
                                            $("#interventionclelibelle_id").empty();
                                            
                                            $.each(res.interventioncles, function(key, value) {
                                                $("#interventionclelibelle_id").append(
                                                    '<td><span><b style="color:red">' + value.code_interventions + '</b></span>:<br><span class="span" style="margin-left:2px">' +
                                                    value.name_interventions + '</span></td>');
                                            });
                                        } else {
                                            $("#interventionclelibelle_id").empty();
                                            $("#hasgoinginterventionlib").css('display','none');
                                            $("#interventionclelibelle_id").css('display','none');
                                        }
                                    }
                                });
                            } else {
                                $("#interventionclelibelle_id").css('display','none');
                                $("#hasgoinginterventionlib").css('display','none');
                                $("#interventionclelibelle_id").empty();
                                
                            }
                        });
                            });
                        });

                    });
                });
    }
    function getInterventioncle(){
        $('#axe_id').change(function() {
            var axe_id = $(this).val();
            if (axe_id) {
                $.ajax({
                    type: 'GET',
                    url: '{{ url('selectComposantesimple') }}?axe_id=' + axe_id,
                    success: function(res) {
                        if (res) {
                            $("#composante_id").empty();
                            $("#composante_id").append(
                                '<option>Choisissez une Composante</option>');
                            $.each(res, function(key, value) {
                                $("#composante_id").append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        } else {
                            $("#composante_id").empty();
                        }
                    }
                });
            } else {
                $("#composante_id").empty();
            }
            $('#composante_id').change(function() {
                var composante_id = $(this).val();
                if (composante_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('souscomposantesimple') }}?composante_id=' +
                            composante_id,
                        success: function(res) {
                            if (res) {
                                $("#souscomposante_id").empty();
                                $("#souscomposante_id").append(
                                    '<option>Choisissez une Sous-Composante</option>'
                                );
                                $.each(res, function(key, value) {
                                    $("#souscomposante_id").append(
                                        '<option value="' + key + '">' +
                                        value + '</option>');
                                });
                            } else {
                                $("#souscomposante_id").empty();
                            }
                        }
                    });
                } else {
                    $("#souscomposante_id").empty();
                }
            $('#souscomposante_id').change(function() {
                var souscomposante_id = $(this).val();
                if (souscomposante_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('actioninterventionsimple') }}?souscomposante_id=' +
                            souscomposante_id,
                        success: function(res) {
                            if (res) {
                                $("#actionintervention_id").empty();
                                $("#actionintervention_id").append(
                                    '<option>Choissez une Stratégie Opérationnelle</option>'
                                );
                                $.each(res, function(key, value) {
                                    $("#actionintervention_id").append(
                                        '<option value="' + key + '">' +
                                        value + '</option>');
                                });
                            } else {
                                $("#actionintervention_id").empty();
                            }
                        }
                    });
                } else {
                    $("#actionintervention_id").empty();
                }
                $('#actionintervention_id').change(function() {
                var actionintervention_id = $(this).val();
                if (actionintervention_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('interventioncleselect') }}?actionintervention_id=' +
                        actionintervention_id,
                        success: function(res) {
                            if (res) {
                                $("#interventioncle_id").empty();
                                $("#interventioncle_id").append(
                                    '<option>Choisir une Intervention Clée</option>'
                                );
                                $.each(res, function(key, value) {
                                    $("#interventioncle_id").append(
                                        '<option value="' + key + '">' +
                                        value + '</option>');
                                });
                            } else {
                                $("#interventioncle_id").empty();
                            }
                        }
                    });
                } else {
                    $("#interventioncle_id").empty();
                }
            
            });

        });
        });

    });
}
</script>
</html>
