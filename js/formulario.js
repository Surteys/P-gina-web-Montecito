var formulario = document.getElementById('formulario');
var respuesta =document.getElementById('respuesta');
formulario.addEventListener('submit', function(e){
	e.preventDefault();
	console.log('Me diste un click sabrosón');

	var datos = new FormData(formulario);
	console.log(datos);
	console.log(datos.get('correo'));
	console.log(datos.get('nombre'));

	fetch('reservacion.php',{
		method: 'POST',
		body: datos
	})
	.then(res => res.json())
	.then(data => {
		console.log(data);
		if (data === 'El mensaje se envió correctamente') {
			respuesta.innerHTML = `<div class="alert alert-success" role="alert">
			Su reservación ha sido enviada con éxito!
			</div>`
		}else{
			respuesta.innerHTML = `<div class="alert alert-danger" role="alert">
			Oops! Ha ocurrido un problema, intente de nuevo más tarde.
			</div>`
		}
	})

});