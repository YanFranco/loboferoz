<?php
class Event extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model("maestros/eventos");
		$this->load->model("login_model");
	}
	public function index() {
		if($this->login_model->isLogged()) {
			if(isset($_GET["ev"])){
				$recEvent = $_GET["ev"];
				$eventos = $this->eventos->load();
				$found = FALSE;
				foreach($eventos as $evento) {
					$found = $found || ($evento->IdEvento == $recEvent);
				}
				if($found) {
					$this->session->set_userdata(array("evento" => $recEvent));
					echo "Encontre el evento ".$recEvent;
				}
			}
			//print_r($this->session->userdata);
			header("Location: ".base_url());
		}
		else {
			$this->load->view("login/form_login");
		}
	}
}
?>