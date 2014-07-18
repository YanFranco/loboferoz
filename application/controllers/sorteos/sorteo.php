<?php
class Sorteo extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->helper("html");
		$this->load->model("sorteos/sorteos");
		$this->load->model("login_model");
	}
	public function index() {
		echo "sorteando...";
		// if($this->isLoged == TRUE){
		// 	//carga los datos de la bd
		// 	$evento = $this->session->userdata["evento"];
		// 	$params = array($evento);
		// 	$items = $this->sorteo->loadParticipantesSorteo($params);
		// 	$datos = array('items'=>$items,'evento'=>$evento);
		// 	$this->load->view("sorteos/sorteoVista",$datos);
		// }
	}
	public function sindividual() {
		if($this->login_model->isLogged() == TRUE){
			// carga los datos de la bd
			$evento = $this->session->userdata["evento"];
			$params = array($evento);
			$items = $this->sorteos->loadParticipantesSorteo($params);
			$datos = array('items'=>$items,'evento'=>$evento);
			$this->load->view("sorteos/individual",$datos);
		}

		// $this->load->view("sorteos/individual");
		//  if (!$items) {
		//     echo 'No se pudo ejecutar la consulta: ' . mysql_error();
		//     exit;
		// }
		// echo $evento;
		// // echo $params;
		// $num = count($items);

		// foreach ($items as $key => $value) {
		// 	$id = $value->IdParticipante;
		// 	$nombre = $value->participante;
		// 	echo $id;
		// 	echo $nombre;
		// }

		//  while ($registro = mysqli_fetch_array($items)){
		// 	echo "
		// 	    <tr>
		// 	      <td width='150'>".$registro['IdParticipante']."</td>
		// 	      <td width='150'>".$registro['participante']."</td>
		// 	      <td width='150'></td>
		// 	    </tr>
		// 	";
		// }
	}
	public function sgrupal() {
			$evento = $this->session->userdata["evento"];
			$params = array($evento);
			$items = $this->sorteos->loadNumeroGrupos($params);
			$datos = array('items'=>$items,'evento'=>$evento);
			//Traer la cantidad de grupos
			$numGrupos = $this->sorteos->loadNumeroGrupos($params);


		$this->load->view("sorteos/grupal");
		//$this->load->view("sorteos/individual");
	}
	public function sreporte() {
		if($this->login_model->isLogged() == TRUE){
			$evento = $this->session->userdata["evento"];
			$params = array($evento);
			$items = $this->sorteos->ReporteParticipacion($params);
			$datos = array('items'=>$items,'evento'=>$evento);
			// $this->load->view("sorteos/individual",$datos);

		$this->load->view("sorteos/reporte",$datos);
		}
	}
	public function sasistencia() {
		if($this->login_model->isLogged() == TRUE){
			$evento = $this->session->userdata["evento"];
			$params = array($evento);
			$items = $this->sorteos->RecordAsistencia($params);
			$datos = array('items'=>$items,'evento'=>$evento);
			// $this->load->view("sorteos/individual",$datos);
		$this->load->view("sorteos/rasistencia",$datos);
		}

	}
}
?>
