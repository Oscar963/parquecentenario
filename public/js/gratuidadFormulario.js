const nombre = document.getElementById("nombreCompleto");
const rut = document.getElementById("rut");
const direccion = document.getElementById("direccion");
const telefono = document.getElementById("telefono");
const correo = document.getElementById("correo");
const dia = document.getElementById("datepicker");
const numero_quincho = document.getElementById("quinchosTableBody");
const hora = document.getElementById("hora");
const numero_personas = document.getElementById("nPersonas");
const tipo_quinchos = document.getElementById("quinchos");
const reglamento = document.getElementById("aceptarReglamento");
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
const validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
const datepickerRegionalEs = {
    closeText: "Cerrar",
    prevText: "< Ant",
    nextText: "Sig >",
    currentText: "Hoy",
    monthNames: [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
    ],
    monthNamesShort: [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
    ],
    dayNames: [
        "Domingo",
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
    ],
    dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Juv", "Vie", "Sáb"],
    dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
    weekHeader: "Sm",
    dateFormat: "dd/mm/yy",
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: "",
};

const inputs = [
    {
        input: dia,
        errorLabel: document.getElementById("error-dia"),
        errorMessage: "Seleccione un día.",
    },
    {
        input: nombre,
        errorLabel: document.getElementById("error-nombre"),
        errorMessage: "Por favor, ingresa tu nombre completo.",
    },
    {
        input: rut,
        errorLabel: document.getElementById("error-rut"),
        errorMessage: "Por favor, ingresa tu RUT.",
    },
    {
        input: direccion,
        errorLabel: document.getElementById("error-direccion"),
        errorMessage: "Por favor, ingresa tu dirección.",
    },
    {
        input: telefono,
        errorLabel: document.getElementById("error-telefono"),
        errorMessage: "Por favor, ingresa tu número de teléfono.",
    },
    {
        input: correo,
        errorLabel: document.getElementById("error-correo"),
        errorMessage: "Por favor, ingresa tu correo electrónico.",
    },
];

function limpiarFormulario() {
    rut.value = "";
    dia.value = null;
    nombre.value = "";
    telefono.value = "";
    correo.value = "";
    hora.value = "";
    tipo_quinchos.value = "";
    reglamento.checked = false;
    numero_personas.value = "";
    numero_quincho.value = "";
    direccion.value = "";
    quinchosSeleccionados = [];

    $("#quinchosSeleccionadosTableBody").empty();
    $("#quinchosTableBody")
        .find('input[type="checkbox"]')
        .prop("checked", false);
    $("#quinchosTableBody").empty();
}

//Deshabilitar el input de datepickr-admin para que no se ingresen valores númericos
$("#datepicker-admin")
    .on("focus", function () {
        $(this).attr("readonly", true);
    })
    .on("blur", function () {
        $(this).removeAttr("readonly");
    });

//Algoritmo para validar RUT
var Fn = {
    validaRut: function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐", "-");
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto)) return false;
        var tmp = rutCompleto.split("-");
        var digv = tmp[1];
        var rut = tmp[0];
        if (digv == "K") digv = "k";

        return Fn.dv(rut) == digv;
    },
    dv: function (T) {
        var M = 0,
            S = 1;
        for (; T; T = Math.floor(T / 10))
            S = (S + (T % 10) * (9 - (M++ % 6))) % 11;
        return S ? S - 1 : "k";
    },
};

$(function () {
    let monthsToDisable = [];
    let daysToDisable = [];

    $.datepicker.setDefaults(datepickerRegionalEs);

    function cargarConfiguracionFechas() {
        axios
            .get("/disabled-dates", {
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            })
            .then((response) => {
                const data = response.data;
                monthsToDisable = data.meses;
                daysToDisable = data.dias.map((date) => new Date(date));

                // Modificar para que incluya el día actual también
                const today = new Date();
                today.setHours(0, 0, 0, 0); // Asegurarse de que solo se compare la fecha sin horas

                daysToDisable = daysToDisable.filter((date) => {
                    date.setHours(0, 0, 0, 0); // Ajuste para ignorar la hora en la comparación
                    return date >= today; // Incluir el día de hoy como deshabilitado
                });

                actualizarListaDiasDeshabilitados();

                const currentMonth = new Date().getMonth();

                $(".btn-month").each(function () {
                    const monthValue = parseInt($(this).val());
                    if (
                        monthValue < currentMonth ||
                        monthsToDisable.includes(monthValue)
                    ) {
                        $(this).removeClass("enabled");
                        $(this).addClass("disabled");
                    } else {
                        $(this).addClass("enabled");
                        $(this).removeClass("disabled");
                    }
                });
                $("#datepicker-admin").datepicker("refresh");
            })
            .catch((error) => {
          //      console.error("Error loading disabled dates:", error);
            });
    }

    function actualizarListaDiasDeshabilitados() {
        const lista = $("#listaDiasDeshabilitados");
        lista.empty();

        daysToDisable.forEach((date) => {
            const formattedDate = $.datepicker.formatDate("dd-mm-yy", date);
            const listItem = $(
                `<li tabindex="0" class="list-item">${formattedDate}</li>`
            );

            listItem.on("click", function () {
                $("#datepicker-admin").datepicker("setDate", date);
            });

            lista.append(listItem);
        });
    }

    $("#datepicker-admin").datepicker({
        beforeShowDay: function (date) {
            const isDisabledDay = date.getDay() === 1;
            const isDisabledMonth = monthsToDisable.includes(date.getMonth());
            const isDisabledSpecificDay = daysToDisable.some(
                (d) =>
                    d.getDate() === date.getDate() &&
                    d.getMonth() === date.getMonth() &&
                    d.getFullYear() === date.getFullYear()
            );

            return [
                !isDisabledDay && !isDisabledMonth && !isDisabledSpecificDay,
            ];
        },
        minDate: 0,
        maxDate: (function () {
            const today = new Date();
            const currentMonth = today.getMonth();
            const currentYear = today.getFullYear();

            // Calcular el último día del tercer mes desde el mes actual
            const lastDayOfThirdMonth = new Date(
                currentYear,
                currentMonth + 3,
                0
            );

            return lastDayOfThirdMonth;
        })(),
        dateFormat: "dd/mm/yy",
    });

    cargarConfiguracionFechas();

    function mesesDisponibles() {
        const currentMonth = new Date().getMonth();
        const select = document.getElementById("selectMes");

        for (let i = select.options.length - 1; i >= 0; i--) {
            if (parseInt(select.options[i].value) < currentMonth) {
                select.remove(i);
            }
        }
    }
    mesesDisponibles();

    $("#deshabilitarMes").click(function () {
        const selectedMonth = parseInt($("#selectMes").val());
        if (!isNaN(selectedMonth)) {
            axios
                .post(
                    "/desactivar-mes",
                    { mes: selectedMonth },
                    {
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                    }
                )
                .then(() => {
                    Swal.fire("El mes ha sido deshabilidado con éxito!");
                    cargarConfiguracionFechas();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 400) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text:
                                error.response.data.error ||
                                "Ocurrió un error al deshabilitar el mes.",
                        });
                    } else {
                    //    console.error("Error disabling day:", error);
                    }
                });
        }
    });

    $("#habilitarMes").click(function () {
        const selectedMonth = parseInt($("#selectMes").val());
        if (!isNaN(selectedMonth)) {
            axios
                .post(
                    "/activar-mes",
                    { mes: selectedMonth },
                    {
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                    }
                )
                .then(() => {
                    Swal.fire("El mes ha sido habilitado con éxito!");
                    cargarConfiguracionFechas();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 400) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text:
                                error.response.data.error ||
                                "Ocurrió un error al habilitar el mes.",
                        });
                    } else {
                  //      console.error("Error disabling day:", error);
                    }
                });
        }
    });

    $("#deshabilitarDia").click(function () {
        const selectedDate = $("#datepicker-admin").datepicker("getDate");

        if (selectedDate) {
            const formattedDate = $.datepicker.formatDate(
                "yy-mm-dd",
                selectedDate
            );

            if (
                !daysToDisable.some(
                    (d) => d.toDateString() === selectedDate.toDateString()
                )
            ) {
                daysToDisable.push(selectedDate);
                actualizarListaDiasDeshabilitados();
            }
            axios
                .post(
                    "/desactivar-dia",
                    { dia: formattedDate },
                    {
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                    }
                )
                .then(() => {
                    Swal.fire("El día ha sido deshabilidado con éxito!");
                    cargarConfiguracionFechas();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 400) {
                        // Si hay un mensaje de error, lo mostramos
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text:
                                error.response.data.error ||
                                "Ocurrió un error al deshabilitar el día.",
                        });
                    } else {
                     //   console.error("Error disabling day:", error);
                    }
                });
        }
    });

    $("#habilitarDia").click(function () {
        const selectedDate = $("#datepicker-admin").datepicker("getDate");

        if (selectedDate) {
            const formattedDate = $.datepicker.formatDate(
                "yy-mm-dd",
                selectedDate
            );

            daysToDisable = daysToDisable.filter(
                (d) => d.toDateString() !== selectedDate.toDateString()
            );
            actualizarListaDiasDeshabilitados();
            axios
                .post(
                    "/activar-dia",
                    { dia: formattedDate },
                    {
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                    }
                )
                .then(() => {
                    Swal.fire("El día ha sido habilidado con éxito!");
                    cargarConfiguracionFechas();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 400) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text:
                                error.response.data.error ||
                                "Ocurrió un error al habilitar el día.",
                        });
                    } else {
                  //      console.error("Error disabling day:", error);
                    }
                });
        }
    });
    cargarConfiguracionFechas();
});

$(function () {
    let monthsToDisable = [];
    let daysToDisable = [];

    $.datepicker.setDefaults(datepickerRegionalEs);

    function cargarConfiguracionFechas() {
        axios
            .get("/disabled-dates", {
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            })
            .then((response) => {
                const data = response.data;
                monthsToDisable = data.meses;
                daysToDisable = data.dias.map((date) => new Date(date));
                $("#datepicker-admin").datepicker("refresh");
            })
            .catch((error) => {
             //   console.error("Error loading disabled dates:", error);
            });
    }

    $("#datepicker").datepicker({
        beforeShowDay: function (date) {
            const isDisabledDay = date.getDay() === 1;
            const isDisabledMonth = monthsToDisable.includes(date.getMonth());
            const isDisabledSpecificDay = daysToDisable.some(
                (d) =>
                    d.getDate() === date.getDate() &&
                    d.getMonth() === date.getMonth() &&
                    d.getFullYear() === date.getFullYear()
            );

            return [
                !isDisabledDay && !isDisabledMonth && !isDisabledSpecificDay,
            ];
        },
        minDate: 0,
        maxDate: (function () {
            const today = new Date();
            const currentMonth = today.getMonth();
            const currentYear = today.getFullYear();

            // Calcular el último día del tercer mes desde el mes actual
            const lastDayOfThirdMonth = new Date(
                currentYear,
                currentMonth + 3,
                0
            );

            return lastDayOfThirdMonth;
        })(),
        dateFormat: "dd/mm/yy",

        onSelect: function () {
            actualizarQuinchosDisponibles();
            dia.classList.remove("invalid");

            const errorLabel = document.getElementById("error-dia");
            if (errorLabel) {
                errorLabel.textContent = "";
                errorLabel.style.visibility = "hidden";
            }
        },
    });

    cargarConfiguracionFechas();
});

function validateInput(input, errorLabel, errorMessage) {
    if (input.value.trim() === "") {
        input.classList.add("invalid");
        errorLabel.textContent = errorMessage;
        errorLabel.style.visibility = "visible";
        return false;
    } else {
        input.classList.remove("invalid");
        errorLabel.style.visibility = "hidden";
        return true;
    }
}

inputs.forEach(({ input, errorLabel, errorMessage }) => {
    input.addEventListener("blur", () => {
        validateInput(input, errorLabel, errorMessage);
    });
});

nombre.addEventListener("blur", function () {
    if (!isNaN(nombre.value) && nombre.value.trim()) {
        const errorLabel = document.getElementById("error-nombre");
        nombre.classList.add("invalid");
        errorLabel.textContent = "No se permiten números.";
        errorLabel.style.visibility = "visible";
    }
});

rut.addEventListener("blur", function () {
    if (rut.value && !Fn.validaRut(rut.value)) {
        const errorLabel = document.getElementById("error-rut");
        rut.classList.add("invalid");
        errorLabel.textContent = "Rut no válido";
        errorLabel.style.visibility = "visible";
    }
});

correo.addEventListener("blur", function () {
    if (correo.value && !validEmail.test(correo.value)) {
        const errorLabel = document.getElementById("error-correo");
        correo.classList.add("invalid");
        errorLabel.textContent = "Correo inválido";
        errorLabel.style.visibility = "visible";
    }
});

telefono.addEventListener("input", function (event) {
    this.value = this.value.replace(/[^0-9]/g, "");
});

reglamento.addEventListener("input", function (event) {
    const errorLabel = document.getElementById("error-aceptar-reglamento");
    if (reglamento.checked) {
        reglamento.classList.remove("invalid");
        errorLabel.style.visibility = "hidden";
    }
});

let quinchosSeleccionados = [];
let capacidadTotal = 0;

function obtenerQuinchosDisponibles(fechaFormateada, tipoQuincho) {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    axios
        .post(
            "/quinchos-disponibles",
            {
                fecha_arriendo: fechaFormateada,
                tipo_quincho: tipoQuincho,
            },
            {
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            }
        )
        .then(function (response) {
            // console.log("Response data:", response.data);
            const quinchosTableBody = $("#quinchosTableBody");
            quinchosTableBody.empty();

            if (response.data.length > 0) {
                response.data.forEach(function (quincho) {
                    const isChecked = quinchosSeleccionados.some(
                        (q) => q.id === quincho.id
                    )
                        ? "checked"
                        : ""; // Verificar si ya está seleccionado
                    quinchosTableBody.append(
                        `<tr>
                            <td>
                                <input type="checkbox" name="quinchos[]" value="${
                                    quincho.id
                                }" ${isChecked} onchange="actualizarSeleccionados(this)">
                            </td>
                            <td>${quincho.numero_quincho}</td>
                            <td>${quincho.accesibilidad ? "Sí" : "No"}</td>
                        </tr>`
                    );
                });

                // Restaurar el estado de los checkboxes seleccionados
                quinchosTableBody
                    .find('input[type="checkbox"]')
                    .each(function () {
                        const checkbox = $(this);
                        if (
                            quinchosSeleccionados.some(
                                (q) => q.id == checkbox.val()
                            )
                        ) {
                            checkbox.prop("checked", true);
                        }
                    });
            } else {
                quinchosTableBody.append(
                    `<tr>
                        <td colspan="3" class="text-center">No hay quinchos disponibles para esta fecha y tipo de quincho.</td>
                    </tr>`
                );
            }
        })
        .catch(function (error) {
            //     console.error(error.response);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Ocurrió un error al obtener los quinchos disponibles.",
            });
        });
}

// Función para actualizar el arreglo de quinchos seleccionados
function actualizarSeleccionados(checkbox) {
    const quinchoId = parseInt(checkbox.value);
    const tipoQuincho = $("#quinchos").val();

    if (checkbox.checked) {
        quinchosSeleccionados.push({ id: quinchoId, tipo: tipoQuincho }); // Agregar a seleccionados
        if (tipoQuincho === "1") {
            capacidadTotal += 8;
        } else if (tipoQuincho === "2") {
            capacidadTotal += 32;
        }
        // console.log(quinchosSeleccionados);
    } else {
        const quinchoIndex = quinchosSeleccionados.findIndex(
            (q) => q.id === quinchoId
        );
        if (quinchoIndex !== -1) {
            const { tipo } = quinchosSeleccionados[quinchoIndex];

            if (tipo === "1") {
                capacidadTotal = Math.max(0, capacidadTotal - 8);
            } else if (tipo === "2") {
                capacidadTotal = Math.max(0, capacidadTotal - 32);
            }

            quinchosSeleccionados.splice(quinchoIndex, 1); // Eliminar de seleccionados
        }
    }

    document.getElementById("nPersonas").value = capacidadTotal;
    document.getElementById("numeroQuinchoInput").value = quinchosSeleccionados
        .map((q) => q.id)
        .join(",");
}

// Función para actualizar en tiempo real si cambia solo la fecha
let fechaAnterior = "";
function actualizarQuinchosDisponibles() {
    const tipoQuincho = $("#quinchos").val();
    const fechaInput = $("#datepicker").val();

    // console.log(fechaInput);
    // console.log(tipoQuincho);

    // Verificar que ambos campos tengan valores válidos
    if (fechaInput && tipoQuincho) {
        const fechaArriendo = moment(fechaInput, "DD/MM/YYYY", true); // true para formato estricto

      //  console.log("fecha " + fechaArriendo);

        if (fechaArriendo.isValid()) {
            const fechaFormateada = fechaArriendo.format("YYYY-MM-DD");

            // Solo resetear capacidadTotal y quinchosSeleccionados si la fecha ha cambiado
            if (fechaFormateada !== fechaAnterior) {
                quinchosSeleccionados = [];
                capacidadTotal = 0;
                document.getElementById("nPersonas").value = capacidadTotal;
                document.getElementById("numeroQuinchoInput").value = "";
                $("#quinchosSeleccionadosTableBody").empty();
                fechaAnterior = fechaFormateada;
            }

            // console.log("Fecha Arriendo: " + fechaFormateada);
            // console.log("Tipo Quincho: " + tipoQuincho);

            obtenerQuinchosDisponibles(fechaFormateada, tipoQuincho);
        } else {
            //   console.log("Fecha no válida.");
        }
    } else {
        //    console.log("Esperando ambos campos: Fecha y Tipo de Quincho.");
    }
}

$("#datepicker").change(function () {
    actualizarQuinchosDisponibles();
});

$("#quinchos").change(function () {
    actualizarQuinchosDisponibles();
});

$(document).ready(function () {
    // Escuchar cambios en los checkboxes de la tabla de quinchos
    $("#quinchosTableBody").on("change", 'input[type="checkbox"]', function () {
        const $checkbox = $(this);
        const $row = $checkbox.closest("tr");

        if ($checkbox.is(":checked")) {
            // Si el checkbox está seleccionado, agregar la fila a la tabla de seleccionados
            const newRow = $row.clone(); // Clonar la fila
            newRow.find('input[type="checkbox"]').prop("checked", true); // Asegurarse de que el checkbox esté marcado
            newRow.find('input[type="checkbox"]').attr("disabled", false); // Deshabilitar el checkbox
            $("#quinchosSeleccionadosTableBody").append(newRow); // Agregar la fila a la tabla de seleccionados
        } else {
            // Si el checkbox se deselecciona, eliminar la fila correspondiente de la tabla de seleccionados
            const quinchoId = $row.find('input[type="checkbox"]').val(); // Obtener el ID del quincho
            $('#quinchosSeleccionadosTableBody input[type="checkbox"]').each(
                function () {
                    if ($(this).val() === quinchoId) {
                        $(this).closest("tr").remove(); // Eliminar la fila correspondiente
                    }
                }
            );
        }
    });

    // Escuchar cambios en los checkboxes de la tabla de quinchos seleccionados
    $("#quinchosSeleccionadosTableBody").on(
        "change",
        'input[type="checkbox"]',
        function () {
            const $checkbox = $(this);
            const $row = $checkbox.closest("tr");
            if (!$checkbox.is(":checked")) {
                // Si el checkbox de los seleccionados se deselecciona, eliminar la fila correspondiente
                const quinchoId = $row.find('input[type="checkbox"]').val(); // Obtener el ID del quincho
                $row.remove(); // Eliminar la fila de la tabla de seleccionados
                // Deseleccionar el checkbox correspondiente en la tabla de quinchos
                $('#quinchosTableBody input[type="checkbox"]').each(
                    function () {
                        if ($(this).val() === quinchoId) {
                            $(this).prop("checked", false); // Desmarcar el checkbox
                        }
                    }
                );
            }
        }
    );
});

//Validar todo el cuerpo del formulario
$("form").on("submit", function (event) {
    let isValid = true;
    const validPhone = /^[0-9]+$/;
    const selectedQuinchos = $(
        "#quinchosTableBody input[type='checkbox']:checked"
    );

    if (dia.value === "") {
        const errorLabel = document.getElementById("error-dia");
        if (errorLabel) {
            dia.classList.add("invalid");
            errorLabel.textContent = "Seleccione un día.";
            errorLabel.style.visibility = "visible";
            isValid = false;
        }
    }

    if (!isNaN(nombre.value) && nombre.value.trim()) {
        const errorLabel = document.getElementById("error-nombre");
        nombre.classList.add("invalid");
        errorLabel.textContent = "No se permiten números.";
        errorLabel.style.visibility = "visible";
        isValid = false;
    }

    if (!reglamento.checked) {
        const errorLabel = document.getElementById("error-aceptar-reglamento");
        reglamento.classList.add("invalid");
        errorLabel.textContent = "Debe aceptar el reglamento.";
        errorLabel.style.visibility = "visible";
        isValid = false;
    }

    inputs.forEach(({ input, errorLabel, errorMessage }) => {
        const valid = validateInput(input, errorLabel, errorMessage);
        if (!valid) {
            isValid = false;
        }
    });

    if (correo.value && !validEmail.test(correo.value)) {
        const errorLabel = document.getElementById("error-correo");
        correo.classList.add("invalid");
        errorLabel.textContent = "Correo inválido";
        errorLabel.style.visibility = "visible";
        isValid = false;
    }

    if (rut.value && !Fn.validaRut(rut.value)) {
        const errorLabel = document.getElementById("error-rut");
        rut.classList.add("invalid");
        errorLabel.textContent = "Rut no válido";
        errorLabel.style.visibility = "visible";
        isValid = false;
    }

    if (telefono.value && !validPhone.test(telefono.value)) {
        const errorLabel = document.getElementById("error-telefono");
        telefono.classList.add("invalid");
        errorLabel.textContent = "Debe escribir solo números";
        errorLabel.style.visibility = "visible";
        isValid = false;
    }

    if (selectedQuinchos.length === 0) {
        const errorLabel = document.getElementById(
            "error-seleccion-quinchos-lista"
        );
        errorLabel.textContent = "Debe seleccionar al menos un quincho.";
        errorLabel.style.visibility = "visible";
        isValid = false;
    }

    if (isValid) {
        const dateString = dia.value;
        const dateParts = dateString.split("/");
        const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
        dia.value = formattedDate;
    }

    // Evitar el envío del formulario si hay errores de validación
    if (!isValid) {
        event.preventDefault();
    } else {
        event.preventDefault();

        const validateReserva = async () => {
            try {
                const diaInhabilitadoResponse = await axios.post(
                    "/disponibilidad-dia",
                    {
                        fecha_arriendo: dia.value,
                    }
                );

                if (!diaInhabilitadoResponse.data.disponible) {
                    Swal.fire({
                        icon: "error",
                        title: "Día no disponible",
                        text:
                            diaInhabilitadoResponse.data.message ||
                            "Este día no se puede reservar.",
                    });
                    desformatearFecha(dia);
                    return;
                }

                const response = await axios.post("/validar-reserva", {
                    rut: rut.value,
                    fecha_arriendo: dia.value,
                });

                if (response.data.disponible) {
                    const dupResponse = await axios.post(
                        "/validar-reservas-duplicadas",
                        {
                            numero_quincho: numero_quincho.value,
                            fecha_arriendo: dia.value,
                        }
                    );

                    if (dupResponse.data.disponible) {
                        const result = await Swal.fire({
                            title: "¿Estás seguro que quieres arrendar?",
                            text: "No podrás revertir esta acción",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Confirmar!",
                        });

                        if (result.isConfirmed) {
                            const loadingToast = Swal.fire({
                                title: "Cargando...",
                                text: "Por favor, espera mientras se guarda tu reserva.",
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                },
                            });

                            try {
                                const formData = new FormData($("form")[0]);
                                const saveResponse = await axios.post(
                                    "/formulario-gratuidad",
                                    formData
                                );

                                await Swal.fire({
                                    title: "Tu quincho ha sido reservado con éxito!",
                                    text: "Todos los datos del formulario de la reserva se enviarán a su correo.",
                                    icon: "success",
                                });

                                limpiarFormulario();
                            } catch (error) {
                              //  console.error(error);
                                await Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Ocurrió un error al guardar la reserva.",
                                });
                                desformatearFecha(dia);
                            } finally {
                                Swal.close();
                            }
                        }
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Alguien se adelantó y ya reservó este quincho.",
                        });
                        desformatearFecha(dia);
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ya tienes una reserva para este día.",
                    });
                    desformatearFecha(dia);
                }
            } catch (error) {
              //  console.error(error);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ocurrió un error al validar la reserva.",
                });
                desformatearFecha(dia);
            }
        };

        validateReserva();

        function desformatearFecha(input) {
            var dateString = input.value;
            var dateParts = dateString.split("-");
            var formattedDate =
                dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0];
            input.value = formattedDate;
        }
    }
});
