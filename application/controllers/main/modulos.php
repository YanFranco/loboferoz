<?php
class Modulos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper("html");
		$this->load->helper("form");
		$this->load->library("form_validation");
		$this->load->model("login_model");
	}
	public $data = array(
		"style" => array(
			"href" => "css/style.css",
			"rel" => "stylesheet",
			"type" => "text/css"
		),
		"fonts" => array(
			"href" => "css/fonts.css",
			"rel" => "stylesheet",
			"type" => "text/css"
		)
	);
	public function index() {
		$logged = $this->login_model->isLogged();
        if($logged == TRUE) {
        	$this->data["username"] = $this->session->userdata['username'];
			$this->data["ref"] = "home";
			$this->load->view("main/home",$this->data);
        }
        elseif(!isset($_POST['username'])) {
			$this->load->view("login/form_login"); //si no recibimos datos por post, cargamos la vista del formulario
		}
		else {
			//definimos las reglas de validación
			$this->form_validation->set_rules('username','Usuario','required|min_lenght[5]|max_lenght[20]');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run() == FALSE) {//si no supera las reglas de validación se recarga la vista del formulario
            	$this->load->view("login/form_login",array("err" => "Compruebe que ha ingresado datos v&aacute;lidos."));
			}
			else {
				$isValidLogin = $this->login_model->getLogin($_POST['username'],$_POST['password']); //pasamos los valores al modelo para que compruebe si existe el usuario con ese password
				if($isValidLogin) {
					// si existe el usuario, registramos las variables de sesión y abrimos la página de exito
					$sesion_data = array(
						'username' => $_POST['username'],
						'password' => $_POST['password']
					);
					$this->session->set_userdata($sesion_data);
					$this->data["username"] = $this->session->userdata['username'];
                    //$data['password'] = $this->session->userdata['password'];
					$this->data["ref"] = "home";
					$this->load->view("main/home",$this->data);
				}
				else {
                    // si es erroneo, devolvemos un mensaje de error
                    $this->load->view("login/form_login",array("err" => "Sus datos son incorrectos."));
                }
            }
		}
	}
//
	public function data() {
		if($this->session->userdata['username'] == TRUE) {
			echo $this->session->userdata['username'];
			echo $this->session->userdata['password'];
		}
	}
	public function destroy() {
		//destruimos la sesión
		$this->login_model->close();
		$this->load->view("login/form_login");
	}
	public function perfil() {
        //pagina restringida a usuarios registrados.
        $logged = $this->login_model->isLogged();
        if($logged == TRUE) {
        	echo "Tienes permiso para ver el contenido privado";
        }
        else {
            //si no tiene permiso, abrimos el formulario para loguearse
            $this->load->view('login');
        }
    }
//
	public function home() {
		$logged = $this->login_model->isLogged();
        if($logged == TRUE) {
        	$this->data["username"] = $this->session->userdata['username'];
			$this->data["ref"] = "home";
			$this->load->view("main/home",$this->data);
        }
        else {
            //si no tiene permiso, abrimos el formulario para loguearse
            $this->load->view("login/form_login");
        }
	}
	public function registros() {
		$logged = $this->login_model->isLogged();
        if($logged == TRUE) {
        	$this->data["username"] = $this->session->userdata['username'];
			$this->data["ref"] = "regs";
			$this->load->view("main/home",$this->data);
        }
        else {
            //si no tiene permiso, abrimos el formulario para loguearse
            $this->load->view("login/form_login");
        }
	}
	public function asistencia() {
		$logged = $this->login_model->isLogged();
        if($logged == TRUE) {
        	$this->data["username"] = $this->session->userdata['username'];
			$this->data["ref"] = "asis";
			$this->load->view("main/home",$this->data);
        }
        else {
            //si no tiene permiso, abrimos el formulario para loguearse
            $this->load->view("login/form_login");
        }
	}
	public function sorteos() {
		$logged = $this->login_model->isLogged();
        if($logged == TRUE) {
        	$this->data["username"] = $this->session->userdata['username'];
			$this->data["ref"] = "sort";
			$this->load->view("main/home",$this->data);
        }
        else {
            //si no tiene permiso, abrimos el formulario para loguearse
            $this->load->view("login/form_login");
        }
	}
	public function personalizacion() {
		$logged = $this->login_model->isLogged();
        if($logged == TRUE) {
        	$this->data["username"] = $this->session->userdata['username'];
			$this->data["ref"] = "pers";
			$this->load->view("main/home",$this->data);
        }
        else {
            //si no tiene permiso, abrimos el formulario para loguearse
            $this->load->view("login/form_login");
        }
	}
}
?>