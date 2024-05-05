//Incluido en comments.php

$(document).ready(function () {
	let show = false;
	fetchPlaceInfo();
	fetchComments();
	hideComments();

	//Obtenemos los comentarios del lugar y les damos formato para mostrarlos
	function fetchComments() {
		//Obtener datos del lugar del que necesitamos los comentario
		const data = {
			place: $("#place").val(), //Seleccionar un input escondido que contenga el nombre del lugar
		};
		$.post("Backend/fetchingComments.php", data, function (response) {
			let usuario = $("#username").val();

			try {
				let comments = JSON.parse(response);
				let template = "";
				//Crea la plantilla donde se encuentran todos los comentarios
				comments.forEach((comment) => {
					if (usuario == comment.username) {
						template += `
                        <div class="card" commentId="${comment.id}"> 
                            <div class="card-body"> 
                                <div class="username"> ${comment.username}</div> 
                                <div class=" timestamp">${comment.date}</div> 
                                
                                <div class="comment"><p>${comment.comment}</p></div>
                            </div>
                            <a class="deleteComment" style="margin-left:3%; margin-bottom:1%;" href="">Delete</a>
                        </div>
                    `;
					} else {
						template += `
                        <div class="card"> 
                            <div class="card-body"> 
                                <div class="username"> ${comment.username}</div> 
                                <div class=" timestamp">${comment.date}</div>
                                <div class="comment"> ${comment.comment} </div>
                            </div>
                        </div>
                    `;
					}
				});
				$("#container").html(template);
			} catch (error) {
				alertify.error(response);
				$("#container").html(response);
			}
		});
	}
	//Funciones para mostrar y ocultar comentarios
	$("#showAndHide").click(function (event) {
		event.preventDefault();
		show ? hideComments() : showComments();
	});
	function showComments() {
		$(".comments-container").show("slow");
		$("#showAndHide").html("Hide comments");
		show = true;
	}
	function hideComments() {
		$(".comments-container").hide("slow");
		$("#showAndHide").html("Show comments");
		show = false;
	}

	//Añadir comentarios al lugar
	$("#commentsForm").submit(function (e) {
		e.preventDefault();
		//declaración de variables
		let lugar = $("#place").val();
		let user = $("#username").val();
		let comentario = $("#comment").val();
		//Almacenamos los datos que enviaremos al archivo php
		const data = {
			place: lugar,
			comment: comentario,
			username: user,
		};
		$.post("Backend/AddComments.php", data, function (response) {
			try {
				let error = JSON.parse(response);
				alertify.error(error.message);
				console.log(error.message);
			} catch (error) {
				alertify.success(response);
				console.log("funciona");
				$("#comment").val("");
				fetchComments();
			}
		});
	});

	//Alerta
	if (!alertify.myAlert) {
		//define a new dialog
		alertify.dialog("myAlert", function factory() {
			return {
				main: function (message) {
					this.message = message;
				},
				setup: function () {
					return {
						buttons: [{ text: "cool!", key: 27 /*Esc*/ }],
						focus: { element: 0 },
					};
				},
				prepare: function () {
					this.setContent(this.message);
				},
			};
		});
	}

	//Eliminar comentarios
	$(document).on("click", ".deleteComment", function (e) {
		e.preventDefault();
		if (confirm("Are you sure you want to delete your comment?")) {
			let comment = $(this)[0].parentElement;
			let commentID = $(comment).attr("commentId");
			$.post("Backend/deleteComments.php", { commentID }, function (response) {
				let res = JSON.parse(response);
				if (res.type == "success") {
					alertify.success(res.msg);
				} else {
					alertify.error(res.msg);
				}
				console.log(response);
				fetchComments();
			});
		}
	});

	//Obtener información del lugar que queremos comentar

	function fetchPlaceInfo() {
		let place = capitalize($("#place").val());
		const data = {
			place: place, //Seleccionar un input escondido que contenga el nombre del lugar
		};
		$.post("Backend/fetchPlaceInfo.php", data, function (response) {
			try {
				let placeInfo = JSON.parse(response);
				
				let template = "";
				template = `
                <h1>${placeInfo[0].name}, ${placeInfo[0].location} </h1>
				<br>
				      <p>${placeInfo[0].description}</p>
                <img class="img" src="data:image/jpg;base64, ${placeInfo[0].image}" />
                <div id="rating">
                <h5>Rating</h5>
                <strong>${placeInfo[0].rating}/5</strong>
                </div>
                <div id="description">${placeInfo[0].info}</div>
                `;
                    $("#content").html(template);
			} catch (error) {
				alertify.error(response);
			}
		});
	}

	function capitalize(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	}

	$('#ratingForm').on('submit', function(e){
        e.preventDefault();
        const ratings = document.querySelectorAll('input[name="rate"]');
        let username = document.getElementById('username');
        let place = document.getElementById('place');
        const data = {
            'rate' : ratings[0].value,
            'user' : username.value,
            'plc'  : place.value
        };
        $.post('Backend/rating.php', data, function(response){
            try {
                let object = JSON.parse(response)
                alert(object.message);
            } catch (error) {
                alert(response)
            }
        });
    })
});
