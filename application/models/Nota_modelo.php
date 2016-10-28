<?php
class Nota_Modelo extends CI_Model{

	function insert_nota($datos){
		
		$this -> db -> insert('nota_ejercicio', $datos);
	}

	function update_nota($id, $datos){
		
		$this -> db -> where('id', $id);
		$this -> db -> update('nota_ejercicio', $datos);
	}

	function delete_nota($id){
		$this -> db -> where('id', $id);
		$this -> db -> delete('nota_ejercicio');
	}

	function get_nota($id){
		$this -> db -> select('*');
		$this -> db -> from('nota_ejercicio');
		$this -> db -> where('id', $id);
		
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function get_notas($idcliente){
		$this -> db -> select('*');
		$this -> db -> from('nota_ejercicio');
		$this -> db -> where('idcliente', $idcliente);
		$consulta = $this -> db -> get();
		$notas = array();
		$i=0;
		foreach($consulta -> result() as $fila){
			$notas[$i]=$fila;
			$i++;
		}
		return $notas;
	}
}
?>