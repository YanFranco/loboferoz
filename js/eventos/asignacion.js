function muestraError(err,fadetime) {
	var autogen = Math.round(Math.random() * 1000000);
	var id = 'div' + autogen;
	$('body').append(
		$('<div/>').attr('id',id).addClass('msgError bottomFloat').append(
			$('<p/>').text(err)
		).fadeIn(150)
	);
	setTimeout(function(){
		$('#' + id).fadeOut(150,function(){
			$('#' + id).remove();
		});
	},fadetime*1000);
}
function confirmaParticipantes() {
	if(window.confirm('Desea guardar las sesiones ingresadas?')) {
		document.participantes.submit();
	}
}
