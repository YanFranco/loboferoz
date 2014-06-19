<?php
class Modulos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper("html");
		$this->load->helper("url");
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
		$this->data["ref"] = "home";
		$this->load->view("main/home",$this->data);
	}
	public function registros() {
		$this->data["ref"] = "regs";
		$this->load->view("main/home",$this->data);
	}
	public function asistencia() {
		$this->data["ref"] = "asis";
		$this->load->view("main/home",$this->data);
	}
	public function sorteos() {
		$this->data["ref"] = "sort";
		$this->load->view("main/home",$this->data);
	}
	public function personalizacion() {
		$this->data["ref"] = "pers";
		$this->load->view("main/home",$this->data);
	}
}
?>