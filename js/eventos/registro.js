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
function agregarSesion() {
	var fecha = document.getElementById("nFecha").value;
	var descr = document.getElementById("nNombre").value;
	var tsesn = document.getElementById("nTipo").value;
	var stipo = document.getElementById("nTipo").options[document.getElementById("nTipo").selectedIndex].text;
	var tbody = document.getElementById("tblSesiones").getElementsByTagName("tbody")[0];
	if(tsesn != -1) {
		if(fecha != '') {
			if(descr != '') {
				tbody.innerHTML += "<tr><input type=\"hidden\" name=\"fechas[]\" value=\"" + fecha + "\" /><input type=\"hidden\" name=\"nombres[]\" value=\"" + descr + "\" /><input type=\"hidden\" name=\"tipos[]\" value=\"" + tsesn + "\" /><td class=\"center\"></td><td>" + descr + "</td><td>" + stipo + "</td><td class=\"right\">" + fecha + "</td><td class=\"center\"></td></tr>";
				document.getElementById("nFecha").value = '';
				document.getElementById("nNombre").value = '';
				formatearTabla();
			}
			else {
				muestraError('Debe ingresar un nombre valido para la sesion.',3);
			}
		}
		else {
			muestraError('Ingrese una fecha valida, en formato dd--mm-yyyy',3);
		}
	}
	else{
		muestraError('Debe seleccionar un tipo de sesion.',3);
	}
}
function eliminaSesion(nfila) {
	var tbody = document.getElementById("tblSesiones").getElementsByTagName("tbody")[0];
	tbody.removeChild(tbody.getElementsByTagName("tr")[nfila]);
	formatearTabla();
}
function formatearTabla() {
	var tbody = document.getElementById("tblSesiones").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
	var nfilas = tbody.length;
	if(nfilas > 0) {
		for(var i = 0; i < nfilas; i++){
			tbody[i].className += ((i % 2 == 0) ? " par" : " impar");
			tbody[i].getElementsByTagName("td")[0].innerHTML = (i + 1);
			tbody[i].getElementsByTagName("td")[4].innerHTML = "<input type=\"button\" title=\"Eliminar\" class=\"btnElimina\" onclick=\"eliminaSesion(" + i + ")\" />";
		}
		document.getElementById("sbmGuardar").innerHTML = ((nfilas > 1) ? ("Programar las " + nfilas + " sesiones") : "Programar la sesi&oacute;n");
		$('#sbmGuardar').fadeIn(150);
		$('#tblSesiones').fadeIn(150);
	}
	else {
		$('#sbmGuardar').fadeOut(150);
		$('#tblSesiones').fadeOut(150);
	}
}
function confirmaSesiones() {
	if(window.confirm('Desea guardar las sesiones ingresadas?')) {
		document.sesiones.submit();
	}
}
