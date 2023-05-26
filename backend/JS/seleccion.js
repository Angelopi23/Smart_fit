const select = document.querySelector('#select');
const opciones = document.querySelector('#opciones');
const contenidoSelect = document.querySelector('#contselect .descripcion');
const hiddenInput = document.querySelector('#inputSelect');

document.querySelectorAll('#opciones > .opcion').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelect.innerHTML = e.currentTarget.innerHTML;
		select.classList.toggle('active');
		opciones.classList.toggle('active');
		hiddenInput.value = e.currentTarget.querySelector('.titulo').innerText;
	});
});

select.addEventListener('click', () => {
	select.classList.toggle('active');
	opciones.classList.toggle('active');
});





const selectzona = document.querySelector('#selectzona');
const opcioneszona = document.querySelector('#opcioneszona');
const contenidoSelectzona = document.querySelector('#contselectzona .descripcionzona');
const hiddenInputzona = document.querySelector('#inputSelectzona');

document.querySelectorAll('#opcioneszona > .opcionzona').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelectzona.innerHTML = e.currentTarget.innerHTML;
		selectzona.classList.toggle('active');
		opcioneszona.classList.toggle('active');
		hiddenInputzona.value = e.currentTarget.querySelector('.titulozona').innerText;
	});
});

selectzona.addEventListener('click', () => {
	selectzona.classList.toggle('active');
	opcioneszona.classList.toggle('active');
});




const selectmaq = document.querySelector('#selectmaq');
const opcionesmaq = document.querySelector('#opcionesmaq');
const opcionmaq = document.querySelector('#opcionmaq');
const contenidoSelectmaq = document.querySelector('#contselectmaq .descripcionmaq');
const contenidoOptionmaq = document.querySelector('#contoptionmaq .descripcionmaq');
const hiddenInputmaq = document.querySelector('#inputSelectmaq');

/*
document.querySelectorAll('#opcionesmaq > .opcionmaq').forEach(opcion => {
	console.log('jul');
	opcion.addEventListener('click', e => {
		e.preventDefault();
		contenidoSelectmaq.innerHTML = e.currentTarget.innerHTML;
		selectmaq.classList.toggle('active');
		opcionesmaq.classList.toggle('active');
		hiddenInputmaq.value = e.currentTarget.querySelector('.titulomaq').innerText;
	});
});
*/
function seleccionarMaq(event){
	const contenidoOptionmaq = event.target.innerHTML;
	contenidoSelectmaq.innerHTML = contenidoOptionmaq;
	selectmaq.classList.toggle('active');
	opcionesmaq.classList.toggle('active');
};

selectmaq.addEventListener('click', () => {
	selectmaq.classList.toggle('active');
	opcionesmaq.classList.toggle('active');
});



const selectdia = document.querySelector('#selectdia');
const opcionesdia = document.querySelector('#opcionesdia');
const contenidoSelectdia = document.querySelector('#contselectdia .descripciondia');
const hiddenInputdia = document.querySelector('#inputSelectdia');

document.querySelectorAll('#opcionesdia > .opciondia').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelectdia.innerHTML = e.currentTarget.innerHTML;
		selectdia.classList.toggle('active');
		opcionesdia.classList.toggle('active');
		hiddenInputdia.value = e.currentTarget.querySelector('.titulodia').innerText;
	});
});

selectdia.addEventListener('click', () => {
	selectdia.classList.toggle('active');
	opcionesdia.classList.toggle('active');
});



/*SELECCION TURNOS*/
const selectturnos = document.querySelector('#selectturnos');
const opcionesturnos = document.querySelector('#opcionesturnos');
const contenidoSelectturnos = document.querySelector('#contselectturnos .descripcionturnos');
const hiddenInputturnos = document.querySelector('#inputSelectturnos');

document.querySelectorAll('#opcionesturnos > .opcionturnos').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelectturnos.innerHTML = e.currentTarget.innerHTML;
		selectturnos.classList.toggle('active');
		opcionesturnos.classList.toggle('active');
		hiddenInputturnos.value = e.currentTarget.querySelector('.descripcionturnos').innerText;
	});
});

selectturnos.addEventListener('click', () => {
	selectturnos.classList.toggle('active');
	opcionesturnos.classList.toggle('active');
});

/*SELECCION DE HORARIOS */
const selecthora = document.querySelector('#selecthora');
const opcioneshora = document.querySelector('#opcioneshora');
const opcionhora = document.querySelector('#opcionhora');
const contenidoSelecthora = document.querySelector('#contselecthora .descripcionhora');
const contenidoOptionhora = document.querySelector('#contoptionhora .descripcionhora');
const hiddenInputhora = document.querySelector('#inputSelecthora');


function seleccionarhora(event){
	const contenidoOptionhora = event.target.innerHTML;
	contenidoSelecthora.innerHTML = contenidoOptionhora;
	selecthora.classList.toggle('active');
	opcioneshora.classList.toggle('active');
};

selecthora.addEventListener('click', () => {
	selecthora.classList.toggle('active');
	opcioneshora.classList.toggle('active');
});

/*CARGAR MAQUINAS */
function cargarMaquinas(zonaId) {
	// Realizar una petición AJAX para obtener las máquinas de la zona seleccionada
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	  if (this.readyState === 4 && this.status === 200) {
		document.getElementById("opcionesmaq").innerHTML = this.responseText;
	  }
	};
	xmlhttp.open("GET", "configmaquina.php?zona=" + zonaId, true);
	xmlhttp.send();
  }

  /*CARGAR HORAS */

  function cargarHorarios(horaId) {
	// Realizar una petición AJAX para obtener las máquinas de la zona seleccionada
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	  if (this.readyState === 4 && this.status === 200) {
		document.getElementById("opcioneshora").innerHTML = this.responseText;
	  }
	};
	xmlhttp.open("GET", "confighora.php?turnos=" + horaId, true);
	xmlhttp.send();
  }