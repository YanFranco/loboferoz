
addEventListener('load',rotate); 



var offset = 0;
var add = 25/360;
function rotate(){

	pie(offset);
	looper = setTimeout('rotate()', 0);
	offset += add;

}

function pie(offset)
{

	  var datalist= new Array(100/6, 100/6, 100/6, 100/6, 100/6, 100/6);
	  var groups = new Array()
	  var colist = new Array('#0099CC', '#009999', '#99CC00', '#FF5050', '#CC6600', '#996633');

	  var canvas = document.getElementById("miCanvas"); // REVISAR EL NOMBRE DEL CANVAS CON EL INDEX
	  var ctx = canvas.getContext('2d');

	  /*
	  var yBox = 48;
	  for(i = 0; i < colist.length; i++){

	  		ctx.lineWidth = 2;

	  		ctx.fillStyle = "black";
	  		ctx.fillRect(460, yBox, 90, 30);

	  		ctx.fillStyle = colist[i];
	  		ctx.fillRect(462, yBox + 2, 86, 26);

	  		yBox += 60;

	  		ctx.fill();
	  		ctx.stroke();

	  }
	*/
	  var h = 300;
	  var w = 300;

	  var radius = h / 2 - 5;
	  var centerx = w / 2;

	  var centery = h / 2;
	  var total = 0;



	  for(x=0; x < datalist.length; x++) { total += datalist[x]; };
	  var lastend=0;

	  for(x=0; x < datalist.length; x++)
	  {
		    var thispart = datalist[x];
		    ctx.beginPath();

		    ctx.fillStyle = colist[x];
		    ctx.moveTo(centerx,centery);

		    var arcsector = Math.PI * (2 * thispart / total);
		    ctx.arc(centerx, centery, radius, lastend - offset, lastend + arcsector - offset, false);

		    ctx.lineWidth = 0;
		    ctx.strokeStyle = "black";


		    ctx.lineTo(centerx, centery);

		    ctx.fill();
		    ctx.stroke();

		    ctx.closePath();
		    lastend += arcsector;

      }

}


