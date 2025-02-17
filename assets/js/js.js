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

document.addEventListener("DOMContentLoaded", function () {
    const addPlayerForm = document.querySelector("#addPlayerForm");

    if (addPlayerForm) {
        addPlayerForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Evitar el envío tradicional del formulario

            let formData = new FormData(addPlayerForm);

            fetch("control.php?action=add_player", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Recargar la página para actualizar la lista de jugadores
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Ocurrió un error al intentar guardar el jugador.");
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-player").forEach(button => {
        button.addEventListener("click", function () {
            let playerId = this.getAttribute("data-player-id");

            if (!confirm("¿Estás seguro de que deseas eliminar este jugador?")) {
                return;
            }

            fetch("control.php?action=delete_player", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "id=" + encodeURIComponent(playerId)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Recargar la página después de eliminar
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Ocurrió un error al intentar eliminar el jugador.");
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Abrir modal y cargar datos
    document.querySelectorAll(".edit-player").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelector("#edit-player-id").value = this.getAttribute("data-player-id");
            document.querySelector("#edit-player-name").value = this.getAttribute("data-player-name");
            document.querySelector("#edit-player-number").value = this.getAttribute("data-player-number");
            document.querySelector("#edit-player-captain").checked = this.getAttribute("data-player-captain") === "1";

            let modal = new bootstrap.Modal(document.querySelector("#editPlayerModal"));
            modal.show();
        });
    });

    // Enviar datos editados por AJAX
    document.querySelector("#editPlayerForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("control.php?action=edit_player", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Recargar la página después de la actualización
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Ocurrió un error al intentar actualizar el jugador.");
        });
    });
});
