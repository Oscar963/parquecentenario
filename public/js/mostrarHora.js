//Aquí se cambia las horas disponibles de la selección de horas del formulario.
document.addEventListener("DOMContentLoaded", () => {
    const hora = document.getElementById("hora");

    const horasDisponibles = ["10:00","10:30", "11:00", "11:30", "12:00", "12:30", "13:00"];

    // Evento que se dispara cuando el select recibe el foco (cuando el usuario hace clic en el select)
    hora.addEventListener("focus", () => {
        // Verificar si ya se han agregado las opciones para evitar duplicados
        if (hora.options.length === 0) {
            horasDisponibles.forEach((time) => {
                hora.append(new Option(time, time));
            });
        }
    });

    // Captura el evento 'reset' del formulario
    document.querySelector("form").addEventListener("reset", function () {
        // Aquí eliminamos las opciones dinámicamente para reiniciar el `select`
        while (hora.options.length > 0) {
            hora.remove(0);
        }
    });
});
