<?php
class Profesor_modelo extends CI_Model {
	function login($dni, $password) {
		$this->db->select ( 'id,dni,nombre,password, idrol' );
		$this->db->from ( 'usuario' );
		$this->db->where ( 'dni', $dni );
		$this->db->where ( 'password', $password );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			
			return $query->result ();
		} else {
			return false;
		}
	}
	
	function menu_profesor(){
		
	}
	
	function is_profesor($tipo_usuario) {
		if ($tipo_usuario == 'profesor') {
			return true;
		} else
			return false;
	}
	function existe_dni($dni) {
		$this->db->select ( '*' );
		$this->db->from ( 'usuario' );
		$this->db->where ( 'dni', $dni );
		$this->db->where ( 'idrol', 2 );
		$this->db->limit ( 1 );
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else
			return false;
	}
	function insert_profesor($nombre, $apellido, $dni, $email, $telefono, $password, $titulo) {
		$datos = array (
				'dni' => $dni,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'nombre_usuario' => $dni,
				'password' => MD5 ( $password ),
				'telefono' => $telefono,
				'email' => $email,
				'idrol' => 2 
		);
		$this->db->insert ( 'usuario', $datos );
		
		// Busco el id del usuario recién insertado
		$this->db->select ( 'id' );
		$this->db->from ( 'usuario' );
		$this->db->where ( 'dni', $dni );
		$rol = 2;
		$this->db->where ( 'idrol', $rol );
		$this->db->limit ( 1 );
		$query = $this->db->get ();
		
		foreach ( $query->result () as $row ) {
			$usuarioID = $row->id;
		}
		
		// Inserto en la tabla Profesor
		$datosProfesor = array (
				'titulo' => $titulo,
				'idusuario' => $usuarioID 
		);
		$this->db->insert ( 'profesor', $datosProfesor );
	}
	function update_profesor($id,$datos_profesor,$datos_usuario) {
		
		$this->db->where ( 'id', $id );
		$this->db->update ( 'usuario', $datos_usuario );
		
		
		$this->db->where ( 'idusuario', $id);
		$this->db->update ( 'profesor', $datos_profesor );
	}
	function delete_profesor($id) {
		$this->db->where ( 'idusuario', $id );
		$this->db->delete ( 'profesor' );
		
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'usuario' );
	}
	function get_profesor($id) {
		$this->db->select('p.id as id_profesor,p.titulo,u.*');
		$this->db->from('profesor p');
		$this->db->join('usuario u','p.idusuario=u.id');
		$this->db->where('u.id',$id);
		$this->db->where('idrol',2);
		$consulta = $this -> db -> get();
		
		
		if($consulta -> num_rows() == 1)
		{
			
			return $consulta->result();
		}
		else
		{ 
			return false;
		}
	}
	function get_profesores() {
		$this->db->select ( 'p.id as id_profesor,p.titulo,u.*' );
		$this->db->from ( 'profesor p' );
		$this->db->join ( 'usuario u','p.idusuario=u.id' );
		$consulta = $this->db->get ();
		
		$profesores = array ();
		$i = 0;
		
		foreach($consulta->result() as $fila){
			$profesores[$i]=$fila;
			$i++;
		}
		
		return $profesores;
	}
}

?>