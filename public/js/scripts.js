const nombre = document.getElementById("nombreCompleto");
const rut = document.getElementById("rut");
const direccion = document.getElementById("direccion");
const telefono = document.getElementById("telefono");
const correo = document.getElementById("correo");
const dia = document.getElementById("datepicker");
const numero_quincho = document.getElementById("numeroQuincho");
const hora = document.getElementById("hora");
const numero_personas = document.getElementById("nPersonas");
const tipo_quinchos = document.getElementById("quinchos");
const reglamento = document.getElementById("aceptarReglamento");
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
const validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

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
}

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
    {
        input: numero_personas,
        errorLabel: document.getElementById("error-nPersonas"),
        errorMessage: "Por favor, ingrese número de personas.",
    },
];

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

                $(".btn-month").each(function () {
                    const monthValue = parseInt($(this).val());
                    const currentDate = new Date();
                    const currentMonth = currentDate.getMonth(); // Mes actual (0 = enero, 1 = febrero, ..., 10 = noviembre)
                    const currentYear = currentDate.getFullYear(); // Año actual (2024)

                    // Calcular los tres meses habilitados a partir del mes actual
                    const monthsAvailable = [
                        currentMonth, // mes actual
                        (currentMonth + 1) % 12, // mes siguiente (cuidado con el cambio de año)
                        (currentMonth + 2) % 12, // mes + 2 meses (cuidado con el cambio de año)
                    ];

                    const yearForNextMonth =
                        currentMonth + 1 >= 12 ? currentYear + 1 : currentYear; // Si el mes siguiente es enero, usar el próximo año

                    // Verificamos si el mes es habilitado
                    if (
                        (monthsAvailable.includes(monthValue) &&
                            currentYear === yearForNextMonth) ||
                        (monthsAvailable.includes(monthValue) &&
                            currentYear === currentYear)
                    ) {
                        $(this).addClass("enabled");
                        $(this).removeClass("disabled");
                    } else {
                        $(this).removeClass("enabled");
                        $(this).addClass("disabled");
                    }
                });

                $(".btn-month").each(function () {
                    const monthValue = parseInt($(this).val());

                    // Comprobar si el mes está en la lista de meses deshabilitados (que has deshabilitado manualmente)
                    if (monthsToDisable.includes(monthValue)) {
                        $(this).removeClass("enabled");
                        $(this).addClass("disabled"); // Si el mes está deshabilitado manualmente, se marca como deshabilitado
                    }
                });

                $("#datepicker-admin").datepicker("refresh");
            })
            .catch((error) => {
                //   console.error("Error loading disabled dates:", error);
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
        const currentDate = new Date();
        const currentMonth = currentDate.getMonth(); // Mes actual (0 = enero, 1 = febrero, ..., 10 = noviembre)
        const currentYear = currentDate.getFullYear(); // Año actual (2024)

        // Calcular los tres meses habilitados a partir del mes actual
        const monthsAvailable = [
            currentMonth, // mes actual
            (currentMonth + 1) % 12, // mes siguiente (cuidado con el cambio de año)
            (currentMonth + 2) % 12, // mes + 2 meses (cuidado con el cambio de año)
        ];

        const yearForNextMonth =
            currentMonth + 1 >= 12 ? currentYear + 1 : currentYear; // Si el mes siguiente es enero, usar el próximo año

        const select = document.getElementById("selectMes");

        // Recorremos las opciones y eliminamos las que no están en los tres meses habilitados
        for (let i = select.options.length - 1; i >= 0; i--) {
            const monthValue = parseInt(select.options[i].value);

            // Verificamos si el mes está dentro de los tres meses habilitados
            if (
                (monthsAvailable.includes(monthValue) &&
                    currentYear === yearForNextMonth) ||
                (monthsAvailable.includes(monthValue) &&
                    currentYear === currentYear)
            ) {
                select.options[i].disabled = false; // Si el mes está habilitado, lo mantenemos
            } else {
                select.remove(i); // Elimina la opción si el mes no está habilitado
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
                .then((response) => {
                    if (
                        response.data.message ===
                        "El mes ya está deshabilitado."
                    ) {
                        Swal.fire({
                            icon: "warning",
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "El mes ha sido deshabilitado con éxito!",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
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
                        //   console.error("Error disabling day:", error);
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
                .then((response) => {
                    if (response.data.message === "El mes ya está activo.") {
                        Swal.fire({
                            icon: "warning",
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "El mes ha sido activado con éxito!",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
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
                        // console.error("Error disabling day:", error);
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
                .then((response) => {
                    if (
                        response.data.message ===
                        "La fecha ya está deshabilitada."
                    ) {
                        Swal.fire({
                            icon: "warning",
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "El día ha sido deshabilitado con éxito!",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
                    cargarConfiguracionFechas();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 400) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text:
                                error.response.data.error ||
                                "Ocurrió un error al deshabilitar el día.",
                        });
                    } else {
                        //      console.error("Error disabling day:", error);
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
                .then((response) => {
                    if (
                        response.data.message === "La fecha ya está habilitada."
                    ) {
                        Swal.fire({
                            icon: "warning",
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "El día ha sido habilitado con éxito!",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
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
                        //    console.error("Error disabling day:", error);
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
                //  console.error("Error loading disabled dates:", error);
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

//Cambia la cantidad de personas máximas depeniendo el tipo de quincho.
document.getElementById("quinchos").addEventListener("change", function () {
    var selectedValue = this.value;
    var nPersonasInput = document.getElementById("nPersonas");

    if (selectedValue === "1") {
        nPersonasInput.max = 8;
        nPersonasInput.value = "";
    }

    if (selectedValue === "2") {
        nPersonasInput.max = 32;
        nPersonasInput.value = "";
    }
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
            //   console.log("Response data:", response.data);
            const quinchosContainer = $("#numeroQuincho");
            quinchosContainer.empty();

            if (response.data.length > 0) {
                response.data.forEach(function (quincho) {
                    quinchosContainer.append(
                        `<option value="${quincho.id}">${quincho.numero_quincho} ${quincho.accesibilidad === 'Sí' ? '- Accesibilidad Universal' : ''}</option>`

                    );
                });
            } else {
                quinchosContainer.append(
                    '<option value="" disabled>No hay quinchos disponibles para esta fecha y tipo de quincho.</option>'
                );
            }
        })
        .catch(function (error) {
            ///    console.error(error.response);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Ocurrió un error al obtener los quinchos disponibles.",
            });
        });
}

// Función para actualizar en tiempo real si cambia solo la fecha
function actualizarQuinchosDisponibles() {
    const tipoQuincho = $("#quinchos").val();
    const fechaInput = $("#datepicker").val();

    // console.log(fechaInput);
    // console.log(tipoQuincho);

    // Verificar que ambos campos tengan valores válidos
    if (fechaInput && tipoQuincho) {
        const fechaArriendo = moment(fechaInput, "DD/MM/YYYY", true); // true para formato estricto

        //console.log("fecha " + fechaArriendo);

        if (fechaArriendo.isValid()) {
            const fechaFormateada = fechaArriendo.format("YYYY-MM-DD");
            // console.log("Fecha Arriendo: " + fechaFormateada);
            // console.log("Tipo Quincho: " + tipoQuincho);
            obtenerQuinchosDisponibles(fechaFormateada, tipoQuincho);
        } else {
            // console.log("Fecha no válida.");
        }
    } else {
        // console.log("Esperando ambos campos: Fecha y Tipo de Quincho.");
    }
}

// Detecta cambios en el selector de fecha
$("#datepicker").change(function () {
    actualizarQuinchosDisponibles();
});

// Detecta cambios en el tipo de quincho
$("#quinchos").change(function () {
    actualizarQuinchosDisponibles();
});

//Validar todo el cuerpo del formulario
$("form").on("submit", function (event) {
    let isValid = true;
    const validPhone = /^[0-9]+$/;

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
                                    "/store",
                                    formData
                                );

                                await Swal.fire({
                                    title: "Tu quincho ha sido reservado con éxito!",
                                    text: "Todos los datos del formulario de la reserva se enviarán a su correo.",
                                    icon: "success",
                                });

                                limpiarFormulario();
                            } catch (error) {
                                // console.error(error);
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
                // console.error(error);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ocurrió un error al validar la reserva.",
                });
                desformatearFecha(dia);
            }
        };

        validateReserva();

        //Es importante desformatear la fecha para que coincida con el formato de la base de datos y pueda pasar el formulario
        function desformatearFecha(input) {
            var dateString = input.value;
            var dateParts = dateString.split("-");
            var formattedDate =
                dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0];
            input.value = formattedDate;
        }
    }
});
