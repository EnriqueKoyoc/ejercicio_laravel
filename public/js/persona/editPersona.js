function uploadData(c) {
    let peroson = c.split("||");
    // Variables
    let id = peroson[0];
    let curp = peroson[1];
    let apellidoP = peroson[2];
    let apellidoM = peroson[3];
    let nombre = peroson[4];
    let fechaN = peroson[5];
    let sexo = peroson[6];
    let correo = peroson[7];


    // se ingresa los valores en el campo correspondiente 
    $("#perCurp2").val(curp);
    $("#perNombre2").val(nombre);
    $("#perApellido12").val(apellidoP);
    $("#perApellido22").val(apellidoM);
    let nuevaFecha = new Date(fechaN);
    let fecha = (nuevaFecha.getDate() + 1) + "-" + (nuevaFecha.getMonth() + 1) + "-" + nuevaFecha.getFullYear();
    $("#perFechaNac2").val(fecha);
    if (sexo == "M") {
        $("#perSexo12").prop("checked", true);
    } else {
        $("#perSexo2").prop("checked", true);
    }
    $("#perCorreo12").val(correo);
    $("#id_p").val(id);

    // abrir el modal para editar 
    $("#up_persona").modal({
        backdrop: "static",
        show: true,
    });
}


function detalles(c) {
    let peroson = c.split("||");
    // Variables
    let id = peroson[0];
    let curp = peroson[1];
    let apellidoP = peroson[2];
    let apellidoM = peroson[3];
    let nombre = peroson[4];
    let fechaN = peroson[5];
    let sexo = peroson[6];
    let correo = peroson[7];


    // se ingresa los valores en el campo correspondiente 
    $("#perCurp23").val(curp);
    $("#perNombre23").val(nombre);
    $("#perApellido123").val(apellidoP);
    $("#perApellido223").val(apellidoM);
    let nuevaFecha = new Date(fechaN);
    let fecha = (nuevaFecha.getDate() + 1) + "-" + (nuevaFecha.getMonth() + 1) + "-" + nuevaFecha.getFullYear();
    $("#perFechaNac23").val(fecha);
    if (sexo == "M") {
        $("#perSexo123").prop("checked", true);
    } else {
        $("#perSexo23").prop("checked", true);
    }
    $("#perCorreo123").val(correo);
    $("#id_p3").val(id);

    // abrir el modal para editar 
    $("#up_persona_detalle").modal({
        backdrop: "static",
        show: true,
    });
}