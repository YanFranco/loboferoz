<?php
class Guarda extends CI_Controller {
	private $isLoged = FALSE;
	public function __construct() {
		parent::__construct();
		$this->load->helper("html");
		$this->load->helper("form");
		$this->load->library("form_validation");
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
			$this->load->model("maestros/eventos");
			$data["struct"] = $this->eventos->formStruct();
			$data["title"] = "Eventos registrados";
			$this->form_validation->set_rules("Nombre_Evento", "Nombre del evento", "required|max_length[50]");
			$this->form_validation->set_rules("FechaInicio", "Fecha de inicio", "required|exact_length[10]");
			$this->form_validation->set_rules("Fechafin", "Fecha de fin", "required|exact_length[10]");
			$this->form_validation->set_rules("Lugar_Evento", "Lugar del evento", "required|max_length[100]");
			$this->form_validation->set_message("required", "* Debe ingresar un valor para el campo %s");
			$this->form_validation->set_message("max_length[50]", "* El campo %s puede contener un maximo de 50 caracteres");
			$this->form_validation->set_message("max_length[100]", "* El campo %s puede contener un maximo de 100 caracteres");
			$this->form_validation->set_message("exact_length[10]", "* Ingrese una fecha valida para %s");
			$this->form_validation->set_error_delimiters('<p class="formError">','</p>');
			if ($this->form_validation->run() == FALSE){
				$data["items"] = $this->eventos->showItems();
				$data["error"] = form_error("Nombre_Evento").form_error("FechaInicio").form_error("Fechafin").form_error("Lugar_Evento");
				$this->load->view("maestros/lista",$data);
			}else{
				extract($_POST);
				switch($action){
					case "add":
						$data["success"] = $this->eventos->insert(array($Nombre_Evento,$FechaInicio,$Fechafin,$Lugar_Evento));
						break;
					case "edit":
						$data["success"] = $this->eventos->edit(array($IdEvento,$Nombre_Evento,$FechaInicio,$Fechafin,$Lugar_Evento));
						break;
					case "del":
						$data["success"] = $this->eventos->delete($IdEvento);
						break;
					default;
						$data["success"] = "";
						break;
				}
				$data["items"] = $this->eventos->showItems();
				$this->load->view("maestros/lista",$data);
			}
		}
	}
	public function tema() {
		if($this->isLoged == TRUE){
			$this->load->model("maestros/temas");
			$data["struct"] = $this->temas->formStruct();
			$data["title"] = "Temas registrados";
			$this->form_validation->set_rules("Descripcion", "Nombre del tema", "required|max_length[100]");
			$this->form_validation->set_message("required", "* Debe ingresar un valor para el campo %s");
			$this->form_validation->set_message("max_length[100]", "* El campo %s puede contener un maximo de 100 caracteres");
			$this->form_validation->set_error_delimiters('<p class="formError">','</p>');
			if ($this->form_validation->run() == FALSE){
				$data["items"] = $this->temas->showItems();
				$data["error"] = form_error("Descripcion");
				$this->load->view("maestros/lista",$data);
			}else{
				extract($_POST);
				switch($action){
					case "add":
						$data["success"] = $this->temas->insert(array($Descripcion));
						break;
					case "edit":
						$data["success"] = $this->temas->edit(array($idTema,$Descripcion));
						break;
					case "del":
						$data["success"] = $this->temas->delete($idTema);
						break;
					default;
						$data["success"] = "";
						break;
				}
				$data["items"] = $this->temas->showItems();
				$this->load->view("maestros/lista",$data);
			}
		}
	}
	public function participante() {
		if($this->isLoged == TRUE){
			$this->load->model("maestros/participantes");
			$data["struct"] = $this->participantes->formStruct();
			$data["title"] = "Lista de participantes";
			$this->form_validation->set_rules("DNI", "DNI", "required|exact_length[10]");
			$this->form_validation->set_rules("CodigoUni", "Codigo UNI", "required|exact_length[10]");
			$this->form_validation->set_rules("Nombre_Persona", "Nombre del participante", "required|max_length[30]");
			$this->form_validation->set_rules("ApellidoPaterno", "Apellido paterno", "required|max_length[30]");
			$this->form_validation->set_rules("ApellidoMaterno", "Apellido materno", "required|max_length[20]");
			$this->form_validation->set_rules("CorreoElectronico", "Correo electronico", "required|max_length[45]");
			$this->form_validation->set_message("required", "* Debe ingresar un valor para el campo %s");
			$this->form_validation->set_message("exact_length[10]", "* El campo %s debe contener 10 caracteres");
			$this->form_validation->set_message("max_length[30]", "* El campo %s debe contener 30 caracteres como maximo");
			$this->form_validation->set_message("max_length[20]", "* El campo %s debe contener 20 caracteres como maximo");
			$this->form_validation->set_message("max_length[45]", "* El campo %s debe contener 45 caracteres como maximo");
			$this->form_validation->set_error_delimiters('<p class="formError">','</p>');
			if ($this->form_validation->run() == FALSE){
				$data["items"] = $this->participantes->showItems();
				$data["error"] = form_error("Descripcion");
				$this->load->view("maestros/lista",$data);
			}else{
				extract($_POST);
				switch($action){
					case "add":
						$data["success"] = $this->participantes->insert(array($DNI,$CodigoUni,$Nombre_Persona,$ApellidoPaterno,
							$ApellidoMaterno,$CorreoElectronico));
						break;
					case "edit":
						$data["success"] = $this->participantes->edit(array($idParticipante,$Nombre_Persona,$ApellidoPaterno,
							$ApellidoMaterno,$CorreoElectronico));
						break;
					case "del":
						$data["success"] = $this->participantes->delete($idParticipante);
						break;
					default;
						$data["success"] = "";
						break;
				}
				$data["items"] = $this->participantes->showItems();
				$this->load->view("maestros/lista",$data);
			}
		}
	}
}
?>