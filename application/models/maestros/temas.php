<?php
class Temas extends CI_Model {
	public function __construct() {
        $this->load->database();
    }
	public function generateScript(){
		$cols = array("idTema","Descripcion");
		$script = "";
		foreach($cols as $index => $field){
			$script .= "
				document.getElementById(\"$field\").value = item.eq($index).val();";
		}
		return $script;
	}
	public function showItems() {
		$query = "call sp_tema_select()";
		$consulta = $this->db->query($query);
		$resultSet = $consulta->result();
		$data = "";
		foreach($resultSet as $index => $item){
			$imagen = img("images/event.png");
			$nombre = $item->Descripcion;
			$id = $item->idTema;
			$hiddens = form_hidden(array(
				"id$id" => $item->idTema,
				"nombre$id" => $item->Descripcion
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
		$query = "call sp_tema_select()";
		$consulta = $this->db->query($query);
		return $consulta->result();
    }
	public function insert($params){
		$query = "call sp_tema_insert(?)";
		$this->db->query($query, $params);
	}
	public function edit($params){
		$query = "call sp_tema_edit(?,?)";
		$this->db->query($query, $params);
	}
	public function delete($id){
		$query = "call sp_tema_delete(?)";
		$this->db->query($query, array($id));
	}
	public function formStruct(){
		$struct = array(
			"target" => "maestros/guarda/tema/",
			"items" => array(
				array("control"=>"h","attr"=>array("type"=>"hidden","name"=>"idTema","id"=>"idTema")),
				array("control"=>"i","attr"=>array("type"=>"text","name"=>"Descripcion","id"=>"Descripcion","class"=>"s20"),"caption"=>"Nombre")
			)
		);
		return $struct;
	}
}
?>