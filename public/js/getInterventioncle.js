$(document).ready(function() {
   
    
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