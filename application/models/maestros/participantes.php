<?php
class Participantes extends CI_Model {
	public function __construct() {
        $this->load->database();
    }
	public function generateScript(){
		$cols = array("idParticipante","DNI","CodigoUni","Nombre_Persona","ApellidoPaterno","ApellidoMaterno",
			"CorreoElectronico","FechaRegistro");
		$script = "";
		foreach($cols as $index => $field){
			$script .= "
				document.getElementById(\"$field\").value = item.eq($index).val();";
		}
		return $script;
	}
	public function showItems() {
		$query = "call sp_participante_select()";
		$consulta = $this->db->query($query);
		$resultSet = $consulta->result();
		$data = "";
		foreach($resultSet as $index => $item){
			$imagen = img("images/participante.png");
			$nombre = $item->ApellidoPaterno." ".$item->ApellidoMaterno.", ".$item->Nombre_Persona;
			$id = $item->idParticipante;
			$hiddens = form_hidden(array(
				"id$id" => $item->idParticipante,
				"dni$id" => $item->DNI,
				"cod$id" => $item->CodigoUni,
				"nombre$id" => $item->Nombre_Persona,
				"apepat$id" => $item->ApellidoPaterno,
				"apemat$id" => $item->ApellidoMaterno,
				"correo$id" => $item->CorreoElectronico,
				"fereg$id" => $item->FechaRegistro
			));
			$data .= "
					<a href=\"javascript:selectItem('$id')\" class=\"detailItem\" id=\"detailItem$id\">
						<div>
							$imagen
							$hiddens
							<p>$nombre</p>
						</div>
					</a>";
		}
		return $data;
	}
    public function load() {
		$query = "call sp_participante_select()";
		$consulta = $this->db->query($query);
		return $consulta->result();
    }
	public function insert($params){
		$query = "call sp_participante_insert(?,?,?,?,?,?)";
		$this->db->query($query, $params);
	}
	public function edit($params){
		$query = "call sp_participante_edit(?,?,?,?,?)";
		$this->db->query($query, $params);
	}
	public function delete($id){
		$query = "call sp_participante_delete(?)";
		$this->db->query($query, array($id));
	}
	public function formStruct(){
		$struct = array(
			"target" => "maestros/guarda/participante/",
			"items" => array(
				array("control"=>"h","attr"=>array("type"=>"hidden","name"=>"idParticipante","id"=>"idParticipante")),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"DNI","id"=>"DNI","class"=>"s10"),"caption"=>"DNI"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"CodigoUni","id"=>"CodigoUni","class"=>"s10"),"caption"=>"Codigo UNI"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"Nombre_Persona","id"=>"Nombre_Persona","class"=>"s20"),"caption"=>"Nombres"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"ApellidoPaterno","id"=>"ApellidoPaterno","class"=>"s20"),"caption"=>"Ap. Paterno"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"ApellidoMaterno","id"=>"ApellidoMaterno","class"=>"s20"),"caption"=>"Ap. Materno"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"CorreoElectronico","id"=>"CorreoElectronico","class"=>"s25"),"caption"=>"E-mail"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"FechaRegistro","id"=>"FechaRegistro","class"=>"s10","disabled"=>"disabled"),"caption"=>"Fe. Registro")
			)
		);
		return $struct;
	}
}
?>