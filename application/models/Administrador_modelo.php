<?php 

class Administrador_modelo extends CI_Model{
	
	
	function login($dni, $password)
	{
		
		$this->db->select ( 'id,dni,nombre,password' );
		$this->db->from ( 'usuario' );
		$this->db->where('idrol',1);
		$this->db->where ( 'dni', $dni );
		$this->db->where ( 'password', $password );
		$this->db->limit ( 1 );
		
	
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
	
	function is_administrador($tipo_usuario){
		if($tipo_usuario=='administrador'){
			return true;
		}
		else return false;
	}
	
	function menu_administrador(){
	
		$accion1=array(
				'label'=>'Agregar',
				'url' =>base_url('cliente/alta_cliente')
		);
			
		$accion2=array(
				'label'=>'Modificar',
				'url' =>base_url('cliente/listar_clientes/modificar')
		);
			
		$accion3=array(
				'label'=>'Dar de baja',
				'url' =>base_url('cliente/listar_clientes/baja')
		);
		$accion4=array(
				'label'=>'Consultar',
				'url' =>base_url('cliente/listar_clientes/lista')
		);
	
		$items1=array(
				'seccion'=>"Cliente",
				0=>$accion1,
				1=>$accion2,
				2=>$accion3,
				3=>$accion4
		);
	
	
		$accion2_1=array(
				'label'=>'Agregar',
				'url' =>base_url('profesor/alta_profesor')
		);
			
		$accion2_2=array(
				'label'=>'Modificar',
				'url' =>base_url('profesor/lista_profesor/modificar')
		);
			
		$accion2_3=array(
				'label'=>'Dar de baja',
				'url' =>base_url('profesor/lista_profesor/baja')
		);
	
		$accion2_4=array(
				'label'=>'Consultar',
				'url' =>base_url('profesor/lista_profesor/lista')
		);
	
		$items2=array(
				'seccion'=>"Profesor",
				0=>$accion2_1,
				1=>$accion2_2,
				2=>$accion2_3,
				3=>$accion2_4
		);
	
		$accion3_1=array(
				'label'=>'Agregar',
				'url' =>base_url('abono/alta_abono')
		);
			
		$accion3_2=array(
				'label'=>'Modificar',
				'url' =>base_url('abono/lista_abono/modificar')
		);
			
		$accion3_3=array(
				'label'=>'Dar de baja',
				'url' =>base_url('abono/lista_abono/baja')
		);
	
		$accion3_4=array(
				'label'=>'Consultar',
				'url' =>base_url('abono/lista_abono/lista')
		);
	
		$items3=array(
				'seccion'=>"Abono",
				0=>$accion3_1,
				1=>$accion3_2,
				2=>$accion3_3,
				3=>$accion3_4
		);
	
	
	
		$sections=array(3);
		$sections[0]=$items1;
		$sections[1]=$items2;
		$sections[2]=$items3;
	
		$menuUsuario=array(
				'secciones'=>$sections
		);
	
		return $menuUsuario;
	
	}
	
	
}



?>