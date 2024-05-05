$(document).ready(function () {
	let token = window.location.search.substr(9);
	$("#updatePassword").submit(function (e) {
		e.preventDefault();

		let pass = document.getElementById("newPassword");
		let pass2 = document.getElementById("repeated");

		if (pass.value === pass2.value) {
			var data = {
				newPass: pass.value,
				token: token,
			};
			$.post("Backend/updatePassword.php", data, function (res) {
				alert(res);
			});
		} else {
			alert("Las contraseñas no coinciden");
		}
	});
});
