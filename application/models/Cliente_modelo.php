<?php
class Cliente_Modelo extends CI_Model{
	
	
	function login($dni, $password)
	{
		
		$this -> db -> select('id,dni,nombre,password');
		$this -> db -> from('usuario');
		$this -> db -> where('idrol',3);
		$this -> db -> where('dni', $dni);
		$this -> db -> where('password',md5($password));
		$this -> db -> limit(1);
	
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
	
	function is_cliente($tipo_usuario){
		if($tipo_usuario=='cliente'){
			return true;
		}
		else return false;
	}
	
	function menu_cliente(){
		$accion1=array(
				'label'=>'Agregar',
				'url' =>base_url("nota/alta_nota")
		);
			
		$accion2=array(
				'label'=>'Modificar',
				'url' =>base_url('nota/listar_notas/modificacion')
		);
			
		$accion3=array(
				'label'=>'Dar de baja',
				'url' =>base_url('nota/listar_notas/baja')
		);
		$accion4=array(
				'label'=>'Consultar',
				'url' =>base_url('nota/listar_notas/listar')
		);
	
		$items1=array(
				'seccion'=>"Nota",
				0=>$accion1,
				1=>$accion2,
				2=>$accion3,
				3=>$accion4
		);
	
	
		$sections=array();
		$sections[0]=$items1;
	
	
		$menuUsuario=array(
				'secciones'=>$sections
		);
	
		return $menuUsuario;
	
	}
	
	
	
	
	function insert_cliente($dni,$nombre,$apellido,$idabono,$diasRestantesAbono,$email,$telefono,$password){
		
		$datos_usuario=array(
			'dni'=>$dni,
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'nombre_usuario'=>$dni,
			'telefono'=>$telefono,
			'email'=>$email,
			'password'=>md5($password),
			'idrol'=>3
				
		);
		$this->registrar_usuario($datos_usuario);
		
		$fecha = getDate();
		$fecha_inscripcion = date('Y-m-d');
		$fecha_fin_abono = date('Y-m-d',strtotime("$fecha_inscripcion+30 days"));
		$usuario = $this->get_usuario($dni);
		$id_usuario=0;
		foreach ($usuario as $user){
			$id_usuario=$user->id;
		}
		$datos=array(
			'fecha_inscripcion'=>$fecha_inscripcion,
			'clases_sin_asignar'=>$diasRestantesAbono,
			'idabono'=>$idabono,
			'idusuario'=>$id_usuario
		);
		$this->db->insert('cliente',$datos);
		$cliente = $this->get_cliente($dni);
		$id_cliente = 0;
		foreach ($cliente as $c)
			$id_cliente = $c->id;
		
		$datos_cliente_abono = array(
			'fecha_inicio'=>$fecha_inscripcion,
			'fecha_fin'=>$fecha_fin_abono,
			'id_cliente'=>$id_cliente,
			'id_abono'=>$idabono	
		);
		$this->db->insert('cliente_abono',$datos_cliente_abono);
	}
	
	function registrar_usuario($datos){
		$this->db->insert('usuario',$datos);
	}
	function get_usuario($dni){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('dni',$dni);
		
		$this->db->limit(1);
		$consulta = $this->db->get();
		
		if($consulta -> num_rows() == 1)
		{
			
			return $consulta->result();
		}
		else
		{
			return false;
		}
	}
	
	function update_cliente($id,$datos_usuario,$datos_cliente){
		/*$datos=array(
				
				'nombre'=>$nombre,
				'apellido'=>$apellido,
				'idabono'=>$idabono,
				'diasRestantesAbono'=>$diasRestantesAbono,
				'email'=>$email,
				'telefono'=>$telefono,
				
		);*/
		$this->db->where('id',$id);
		$this->db->update("usuario",$datos_usuario);
		
		$this->db->where('idusuario',$id);
		$this->db->update("cliente",$datos_cliente);
		return true;
	}
	
	function delete_cliente($id){
		$this->db->where('id',$id);
		$this->db->delete('cliente');
	}
	
	function get_cliente($dni)
	{
		$this->db->select('c.id as id_cliente,c.fecha_inscripcion,c.clases_sin_asignar,c.idabono,c.idusuario,
				u.*');
		$this->db->from('cliente c');
		$this->db->join('usuario u','u.id=c.idusuario');
		$this->db->where('dni',$dni);
		$this->db->where('idrol',3);
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
	function get_clientes(){
		$this->db->select('c.id as id_cliente,c.fecha_inscripcion,c.clases_sin_asignar,c.idabono,c.idusuario,u.*');
		$this->db->from('cliente c');
		$this->db->join('usuario u','c.idusuario=u.id');
		
		$consulta = $this->db->get();
		
		$clientes=array();
		$i=0;
		foreach($consulta->result() as $fila){
			$clientes[$i]=$fila;
			$i++;
		}
		return $clientes;
	}
	
	function existe_dni($dni){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('dni',$dni);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query-> num_rows()==1){
			return $query->result();
		}
		else return false;
	}
}
?>