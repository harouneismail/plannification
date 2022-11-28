   $(document).on('ready',function(){
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
            });
    
