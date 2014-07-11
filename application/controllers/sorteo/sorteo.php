<?php
class Sorteo extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->helper("html");
		//$this->load->model("maestros/eventos");
		//$this->load->model("login_model");
	}
	public function index() {
		echo "sorteando...";
	}
	public function sindividual() {
		$this->load->view("sorteos/individual");
		//echo "ola ke ase";
	}
	public function sgrupal() {
		$this->load->view("sorteos/grupal");
		//$this->load->view("sorteos/individual");
	}
}
?>