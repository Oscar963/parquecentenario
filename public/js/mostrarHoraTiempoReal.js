function actualizarFecha() {
    // Obtener la hora actual de Chile
    const fecha = new Date().toLocaleString('es-MX', { 
        timeZone: 'America/Santiago', 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit', 
        hour12: false 
    });
    document.getElementById('fecha').innerText = fecha;
}

// Actualiza la fecha cada segundo
setInterval(actualizarFecha, 1000);
// Cargar la fecha al inicio
actualizarFecha();

