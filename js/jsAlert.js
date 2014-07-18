
function CustomAlert(dialog){

	var winW = window.innerWidth;
	var winH = window.innerHeight;

	var dialogoverlay = document.getElementById('dialogoverlay');
	var dialogbox = document.getElementById('dialogbox');

	dialogoverlay.style.display = "block";
	dialogoverlay.style.height = winH+"px";

	dialogbox.style.left = (winW/2) - 200+"px";
	dialogbox.style.top = (winH/2 - 130) + "px";

	dialogbox.style.display = "block";
	document.getElementById('dialogboxbody').innerHTML = '<img src="images/icons/warning.png" class="icons">' + dialog;

}

function closeAlert()
{
	document.getElementById('dialogbox').style.display = "none";
	document.getElementById('dialogoverlay').style.display = "none";
}
