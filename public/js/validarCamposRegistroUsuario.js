document.getElementById("registroUsuario").addEventListener("submit", function (event) {
        
        const nombre = document.getElementById("nombre").value.trim();
        const correo = document.getElementById("correo").value.trim();
        const contrasena = document.getElementById("contrasena").value.trim();
        const rol = document.getElementById("rol").value;
        const validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        
        if (nombre === "" || correo === "" || contrasena === "" || rol === "") {
            event.preventDefault(); 
            Swal.fire({
                icon: "warning",
                title: "Campos vacíos",
                text: "Por favor, completa todos los campos requeridos.",
            });
            return; 
        }

        if (contrasena.length < 8) {
            event.preventDefault();
            Swal.fire({
                icon: "warning",
                title: "La contraseña debe tener al menos 8 caracteres",
                text: "Vuelva a intentarlo.",
            });
            return; 
        }

        if (!/\d/.test(contrasena)) {
            event.preventDefault();
            Swal.fire({
                icon: "warning",
                title: "La contraseña debe tener números",
                text: "Vuelva a intentarlo.",
            });
            return;
        }

        if (!/[a-z]/.test(contrasena) || !/[A-Z]/.test(contrasena)) {
            event.preventDefault();
            Swal.fire({
                icon: "warning",
                title: "La contraseña debe tener mayúsculas y minúsculas",
                text: "Vuelva a intentarlo.",
            });
            return;
        }
        
        if (!validEmail.test(correo)) {
            event.preventDefault(); 
            Swal.fire({
                icon: "error",
                title: "Correo inválido",
                text: "Por favor, introduce un correo electrónico válido.",
            });
        }
});
