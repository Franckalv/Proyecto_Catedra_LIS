$(document).ready(function () {
	$("#recuperarForm").on("submit", function (e) {
		e.preventDefault();
		let mail = document.getElementById("email");
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		
            console.log('Funciona')
			const data = {
				email: mail.value
			};
			$.post("Backend/envioCorreo.php", data, function (response) {
				alert(response);
				console.log(response);
			});
		
	});
	$('#recuperarByUser').on('submit', function(e){
		e.preventDefault();
		let user = document.getElementById('username');
		const data = {
			username : user.value
		}
		$.post("Backend/envioCorreoUsuario.php", data, function(response){
			alert(response);
		})
	})
});
