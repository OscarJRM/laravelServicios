<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
</head>
<body>
    <h2>CRUD Estudiantes</h2>
    <p>Funciones de crear, editar y eliminar estudiantes.</p>
    
    <table id="dg" title="My Users" class="easyui-datagrid" style="width:700px;height:250px"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="CED_EST" width="50">Cédula</th>
                <th field="NOM_EST" width="50">Nombre</th>
                <th field="APE_EST" width="50">Apellido</th>
                <th field="DIR_EST" width="50">Dirección</th>
                <th field="TEL_EST" width="50">Teléfono</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Actualizar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Estudiante</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Información</h3>
            <div style="margin-bottom:10px">
                <input name="CED_EST" class="easyui-textbox" required="true" label="Cédula:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="NOM_EST" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="APE_EST" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="DIR_EST" class="easyui-textbox" required="true" label="Dirección:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="TEL_EST" class="easyui-textbox" required="true" label="Telefono:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

    <div id="dlge" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fme" method="PUT" novalidate style="margin:0;padding:20px 50px">
            <h3>Información</h3>
            <div style="margin-bottom:10px; display: none;">
                <input name="CED_EST" class="easyui-textbox" required="true" label="Cédula:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="NOM_EST" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="APE_EST" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="DIR_EST" class="easyui-textbox" required="true" label="Dirección:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="TEL_EST" class="easyui-textbox" required="true" label="Telefono:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="updateUser()" style="width:90px">Actualizar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    <script type="text/javascript">

$(function(){
    $.ajax({
        url: 'http://localhost/quinto/controllers/apiRest.php',
        type: "GET", // Tipo de solicitud POST para agregar datos
         dataType: "json",
        success: function(data){
            $('#dg').datagrid('loadData', data);
            console.log("SI vale");
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.log("NO");
        }
    });
});

function cargarTabla() {
    $.ajax({
        url: 'http://localhost/quinto/controllers/apiRest.php',
        type: "GET",
        dataType: "json",
        success: function(data){
            $('#dg').datagrid('loadData', data);
            console.log("Tabla cargada correctamente");
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.log("Error al cargar la tabla");
        }
    });
}

        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = 'controllers/apiRest.php';
        }
        function updateUser(){
            var formData = $('#fme').serialize(); 

    $.ajax({
        url: 'http://localhost/quinto/controllers/apiRest.php?' + formData, // Concatenar los datos del formulario a la URL
        type: 'PUT',
        dataType: 'json',
        success: function(result){
            // Manejar la respuesta
            $('#dlge').dialog('close'); // Cerrar el diálogo
                $('#dge').datagrid('reload'); // Recargar los datos de la tabla
                cargarTabla();
                $.messager.show({
                    title: 'Actualizado',
                    msg: 'El usuario se actualizó correctamente.'
                });

        },
        error: function(xhr, status, error){
            // Manejar errores
            console.log("MAL");
        }
    });

}

        function editUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        // Abrir el diálogo de edición
        $('#dlge').dialog('open').dialog('center').dialog('setTitle','Edit User');

        // Llenar el formulario con los datos del usuario seleccionado
        $('#fme').form('load',row);

        // Cambiar la URL para la solicitud de actualización
        url = 'controllers/apiRest.php?CED_EST=' + row.CED_EST;
    }
}

        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                method: 'POST',
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    result = JSON.parse(result); // Parsear la respuesta JSON
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlg').dialog('close'); // Cerrar el diálogo
                $('#dg').datagrid('reload'); // Recargar los datos de la tabla
                cargarTabla();
                $.messager.show({
                    title: 'Guardado',
                    msg: 'El usuario se guardó correctamente.'
                });
                    }
                }
            });
        }
        function destroyUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmación','¿Estas seguro de eliminar este estudiante?',function(r){
            if (r){
                eliminarRegistro(row.CED_EST); // Llama a la función para eliminar el usuario
            }
        });
    }
}

function eliminarRegistro(cedula) {
    $.ajax({
        url: "controllers/apiRest.php?CED_EST=" + cedula,
        type: "DELETE",
        success: function(data){
            cargarTabla(); // Recarga la tabla después de eliminar el usuario
            $.messager.show({
                title: 'Eliminado',
                msg: 'El usuario se eliminó correctamente.'
            });
        },
        error: function(jqXHR, textStatus, errorThrown){
            $.messager.show({
                title: 'Error',
                msg: 'Error al eliminar el usuario.'
            });
            console.log("Error al eliminar: " + textStatus + ", " + errorThrown);
            console.log(jqXHR);
        }
    });
}
    </script>
</body>
</html>