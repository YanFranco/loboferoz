<?php
class Sorteos extends CI_Model {
	public function __construct() {
        $this->load->database();
    }
	// public function generateScript(){
	// 	$cols = array("idTema","Descripcion");
	// 	$script = "";
	// 	foreach($cols as $index => $field){
	// 		$script .= "
	// 			document.getElementById(\"$field\").value = item.eq($index).val();";
	// 	}
	// 	return $script;
	// }
////////////////////////// Cargar los participante para sortear ///////////////////////
    public function loadParticipantesSorteo($params) {
		$query = "call sorteo_listarParticipante_sp(?);";
		$consulta = $this->db->query($query,$params);
		// return $consulta->result();
		$out = $consulta->result();
		$consulta->next_result();
		$consulta->free_result();
		return $out;

    }
////////////////////////// Cargar los Grupos a sortear ///////////////////////
    public function loadGruposSorteo($params) {
		$query = "call sorteo_listarGrupos_sp(?)";
		$consulta = $this->db->query($query,$params);
		//return $consulta->result();
		$out = $consulta->result();
		$consulta->next_result();
		$consulta->free_result();
		return $out;
    }
///////////////////////// Insertar calificacion de alumno //////////////////////////
	public function insertarParticipacion($params){
		$query = "call seleccionado_insertar_sp(?,?,?,?,?,?)";
		$this->db->query($query, $params);
	}

///////////////////////// Listar los participantes de grupo seleccionado//////////////////////////
	public function loadGrupoParticipantesSorteo($params) {
		$query = "call sorteo_listarGrupoParticipantes_sp(?)";
		$consulta = $this->db->query($query,$params);
		$out = $consulta->result();
		$consulta->next_result();
		$consulta->free_result();
		return $out;
		//return $consulta->result();
    }
///////////////////////// Mostrar el numero de grupos para un Sorteos//////////////////////////
	public function loadNumeroGrupos($params) {
		$query = "call sorteo_NumeroGrupos_sp(?)";
		$consulta = $this->db->query($query,$params);
		$out = $consulta->result();
		$consulta->next_result();
		$consulta->free_result();
		return $out;
    }

    public function ReporteParticipacion($params){
    	$query = "call reporte_participacion_sp(?)";
    	$consulta = $this->db->query($query,$params);
    	// return $consulta->result();
    	$out = $consulta->result();
		$consulta->next_result();
		$consulta->free_result();
		return $out;
    }

	public function RecordAsistencia($params){
    	$query = "call reporte_asistencia_sp(?)";
    	$consulta = $this->db->query($query,$params);
    	// return $consulta->result();
    	$out = $consulta->result();
		$consulta->next_result();
		$consulta->free_result();
		return $out;
    }
/**************************************************************************/
	// public function delete($id){
	// 	$query = "call sp_tema_delete(?)";
	// 	$this->db->query($query, array($id));
	// }
	// public function formStruct(){
	// 	$struct = array(
	// 		"target" => "maestros/guarda/tema/",
	// 		"items" => array(
	// 			array("control"=>"h","attr"=>array("type"=>"hidden","name"=>"idTema","id"=>"idTema")),
	// 			array("control"=>"i","attr"=>array("type"=>"text","name"=>"Descripcion","id"=>"Descripcion","class"=>"s20"),"caption"=>"Nombre")
	// 		)
	// 	);
	// 	return $struct;
	// }
}
?>
