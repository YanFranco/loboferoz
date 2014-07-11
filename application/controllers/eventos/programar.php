<?php
class Programar extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper("html");
		$this->load->model("login_model");
		$this->load->model("eventos/spevento");
	}
	public function index() {
		if($this->login_model->isLogged()){
			$evento = $this->session->userdata['evento'];
			$items = $this->spevento->lista_sesiones($evento);
			$n = count($items);
			// ------
			if($n > 0){
				$data = array(
					"items" => $items,
					"title" => $n.(($n > 1) ? " sesiones" : " sesión")." registrada".(($n > 1) ? "s" : ""),
					"descrp" => "El evento posee $n ".(($n > 1) ? "sesiones" : "sesión")." registrada".(($n > 1) ? "s" : "")
				);
			}
			else{
				$data = array(
					"title" => "No hay sesiones registradas",
					"descrp" => "A&uacute;n no se ha registrado sesiones para el evento. Pulse el siguiente enlace para realizar la programaci&oacute;n."
				);
			}
			$this->load->view("eventos/sesiones",$data);
		}
		else{
			header("Location: ".base_url());
		}
	}
	public function registra() {
		if($this->login_model->isLogged() && isset($this->session->userdata['evento'])) {
			$evento = $this->session->userdata['evento'];
			$items = $this->spevento->combo_tipos_evento();
			$this->load->helper("form");
			$evento = $this->session->userdata['evento'];
			$data = array("evento" => $evento, "tipos" => $items);
			$this->load->view("eventos/registra",$data);
		}
		else{
			header("Location: ".base_url());
		}
	}
	public function guarda() {
		if($this->login_model->isLogged() && isset($this->session->userdata['evento'])) {
			extract($_POST);
			$isOk = TRUE;
			$err = array();
			if(isset($evento,$fechas,$nombres,$tipos)) {
				if($this->session->userdata['evento'] != $evento) {
					$isOk = $isOk && FALSE;
					array_push($err,"El evento recibido es incorrecto.");
				}
				if(count($fechas) != count($nombres) || count($nombres) != count($tipos)){
					$isOk = $isOk && FALSE;
					array_push($err,"La cantidad de parametros enviados es inconsistente.");
				}
				$sFechasOk = TRUE;
				$sNombresOk = TRUE;
				$sTiposOk = TRUE;
				$params = array();
				foreach($fechas as $index => $fecha) {
					if($fechas[$index] == "") {
						$sFechasOk = $sFechasOk && FALSE;
					}
					if($nombres[$index] == "") {
						$sNombresOk = $sNombresOk && FALSE;
					}
					if($tipos[$index] == "") {
						$sTiposOk = $sTiposOk && FALSE;
					}
					if($sFechasOk && $sNombresOk && $sTiposOk) {
						array_push($params,array($evento,$tipos[$index],$fechas[$index],$nombres[$index]));
					}
				}
				if(!$sFechasOk || !$sNombresOk || !$sTiposOk) {
					$isOk = $isOk && FALSE;
					array_push($err,"Los campos ingresados no pueden contener valores nulos.");
				}
				if($isOk) {
					foreach($params as $index => $data) {
						$items = $this->spevento->guarda_sesion($data);
					}
					$this->load->view("eventos/sesconfirma");
				}
				else {
					$items = $this->spevento->combo_tipos_evento();
					$this->load->helper("form");
					$data = array("evento" => $evento, "tipos" => $items, "err" => $err);
					$this->load->view("eventos/registra",$data);
				}
			}
			else {
				array_push($err,"No se recibi&oacute; alguno de los par&aacute;metros.");
				$items = $this->spevento->combo_tipos_evento();
				$this->load->helper("form");
				$data = array("evento" => $evento, "tipos" => $items, "err" => $err);
				$this->load->view("eventos/registra",$data);
			}
		}
		else{
			header("Location: ".base_url());
		}
	}
}
?>
