

addEventListener('load',init);


var offset = 0;
var add = 25/360;

var h = 320;
var w = 350;
var lastend = 0;

var radius = 120;
var centerx = w / 2 - 20;
var centery = h / 2;


var colist = new Array('#0099CC', '#009999', '#99CC00', '#FF5050', '#CC6600',
			 '#996633', '#3366FF', '#9933FF', '#00CC66', '#FF0000', '#CCCC00', '#999966');

var nameGroup = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K');

function built()
{
	//Inicializando listeners


	var total = document.formGrupos.numGrupos.value;

	if(total > 9)
	{
		alert("En estos momentos soportamos a lo máximo 9 Grupos, lo sentimos");
		return;
	}
	printRectangles(total);
	for(i = 0; i < total; i++)addSector(0, 1/total, i);

}

/*Agregar un sector con offset ofs y de angulo en radianes frac con color colist[i]*/
function addSector(ofs, frac, i)
{
	var canvas = document.getElementById("miCanvas");
	var ctx = canvas.getContext('2d');

	ctx.beginPath();
	ctx.lineWidth = 1;

	ctx.fillStyle = colist[i];
	ctx.moveTo(centerx,centery);

	var arcsector = Math.PI * (2 * frac);
	ctx.arc(centerx, centery, radius, lastend - ofs, lastend + arcsector - ofs, false);

	ctx.strokeStyle = "black";
	ctx.lineTo(centerx, centery);

	ctx.fill();
	ctx.stroke();

	ctx.closePath();
	lastend += arcsector;
}

/*Inicializar la ruleta y flecha*/
function init(){ addSector(0, 1, 0); printArrow();}

/* Pintar flecha */
function printArrow()
{
	var c = document.getElementById("miCanvas");
    var cxt = c.getContext("2d");

	cxt.beginPath();
    cxt.lineWidth = 1;

    cxt.strokeStyle = "black";
    cxt.fillStyle = "#00FF00";

    var x = centerx + radius;
    var y = centery;

    cxt.moveTo(x, y);

    cxt.lineTo(x + 30, y + 30);
    cxt.lineTo(x + 30, y + 15);
    cxt.lineTo(x + 50, y + 15);
    cxt.lineTo(x + 50, y - 15);
    cxt.lineTo(x + 30, y - 15);
    cxt.lineTo(x + 30, y - 30);
    cxt.lineTo(x, y);

    cxt.fill();
    cxt.stroke();

   cxt.closePath();
}

/*Pintar la leyenda de grupos*/
function printRectangles(total)
{
	var x = 30, y = 310;

	var c = document.getElementById("miCanvas");
    var cxt = c.getContext("2d");
    cxt.beginPath();

    cxt.fillStyle = "#1d1d1d";
   	cxt.fillRect(x - 3, y - 3, 400, 400);

	for(i = 0; i < total; i++){

		cxt.fillStyle = "black";
    	cxt.fillRect(x - 1, y - 1, 34, 24);

		cxt.fillStyle = colist[i];
    	cxt.fillRect(x, y, 32, 22);

    	cxt.fillStyle = "black";
    	cxt.font="15px 'Russo One', sans-serif";

		cxt.fillText(nameGroup[i], x + 11, y + 19,50);
		x += 40;
	}

	cxt.fill();
	cxt.closePath();
}

/*Encontrar suertudo busqueda en intervalos*/
var idLucky;
function getLucky()
{
	var res = -1;
	var total = document.formGrupos.numGrupos.value;

	var alfa = Math.PI * 2 / total;
	var EPS = 1e-6;

	for(i = 0; i < total && res == -1; i++)
	{
		var ini = i * alfa - offset;
		var fin = (i + 1) * alfa - offset;

		if(ini  < -EPS)ini += 2 * Math.PI;
		if(fin  < -EPS)fin += 2 * Math.PI;

		if(ini > fin + EPS)res = i;
	}

	idLucky = res;
}

/* Pintar circulo centrado con el nombre del grupo suertudo */
function printLucky()
{
	var canvas = document.getElementById("miCanvas");
	var ctx = canvas.getContext('2d');

	ctx.beginPath();
	ctx.fillStyle = "#1d1d1d";

	ctx.moveTo(centerx, centery);
	var arcsector = Math.PI * 2;

	ctx.arc(centerx, centery, radius/2, 0, arcsector, false);
	ctx.fill();

	ctx.closePath();

	getLucky(); // actualizando idLucky
	ctx.fillStyle = "#e44e2d";

    ctx.font="55px 'Russo One', sans-serif";
	ctx.fillText(nameGroup[idLucky], centerx - 16, centery + 16, 50);

}

var alumno = { id:"", nombre:""};


var g = new Array();

g[0] = [{id: "0", nombre: "Marco Cáceres"}, {id:"1", nombre: "Yan Franco Calderon"}, {id: "2",nombre: "Alfonso Velásquez"}, {id: "3", nombre: "Aldo Inga"}];
g[1] = [{id: "0", nombre: "Jonathan Durand"}, {id: "1", nombre: "Cristhian Espinoza"}, {id: "2", nombre: "Wilmer Solano"}, {id: "3", nombre: "Gustavo Castro"}];
g[2] = [{id: "0", nombre: "Luis Pando"}, {id: "1", nombre: "Edwin Kenedy"}, {id: "2", nombre: "Julio Buendia"}, {id: "3", nombre: "Luis Quispe"}];
g[3] = [{id: "0", nombre: "Cristhina Casas"}, {id: "1", nombre: "Gonzalo Quispe"}, {id: "2",nombre: "Rodolfo Mercado"}, {id: "3", nombre: "Alejandro Gutierres"}];
g[4] = [{id: "0", nombre: "Mario Ynocente"}, {id: "1", nombre: "Martin Huamani"}, {id: "2", nombre: "Judith Fernandez"}, {id: "3", nombre: "Esteban Gonzales"}];
g[5] = [{id: "0", nombre: "Lino Verdi"}, {id: "1", nombre: "Yan Luis Fernandez"}, {id: "2", nombre: "Pablo Gonzales"}, {id: "3", nombre: "Ricardo Cespedes"}];
g[6] = [{id: "0", nombre: "Marco Rojas"}, {id: "1", nombre: "Larry Soto"}, {id: "2", nombre: "Alfonso Velázques"}, {id: "3", nombre: "Luis Carrion"}];
g[7] = [{id: "0", nombre: "Roberto Cespedes"}, {id: "1", nombre: "Luis Arevalo"}, {id: "2", nombre: "Diego Mansilla"}, {id: "3", nombre: "Fiorella Fuentes"}];
g[8] = [{id: "0", nombre: "Patricia Villanueva"}, {id: "1", nombre: "Cristhian Sotelo"}, {id: "2", nombre: "Pedro Gonzales"}, {id: "3",nombre: "Franco Torres"}];
g[9] = [{id: "0", nombre: "Marco Cáceres"}, {id: "1", nombre: "Maria Veltran"}, {id: "2", nombre: "Carmen Aguirre"}, {id: "3", nombre: "Bithia Valentin"}];
g[10] = [{id: "0", nombre: "Eduardo Melendez"}, {id: "1", nombre: "Roberto Hidalgo"}, {id: "2", nombre: "Jaime Soto"}, {id: "3", nombre: "Beatriz Mendoza"}];
g[11] = [{id: "0", nombre: "Patrick Espinoza"}, {id: "1", nombre: "Luisa Quispe"}, {id: "2", nombre: "Tatiana Sore"}, {id: "3", nombre: "Victor Cueva"}];

/*
function sorteoIndividual()nombre:
{
	var al = document.getElementById("nombres").value;
	document.getElementById("nombres").innerHTML += al + "\n";
}
*/

/*Pintar la ruleta varias veces con un offset que incrementa en add*/
function rotate()
{
	pie(offset);
	looper = setTimeout('rotate()', 0);

	offset += add;
	if(offset >= 2 * Math.PI)offset -= 2 * Math.PI;
}

/*Pintar la ruleta con un offset offs*/
function pie(offs)
{
	  var total = document.formGrupos.numGrupos.value;
	  for(i = 0; i < total; i++)addSector(offs, 1/total, i);
}

/*Evento que inicializa los listener de los botones 'Go' y 'Stop'*/
function initListener()
{
	btn1 = document.getElementById("btnGo");
	btn1.addEventListener("click", go);
	btn2 = document.getElementById("btnStop");
}

/* Evento que gira la ruleta (boton 'GO')*/
function go()
{
	rotate();
	btn1.removeEventListener("click", go);
	btn2.addEventListener("click", stop);

}

/* Evento que detiene la ruleta (boton 'STOP') */
function stop()
{
	clearTimeout(looper);
	printLucky();

	showAllGroup();

	btn1.addEventListener("click", go);
	btn2.removeEventListener("click", stop);
}

var auxID = [false, false, false, false];
var ct;

function showAllGroup()
{
	document.getElementById("sorting").innerHTML = "";
	document.getElementById("show").innerHTML = "";

	for(i = 0; i < 4; i++)
	{
		document.getElementById("show").innerHTML += g[idLucky][i].nombre + "\n";
	}

	for(i = 0; i < 4; i++)auxID[i] = false;
	ct = 4;

}


function choose(e)
{

	e.preventDefault();
	if(ct == 0)
	{
		alert("Todos los alumnos ya han sido sorteados");
		return;

	}

	var i = Math.floor(Math.random() * 4);
	while(true)
	{
		var i = Math.floor(Math.random() * 4);
		if(auxID[i] == false)
		{
			auxID[i] = true;
			ct--;
			break;
		}
	}

	document.getElementById("sorting").innerHTML += g[idLucky][i].nombre + "\n";

}

