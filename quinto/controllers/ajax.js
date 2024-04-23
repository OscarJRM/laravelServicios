$(document).ready(function(){
    $("#btnAgregarEstudiante").click(function(){  
        $("#formularioEstudiante").toggle(); // Mostrar/ocultar formulario al hacer clic en el botón
    });

    $("#formEstudiante").submit(function(event){
        // Prevenir el envío por defecto del formulario
        event.preventDefault();

        // Serializar los datos del formulario
        var formData = $(this).serialize();

        // Realizar la solicitud AJAX para agregar el estudiante
        $.ajax({
            url: "http://localhost/quinto/controllers/apiRest.php",
            type: "POST", // Tipo de solicitud POST para agregar datos
            dataType: "json",
            data: formData, // Datos del formulario serializados
            success: function(response){
                // Si la solicitud fue exitosa, recargar la tabla para mostrar el nuevo estudiante
                cargarTabla();
                $("#formularioEstudiante").hide();
                
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log("Error al agregar estudiante: " + textStatus + ", " + errorThrown);
                console.log(jqXHR);
            }
        });
    });
    

    // Manejar el envío del formulario de edición
    $("#formEditarEstudiante").submit(function(event){
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "http://localhost/quinto/controllers/apiRest.php?" + formData,
            type: "PUT", // Cambiar a tipo PUT para actualizar datos
            dataType: "json",
            data: formData,
            success: function(response){
                cargarTabla();
                $("#formularioEditar").hide();

            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log("Error al editar estudiante: " + textStatus + ", " + errorThrown);
                console.log(jqXHR);
            }
        });
    });



    

    function cargarTabla() {
        $.ajax({
            url: "http://localhost/quinto/controllers/apiRest.php",
            type: "GET",
            dataType: "json",
            success: function(data){
                $("#tablaDatos tbody").empty();
                $.each(data, function(index, item){
                    var newRow = "<tr><td>" + item.CED_EST + "</td><td>" + item.NOM_EST + "</td><td>" + item.APE_EST + "</td><td>"+ item.DIR_EST + "</td><td>"+ item.TEL_EST + "</td><td><button class='btnEliminar' data-cedula='" + item.CED_EST + "'>Eliminar</button><button class='btnEditar' data-cedula='" + item.CED_EST + "' data-nombre='" + item.NOM_EST + "' data-apellido='" + item.APE_EST + "' data-direccion='" + item.DIR_EST + "' data-telefono='" + item.TEL_EST + "'>Editar</button></td></tr>";
                    $("#tablaDatos tbody").append(newRow);
                });
                 // Aplicar estilos a los botones
    
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log("Error al cargar la tabla: " + textStatus + ", " + errorThrown);
                console.log(jqXHR);
            }
        });
    }

    cargarTabla();

    $(document).on("click", ".btnEliminar", function(){
        var cedula = $(this).data("cedula");
        eliminarRegistro(cedula);
    });

    $(document).on("click", ".btnEditar", function(){
        var cedula = $(this).data("cedula");
        var nombre = $(this).data("nombre");
        var apellido = $(this).data("apellido");
        var direccion = $(this).data("direccion");
        var telefono = $(this).data("telefono");

        // Mostrar el formulario de edición con los datos del estudiante seleccionado
        $("#formularioEditar").show();
        $("#formEditarEstudiante #CED_EST").val(cedula);
        $("#formEditarEstudiante #NOM_EST").val(nombre);
        $("#formEditarEstudiante #APE_EST").val(apellido);
        $("#formEditarEstudiante #DIR_EST").val(direccion);
        $("#formEditarEstudiante #TEL_EST").val(telefono);
    });

    function eliminarRegistro(cedula) {
        $.ajax({
            url: "http://localhost/quinto/controllers/apiRest.php?CED_EST=" + cedula,
            type: "DELETE",
            success: function(data){
                cargarTabla();
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log("Error al eliminar: " + textStatus + ", " + errorThrown);
                console.log(jqXHR);
            }
        });
    }
});
