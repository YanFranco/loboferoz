<?php
class Data extends CI_Controller {
	private $isLoged = FALSE;
	public function __construct() {
		parent::__construct();
		$this->load->helper("html");
		$this->load->helper("form");
		//$this->load->library("form_validation");
		$this->load->model("login_model");
		$logged = $this->login_model->isLogged();
        if($logged == FALSE){
        	$this->load->view("login/form_login");
			$this->isLoged = FALSE;
        }
		else {
			$this->isLoged = TRUE;
		}
	}
	public function index() {
		if($this->isLoged == TRUE){
			//carga los datos de la bd
			$this->load->model("maestros/eventos");
			$data["items"] = $this->eventos->showItems();
			//setear formulario
			$data["struct"] = $this->eventos->formStruct();
			//carga la vista
			$data["title"] = "Eventos registrados";
			$this->load->view("maestros/lista",$data);
		}
	}
	public function tema() {
		if($this->isLoged == TRUE){
			//carga los datos de la bd
			$this->load->model("maestros/temas");
			$data["items"] = $this->temas->showItems();
			//setear formulario
			$data["struct"] = $this->temas->formStruct();
			//carga la vista
			$data["title"] = "Temas registrados";
			$this->load->view("maestros/lista",$data);
		}
	}
}
?>