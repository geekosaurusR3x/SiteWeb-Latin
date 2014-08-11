$( document ).ready(function() {
	bindUserElement();
});

function bindUserElement(){
	$("#loginform").unbind("submit");
	$("#logoutbtn").unbind("click");

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
			$('#panel_user .panel-body').html(msg);
			bindUserElement();
		});
	});

	$("#logoutbtn").on("click",function(e){
		$.ajax({
			type: "POST",
			url: "index.php",
			data: { dest:"logout"}
		})
		.done(function( msg ) {
			$('#panel_user .panel-body').html(msg);
			bindUserElement();
		});
	});


}

function show_modal(data,title){
	$('#modal .modal-title').html(title);
	$('#modal .modal-body').html(data);
	$('#modal').modal("show");
}
