<?php 

class Nota extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cliente_modelo','',TRUE);
		
		$this->load->model('Nota_modelo','',TRUE);
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	
	
	}
	
	function alta_nota(){
		if($this->session->userdata('logged_in')['login'] &&
		$this->Cliente_modelo->is_cliente($this->session->userdata('logged_in')['usertype'])){
			
			$data['sesion'] = $this->session->userdata('logged_in');
			$data['left_menu'] = $this->Cliente_modelo->menu_cliente();
			$data['content'] = 'nota/alta_nota';
			
			$this->load->view('home_view',$data);
		}
		else redirect (base_url());
		
	}
	function alta(){
		if($this->validar()){
			$nombre = $this->input->post('nombre_nota');
			$descripcion = $this->input->post('descripcion_nota');
			$repeticiones = $this->input->post('rep_nota');
			$fecha = date('Y-m-d');
			$cliente = $this->Cliente_modelo->get_cliente($this->session->userdata('logged_in')['username']);
			$id_cliente = 0;
			
			foreach ($cliente as $c){
			 $id_cliente = $c->id_cliente;	
			}
			
			$datos = array(
				'nombreEjercicio'=>$nombre,
				'descripcion'=>$descripcion,
				'cantidadRepeticiones'=>$repeticiones,
				'fecha'=>$fecha,
				'idcliente'=>$id_cliente
			);
			$this->Nota_modelo->insert_nota($datos);
			redirect(base_url('home/'));
		}
			else $this->alta_nota();
	}
	
	function validar(){
		$this->form_validation->set_rules('nombre_nota','Nombre_nota','trim|required');
		$this->form_validation->set_rules('descripcion_nota','Desc_nota','trim|required');
		$this->form_validation->set_rules('rep_nota','Rep_nota','trim|required');
		
		return $this->form_validation->run();
	}
	
	
	function listar_notas($operacion){
				
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Cliente_modelo->menu_cliente();
		$data['content'] = 'nota/lista_nota';
		
		$cliente = $this->Cliente_modelo->get_cliente($this->session->userdata('logged_in')['username']);
		$id_cliente = 0;
			
		foreach ($cliente as $c){
			$id_cliente = $c->id_cliente;
		}
			
		$data['notas'] = $this->Nota_modelo->get_notas($id_cliente);
		
		if($operacion=='listar'){
			$data['baja']=false;
			$data['modificacion']=false;
		}
		else
		if($operacion=='modificacion'){
			$data['baja']=false;
			$data['modificacion']=true;
		}
		else
		{	
			$data['baja']=true;
			$data['modificacion']=false;
		}
		$this->load->view('home_view',$data);
	}
	
	function baja_nota($id_nota){
		$this->Nota_modelo->delete_nota($id_nota);
		redirect(base_url('home/'));
	}
	
	function modificacion_nota($id_nota){
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Cliente_modelo->menu_cliente();
		$data['content'] = 'nota/modificacion_nota';
		$data['nota'] = $this->Nota_modelo->get_nota($id_nota);
		
		$this->load->view('home_view',$data);
	}
	
	function modificacion($id_nota){
		if($this->validar()){
			$nombre = $this->input->post('nombre_nota');
			$descripcion = $this->input->post('descripcion_nota');
			$repeticiones = $this->input->post('rep_nota');
			
			$datos = array(
				'nombreEjercicio'=>$nombre,
				'descripcion'=>$descripcion,
				'cantidadRepeticiones'=>$repeticiones
			);
			$this->Nota_modelo->update_nota($id_nota,$datos);
			redirect(base_url('home/'));
		}
		else $this->modificacion_nota($id_nota);
	}
}



?>