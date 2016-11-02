<?php 

class Security extends CI_Controller{
	
	protected  $usuario = '';
	
	public $rol_puede = array(
			
			'cliente'=>array('nota/alta_nota','nota/listar_notas/modificacion',
				'nota/listar_notas/baja','nota/listar_notas/listar'	
			),
			'administrador'=>array(
					'cliente/alta_cliente','cliente/listar_clientes/modificar',
					'cliente/listar_clientes/baja','cliente/listar_clientes/lista',
					'profesor/alta_profesor','profesor/lista_profesor/modificar',
					'profesor/lista_profesor/baja','profesor/lista_profesor/lista',
					'abono/alta_abono', 'abono/lista_abono/modificar','abono/lista_abono/baja',
					'abono/lista_abono/lista', 'cliente/alta','cliente/modificacion_cliente',
					'cliente/modificacion','cliente/baja_cliente','profesor/alta',
					'profesor/modificacion_profesor','profesor/modificacion',
					'profesor/baja','abono/alta','abono/modificacion_abono','abono/modificacion',
					'abono/baja'
					)
	);
	
	
	public function _construct(){
		parent::__construct();
		$this->usuario = $this->session->userdata('logged_in')['usertype'];
		$this->validarPagina(current_url());
	} 
	
	function validarPagina($url_actual){
		if($this->session->userdata('logged_in')['login']){
			$url = $this->rol_puede[$this->usuario];
			foreach ($url as $fila){
				if(stristr($url_actual,base_url($fila))){ //si encontro la url actual
					redirect(base_url($fila));
				}
			}
		}
		else redirect(base_url('login'));
	}
}


?>