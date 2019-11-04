
function actualizarProfesionales(id){
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "profesional_modificar.php",
        success: function(r){
            
            datos=jQuery.parseJSON(r);
            
            $('#idP').val(datos['id_profesional']);
            $('#nombreP').val(datos['nombre_p']);
            $('#apellidoP').val(datos['apellido_p']);
            $('#especialidadP').val(datos['especialidad_p']);
            $('#DNIP').val(datos['dni_p']);
            $('#telefonoP').val(datos['telefono_p']);
            $('#emailP').val(datos['email_p']);
            $('#matriculaP').val(datos['matricula_p']);
            
        }
    });
}
