<?php
class Eventos extends CI_Model {
	public function __construct() {
        $this->load->database();
    }
	public function showItems() {
		$query = "call sp_evento_select()";
		$consulta = $this->db->query($query);
		$resultSet = $consulta->result();
		$data = "";
		foreach($resultSet as $index => $item){
			$imagen = img("images/event.png");
			$nombre = $item->Nombre_Evento;
			$id = $item->IdEvento;
			$hiddens = form_hidden(array(
				"id$id" => $item->IdEvento,
				"nombre$id" => $item->Nombre_Evento,
				"fini$id" => $item->FechaInicio,
				"ffin$id" => $item->Fechafin,
				"nro$id" => $item->NumeroParticipantes,
				"duracion$id" => $item->Duracion_Evento,
				"lugar$id" => $item->Lugar_Evento,
				"estado$id" => $item->IdEstadoEvento
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
		$query = "call sp_evento_select()";
		$consulta = $this->db->query($query);
		return $consulta->result();
    }
	public function insert($params){
		$query = "call sp_evento_insert(?,?,?,?)";
		$this->db->query($query, $params);
	}
	public function edit($params){
		$query = "call sp_evento_edit(?,?,?,?,?)";
		$this->db->query($query, $params);
	}
	public function delete($id){
		$query = "call sp_evento_delete(?)";
		$this->db->query($query, array($id));
	}
	public function formStruct(){
		$struct = array(
			"target" => "maestros/guarda/",
			"items" => array(
				array("control"=>"h","attr"=>array("type"=>"hidden","name"=>"IdEvento","id"=>"IdEvento")),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"Nombre_Evento","id"=>"Nombre_Evento","class"=>"s20"),"caption"=>"Nombre"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"FechaInicio","id"=>"FechaInicio","class"=>"s12"),"caption"=>"Fecha Inicio"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"Fechafin","id"=>"Fechafin","class"=>"s12"),"caption"=>"Fecha Fin"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"NumeroParticipantes","id"=>"NumeroParticipantes","class"=>"s10","disabled"=>"disabled"),"caption"=>"Participantes"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"Duracion_Evento","id"=>"Duracion_Evento","class"=>"s10","disabled"=>"disabled"),"caption"=>"Duracion"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"Lugar_Evento","id"=>"Lugar_Evento","class"=>"s25"),"caption"=>"Lugar"),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"IdEstadoEvento","id"=>"IdEstadoEvento","class"=>"s10","disabled"=>"disabled"),"caption"=>"Estado")
			)
		);
		return $struct;
	}
}
?>