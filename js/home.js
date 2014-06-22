function resize(){
	var documentWidth = window.innerWidth;
	var documentHeight = window.innerHeight;
	document.getElementById("headerTitle").style.width = documentWidth - 600;
	document.getElementById("headerWelcome").style.width = documentWidth - 580;
	document.getElementById("itemContainer").style.height = documentHeight - 100;
	document.getElementById("itemContainer").style.width = documentWidth;
	document.getElementById("itemSlider").style.height = documentHeight - 100;
}
function setSizes(){
	var sliderWidth = 150;
	$.each($('article'),function(){ sliderWidth += ($(this).width() + 100); });
	document.getElementById("itemSlider").style.width = sliderWidth;
	resize();
}
function showBsqForm(){
	document.getElementById("usrH2").style.width = 230;
	document.getElementById("bsqH2").style.width = 230;
	document.getElementById("btnBsq").setAttribute("href","javascript:hideBsqForm()");
	document.getElementById("tbBsq").focus();
	document.getElementById("tbBsq").style.border = "2px solid #F8F8F8";
	document.getElementById("tbBsq").style.padding = "0 5px";
	document.getElementById("tbBsq").style.width = 200;
}
function hideBsqForm(){
	document.getElementById("usrH2").style.width = 440;
	document.getElementById("bsqH2").style.width = 0;
	document.getElementById("btnBsq").setAttribute("href","javascript:showBsqForm()");
	document.getElementById("tbBsq").style.border = "none";
	document.getElementById("tbBsq").style.padding = "0";
	document.getElementById("tbBsq").style.width = 0;
}
function filtraOpciones(string){
	$.each($('.articleItem'),function(){
		var item = $(this);
		var target = item.children('div').children('p').text().toUpperCase();
		if(string == '' || target.indexOf(string) > -1){
			item.show();
		}
		else{
			item.hide();
		}
	});
}
