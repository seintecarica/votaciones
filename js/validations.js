function validateName() {
	var inputValue = document.getElementById('name').value;
	var regex = /^[a-zA-Z0-9]+$/;

	// Verificar si el valor cumple con la expresión regular
	if(inputValue.length > 0){
		if (!regex.test(inputValue)) {
			alert('Por favor, ingresa solo números y letras.');
		}
	}
}

function validateAlias() {
	// Obtener el valor del input
	var inputValue = document.getElementById('alias').value;
	var regex = /^[a-zA-Z0-9]+$/;
	// Verificar si el valor cumple con la expresión regular
	if (!regex.test(inputValue) || inputValue.length < 6) {
		alert('Por favor, ingresa al menos 6 caracteres y que contenga números y letras.');
	}
}

function validateRut(){
	var rutInput = document.getElementById('rut').value;
	// Elimina puntos y guión del RUT
	var rutLimpio = rutInput.replace(/[.-]/g, '');
	// Extrae el cuerpo y el dígito verificador
	var cuerpo = rutLimpio.slice(0, -1);
	var digitoVerificador = rutLimpio.slice(-1).toUpperCase();
	// Calcula el dígito verificador esperado
	var suma = 0;
	var multiplo = 2;

	for (var i = cuerpo.length - 1; i >= 0; i--) {
		suma += parseInt(cuerpo.charAt(i)) * multiplo;

		multiplo = multiplo < 7 ? multiplo + 1 : 2;
	}

	var resto = suma % 11;
	var dvEsperado = 11 - resto;

	if (dvEsperado == 10) {
		dvEsperado = 'K';
	} else if (dvEsperado == 11) {
		dvEsperado = '0';
	}

	// Comparar el dígito verificador ingresado con el esperado
	if(rutInput.length > 0){
		if (digitoVerificador != dvEsperado.toString()) {
			alert('RUT inválido');
			document.getElementById('rut').value = "";
		}
	}
	
}

function validateEmail() {
	var emailInput = document.getElementById('email').value;
	// Expresión regular para validar la estructura de un email
	var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	// Verificar si el email cumple con la expresión regular
	if(emailInput.length > 0){
		if (!regex.test(emailInput)) {
			alert('Por favor, ingresa un email válido.');
		}
	}
}

function validateCheckbox(){
	var checkboxes = document.getElementsByName('options');
	var seleccionados = 0;

	// Contar la cantidad de checkboxes seleccionados
	for (var i = 0; i < checkboxes.length; i++) {
		if (checkboxes[i].checked) {
			seleccionados++;
		}
	}

	// Verificar si al menos dos checkboxes están seleccionados
	if (!(seleccionados >= 2)) {
		alert('Selecciona al menos dos opciones.');
	}
}
