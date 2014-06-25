function showFooter(){
	document.getElementsByTagName("footer")[0].style.height = 60;
}
function hideFooter(){
	document.getElementsByTagName("footer")[0].style.height = 0;
}
function showAside(){
	document.getElementsByTagName("section")[0].style.width = "60%";
	document.getElementsByTagName("aside")[0].style.width = "40%";
}
function hideAside(){
	document.getElementsByTagName("section")[0].style.width = "100%";
	document.getElementsByTagName("aside")[0].style.width = "0";
}
function firstInsert(){
	showFooter();
}
function selectItem(a){
	$('.selectedItem').removeClass('selectedItem');
	$('#detailItem' + a).addClass('selectedItem');
	showFooter();
}
function newItem(){
	document.getElementById("formData").reset();
	document.getElementById("action").value = "add";
	showAside();
	hideFooter();
	//document.getElementById("Nombre_Evento").focus();
}
function editItem(){
	var item = $('.selectedItem').eq(0).children('div').eq(0).children('input');
	document.getElementById("action").value = "edit";
	setValues(item);
	showAside();
	hideFooter();
}
function delItem(){
	var item = $('.selectedItem').eq(0).children('div').eq(0).children('input');
	document.getElementById("action").value = "del";
	setValues(item);
	if(confirm('Se eliminara el elemento seleccionado. Pulse Aceptar para confirmar.')){
		document.getElementById("formData").submit();
	}
	else{
		hideFooter();
	}
}
function viewItem(){
	var item = $('.selectedItem').eq(0).children('div').eq(0).children('input');
	document.getElementById("action").value = "view";
	setValues(item);
	showAside();
	hideFooter();
}
