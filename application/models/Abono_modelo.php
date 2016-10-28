<?php
class Abono_modelo extends CI_Model {
	function insert_abono($duracion, $precio, $cantDias) {
		$datos = array (
				'duracion' => $duracion,
				'precio' => $precio,
				'cantidad_dias' => $cantDias 
		);
		$this->db->insert ( 'abono', $datos );
	}
	function update_abono($id, $duracion, $precio, $cantDias) {
		$datos = array (
				'duracion' => $duracion,
				'precio' => $precio,
				'cantidad_dias' => $cantDias 
		);
		$this->db->where ( 'id', $id );
		$this->db->update ( 'abono', $datos );
	}
	function delete_abono($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'abono' );
	}
	function get_abono($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'abono' );
		$this->db->where ( 'id', $id );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			
			return $query->result();
		} 
		else 
			{
			return false;
			}
	}
	function get_abonos() {
		$consulta = $this->db->get ( 'abono' );
		$datos = array ();
		$i = 0;
		foreach($consulta -> result() as $fila){
			$datos[$i]=$fila;
			$i++;
		}
		
		return $datos;
	}
}
?>