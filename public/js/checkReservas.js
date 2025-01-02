// Función que se ejecuta cuando cambia la selección de un radio button
function captureSelection(id) {
    // Configura el token CSRF en el encabezado de las solicitudes HTTP realizadas con axios
    axios.defaults.headers.common["X-CSRF-TOKEN"] = document.querySelector(
        'meta[name="csrf-token"]'
    ).content;

    // Obtiene el valor seleccionado del botón de radio correspondiente a la fila con el id especificado
    const selectedValue = document.querySelector(
        `input[name="checkInOut_${id}"]:checked`
    ).value;

    // Imprime en la consola el id de la fila y la opción seleccionada (check-in o check-out)
    // console.log(`Fila ${id}, opción seleccionada: ${selectedValue}`);

    // URL para la verificación en el backend, utilizada para verificar el estado del "quincho"
    const url2 = "/verificar-estado-quincho";

    // Verifica si la opción seleccionada es "check-in"
    if (selectedValue === "checkIn") {
        //   console.log({ id: parseInt(id) });

        // Realiza una solicitud POST para verificar el estado del "quincho" en el backend
        axios
            .post(url2, { id: parseInt(id) }) // Envía el id en el cuerpo de la solicitud
            .then(function (response) {
                // Maneja la respuesta del servidor
                //       console.log("Respuesta del servidor:", response.data);

                // Si hay un error en la respuesta, muestra una alerta con el mensaje de error
                if (response.data.error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.data.error,
                    });
                } else {
                    // Si no hay error, llama a la función para cambiar el estado
                    sendChangeStateRequest(id, selectedValue);
                }
            })
            .catch(function (error) {
                // Manejo de errores en la solicitud HTTP
                if (error.response) {
                    // Si el servidor respondió con un estado fuera del rango 2xx, muestra un mensaje de error
                    // console.error(
                    //     "Error en la respuesta del servidor:",
                    //     error.response
                    // );
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text:
                            error.response.data.message || // Muestra el mensaje de error proporcionado por el servidor
                            "Este quincho tiene un estado disponible actualmente.", // Mensaje genérico en caso de que no haya un mensaje específico
                    });
                } else {
                    // Si ocurrió un error al configurar la solicitud, muestra el mensaje en la consola
                    // console.error(
                    //     "Error al hacer la solicitud:",
                    //     error.message
                    // );
                }
            });
    } else {
        // Si la opción seleccionada no es "check-in" (por ejemplo, es "check-out"),
        // llama directamente a la función para cambiar el estado
        sendChangeStateRequest(id, selectedValue);
    }
}

// Función para enviar la solicitud de cambio de estado
function sendChangeStateRequest(id, estado) {
    const url = "/cambiar-estado-quincho";

    axios
        .post(url, {
            id: id, // ID de la reserva
            estado: estado, // El nuevo estado: 'checkIn', 'checkOut', 'Anular'
        })
        .then(function (response) {
          //  console.log("Estado actualizado:", response.data);

            // Actualizar el estado del quincho en la tabla
            const estadoButton = document.getElementById(
                `estado-quincho-${id}`
            );
            const row = document
                .querySelector(`#estado-quincho-${id}`)
                .closest("tr"); // Seleccionar la fila de la tabla

            if (estado === "checkIn") {
                estadoButton.className = "btn btn-danger btn-sm";
                estadoButton.textContent = "Ocupado";
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "El estado del quincho ahora es ocupado.",
                    showConfirmButton: false,
                    timer: 2500,
                });
            } else if (estado === "checkOut" || estado === "Anular") {
                estadoButton.className = "btn btn-success btn-sm";
                estadoButton.textContent = "Disponible";
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "El estado del quincho ahora es disponible.",
                    showConfirmButton: false,
                    timer: 2500,
                });
            }

            if (
                estado === "checkIn" ||
                estado === "checkOut" ||
                estado === "Anular"
            ) {
                row.remove();
            }
        })
        .catch(function (error) {
          //  console.error("Error al actualizar el estado:", error);
        });
}

// Recargar la página cada 1 minuto (60,000 milisegundos)
/*setInterval(function() {
    location.reload();
    console.log("Recargado");
}, 60000); // 60000 ms = 1 minuto
*/
