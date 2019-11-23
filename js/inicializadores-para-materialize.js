
    //Se inicializa el modal para iniciar sesion ante que el usuario solicite un turno
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
    
     //Se inicializa el plegable para agregar turnos desde el administrador
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);
    });

    