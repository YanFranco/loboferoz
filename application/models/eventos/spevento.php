<?php
class Spevento extends CI_Model {
	public function __construct() {
        $this->load->database();
    }
	public function lista_sesiones($IdEvento) {
		$query = "call sp_sesion_data_lista(?)";
		$consulta = $this->db->query($query, array($IdEvento));
		return $consulta->result();
	}
	public function combo_tipos_evento() {
		$query = "select IdTipo cod,concat('[',Codigo_Tipo,'] ',Nombre_Tipo) des from tipo where IdSuperTipo = 0 and Activo = 1";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}
	public function guarda_sesion($params) {
		$query = "call sp_sesion_registra(?,?,?,?)";
		$consulta = $this->db->query($query, $params);
	}
}
?>