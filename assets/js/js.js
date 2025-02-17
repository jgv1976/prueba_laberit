document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#team-form");

    if (form) {
        form.addEventListener("submit", function (event) {
            let valid = true;
            let errorMessages = [];

            // Obtener valores del formulario
            const name = document.querySelector("#name").value.trim();
            const city = document.querySelector("#city").value.trim();
            const sport = document.querySelector("#sport").value;
            const foundedDate = document.querySelector("#founded_date").value;
            const history = document.querySelector("#history").value.trim();

            // Validar Nombre
            if (name.length < 3) {
                valid = false;
                errorMessages.push("El nombre del equipo debe tener al menos 3 caracteres.");
            }

            // Validar Ciudad
            if (city.length < 3) {
                valid = false;
                errorMessages.push("La ciudad debe tener al menos 3 caracteres.");
            }

            // Validar Deporte
            if (sport === "") {
                valid = false;
                errorMessages.push("Es necesario indicar un deporte.");
            }

            // Validar Fecha de Fundación
            if (foundedDate === "") {
                valid = false;
                errorMessages.push("Es necesario indicar una fecha de fundación.");
            }

            // Validar Historia
            if (history.length < 10) {
                valid = false;
                errorMessages.push("La historia del equipo debe tener al menos 10 caracteres.");
            }

            // Mostrar errores si los hay
            if (!valid) {
                event.preventDefault();
                alert(errorMessages.join("\n"));
            }
        });
    }
});
