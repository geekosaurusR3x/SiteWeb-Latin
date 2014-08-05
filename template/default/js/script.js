$( document ).ready(function() {
	bindUserElement();
});

function bindUserElement(){
	$("#loginform").on("submit",function(e){

		e.preventDefault();

		$("#inputEmail").val();
		var pass = md5($("#inputPassword").val());
		$.ajax({
			type: "POST",
			url: "index.php",
			data: { dest:"login" ,email: $("#inputEmail").val(), md5: pass}
		})
		.done(function( msg ) {
			show_modal(msg,"Alert")
		});
	});
}

function show_modal(data,title){
	$('#modal .modal-title').html(title);
	$('#modal .modal-body').html(data);
	$('#modal').modal("show");
}
