function listRegions(){
    $.ajax({
        url:'../controllers/ListRegionController.php',
        type:'POST'
    }).done(function(resp){
        //alert(resp);
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++ ){
                cadena += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
            }
            $("#region_id").html(cadena);

            var region_id = $("#region_id").val();
            listCommunes(region_id);
        }
        else{
            cadena+= "<option value=''>'NO EXISTEN REGISTROS'</option>";
            $("#region_id").html(cadena);
        }
    })
}

function listCommunes(region_id){
    $.ajax({
        url:'../controllers/ListCommuneController.php',
        type:'POST',
        data:{
            region_id: region_id
        }
    }).done(function(resp){
        //alert(resp);
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++ ){
                cadena += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
            }
            $("#commune_id").html(cadena);
        }
        else{
            cadena+= "<option value=''>'NO EXISTEN REGISTROS'</option>";
            $("#commune_id").html(cadena);
        }
    })
}

function listCandidates(){
    $.ajax({
        url:'../controllers/ListCandidateController.php',
        type:'POST'
    }).done(function(resp){
        //alert(resp);
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++ ){
                cadena += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
            }
            $("#candidate_id").html(cadena);
        }
        else{
            cadena+= "<option value=''>'NO EXISTEN REGISTROS'</option>";
            $("#candidate_id").html(cadena);
        }
    })
}