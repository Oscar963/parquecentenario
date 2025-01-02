//Esta porción de código pertenece a la ventana de historial y reservas para validar los inputs de búsqueda.
document.getElementById("limpiar-btn").addEventListener("click", function (event) {
    document.getElementById('form').reset();
});

document.getElementById("submit-btn").addEventListener("click", function (event) {
        var quincho = document.getElementById("quincho").value;
        var rut = document.getElementById("rut").value;
        var nombre = document.getElementById("nombre").value;
        var fecha_arriendo = document.getElementById("datepicker").value;
        var hora = document.getElementById("hora").value;

        if (!quincho && !rut && !nombre && !fecha_arriendo && !hora) {
            event.preventDefault();
            Swal.fire("Debe por lo menos llenar un campo para buscar.");
        } else {
            document.querySelector("form").submit();
        }
    });


