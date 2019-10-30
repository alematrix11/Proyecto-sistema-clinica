
function datosProfesionales(){
    
    $.ajax({
        url: "mostrar_listado.php",
        success:function(r){
            $('#tablaProfesionales').html(r);
            console.log('Verificacion script');
        }
    });
    
}

