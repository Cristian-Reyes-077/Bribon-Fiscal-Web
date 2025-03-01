$("#close-modal-button").click(function() {
	$(".sign-up-modal").fadeOut(200);
	$(".sign-up-modal").fadeIn(200);
});

function updateTime() {
	const now = new Date();
	document.getElementById("datetime").innerText = now.toLocaleString();
}
setInterval(updateTime, 1000);
updateTime();

function showText(text) {
	document.getElementById("info-box").innerHTML = `<p class='fs-4 text-center'>${text}</p>`;
}

function showForm(type) {
	let formHtml = "";
	if (type === 'login') {
		formHtml = `
                    <h3 class='text-center'>Login</h3>
                    <input type="text" class="form-control mb-2" placeholder="Usuario">
                    <input type="password" class="form-control mb-2" placeholder="Contraseña">
                    <button class="btn btn-primary w-100">Entrar</button>
		`;
	} else {
		formHtml = `
                    <h3 class='text-center'>Registro</h3>
                    <input type="text" class="form-control mb-2" placeholder="Nombre">
                    <input type="email" class="form-control mb-2" placeholder="Correo">
                    <input type="password" class="form-control mb-2" placeholder="Contraseña">
                    <button class="btn btn-success w-100">Registrar</button>
		`;
	}
	document.getElementById("form-box").innerHTML = formHtml;
}

// // Actualizar fecha y hora
// function updateDateTime() {
// 	const now = new Date();
// 	const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
// 	document.getElementById('datetime').textContent = now.toLocaleDateString('es-ES', options);
// }
// setInterval(updateDateTime, 1000);
// updateDateTime();

        // Manejar clic en preguntas
// document.querySelectorAll('.questions label').forEach(label => {
// 	label.addEventListener('click', () => {
// 		document.querySelectorAll('.answers').forEach(answer => {
// 			answer.style.display = 'none';
// 		});
// 		document.getElementById(label.getAttribute('data-target')).style.display = 'block';
// 	});
// });
// Manejar clic en preguntas
document.querySelectorAll('.questions label').forEach(label => {
    label.addEventListener('click', () => {
        const targetId = label.getAttribute('data-target');
        const targetAnswer = document.getElementById(targetId);

        // Verificar si ya está visible
        if (targetAnswer.style.display === 'block') {
            return; // Si ya está visible, no hacer nada
        }

        // Ocultar todas las respuestas
        document.querySelectorAll('.answers').forEach(answer => {
            answer.style.display = 'none';
        });

        // Mostrar la respuesta seleccionada
        targetAnswer.style.display = 'flex'; // Asegurar que se mantenga en flex para la estructura correcta

        // Remover la clase 'selected' de todas las preguntas
        document.querySelectorAll('.questions label').forEach(l => l.classList.remove('selected'));

        // Agregar la clase 'selected' a la pregunta clickeada
        label.classList.add('selected');
    });
});



$(document).ready(function () {
    // Mostrar el modal al hacer clic en el botón de inicio de sesión
	$(".navbar button").click(function () {
		$("#loginModal").fadeIn();
		$(".modal-overlay").fadeIn();
	});

    // Cerrar el modal al hacer clic en el botón de cierre
	$("#close-modal-button").click(function () {
		$("#loginModal").fadeOut();
		$(".modal-overlay").fadeOut();
	});

    // Cerrar el modal si se hace clic fuera de él
	$(".modal-overlay").click(function () {
		$("#loginModal").fadeOut();
		$(".modal-overlay").fadeOut();
	});


});


