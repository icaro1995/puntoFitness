<?php 
require_once APPPATH.'controllers/Security.php';
class Cliente extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cliente_modelo','',TRUE);
		$this->load->model('Administrador_modelo','',TRUE);
		$this->load->model('Abono_modelo','',TRUE);
		$this->load->model('Nota_modelo','',TRUE);
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
	
	}
	
	function alta_cliente(){
		if($this->session->userdata('logged_in')['login'] && 
				$this->Administrador_modelo->is_administrador($this->session->userdata('logged_in')['usertype'])){
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Administrador_modelo->menu_administrador();
		$data['content'] = 'cliente/alta_cliente';
		$data['abonos'] = $this->Abono_modelo->get_abonos();
		$this->load->view('home_view',$data);
		}
		else redirect (base_url());
	}
	
	function alta(){
		if($this->session->userdata('logged_in')['login'] && 
				$this->Administrador_modelo->is_administrador($this->session->userdata('logged_in')['usertype'])){
		$dni = $this->input->post('dni_cliente');
		$nombre = $this->input->post('nombre_cliente');
		$apellido = $this->input->post('apellido_cliente');
		$abono = $this->Abono_modelo->get_abono($this->input->post('abono_cliente'));
		$id_abono=0;
		$dias_abono=0;
		foreach($abono as $fila){
			$id_abono=$fila->id;
			$dias_abono=$fila->cantidad_dias;
		}
		$mail = $this->input->post('email_cliente');
		$telefono = $this->input->post('tel_cliente');
		$clave = $this->input->post('clave_cliente');
		
		if($this->validar()){
			$this->Cliente_modelo->insert_cliente($dni,$nombre,$apellido,$id_abono,$dias_abono,
					$mail,$telefono,$clave);
			redirect(base_url('Home/'));
		}
		else {
		
			$this->alta_cliente();
		}
		}
		else redirect(base_url());
	}
	
	function validar() { //valida los datos de un cliente
	  $this->form_validation->set_rules('nombre_cliente','Nombre_cliente','trim|required');
	  $this->form_validation->set_rules('apellido_cliente','Apellido_cliente','trim|required');
	  $this->form_validation->set_rules('dni_cliente','Dni_cliente','trim|required|callback_check_dni');
	  $this->form_validation->set_rules('email_cliente','Email_cliente','trim|required');
	  $this->form_validation->set_rules('clave_cliente','Clave_cliente','trim|required');
	  $this->form_validation->set_rules('tel_cliente','Telefono_cliente','trim|required');
	  $this->form_validation->set_rules('abono_cliente','Abono_cliente','required');
	  
	  return $this->form_validation->run();
	}
	
	function check_dni($dni){ //verifica que no exista el nuevo dni
		if($this->Cliente_modelo->existe_dni($dni)){
			
			return false;
		}else return true;
	}
	
	function listar_clientes($operacion){
		if($this->session->userdata('logged_in')['login'] &&
				$this->Administrador_modelo->is_administrador($this->session->userdata('logged_in')['usertype'])){
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Administrador_modelo->menu_administrador();
		$data['content'] = 'cliente/lista_cliente';
		$data['clientes'] = $this->Cliente_modelo->get_clientes();
		
		if($operacion=='lista'){
			$data['baja'] =false;
			$data['modificacion'] =false;
		}
		else 
		if($operacion=='modificar'){
			
			$data['baja'] =false;
			$data['modificacion'] =true;
		}
		else {
			$data['baja'] =true;
			$data['modificacion'] =false;
		}
		$this->load->view('home_view',$data);
		}
		else redirect(base_url());
	}
	
	function modificacion_cliente($dni){
		if($this->session->userdata('logged_in')['login'] &&
				$this->Administrador_modelo->is_administrador($this->session->userdata('logged_in')['usertype'])){
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Administrador_modelo->menu_administrador();
		$data['content'] = 'cliente/modificacion_cliente';
		$data['abonos'] = $this->Abono_modelo->get_abonos();
		$data['cliente'] = $this->Cliente_modelo->get_cliente($dni);
		$this->load->view('home_view',$data);
		}
		else redirect(base_url());
	}
	
	function modificacion($id){
		if($this->session->userdata('logged_in')['login'] &&
			$this->Administrador_modelo->is_administrador($this->session->userdata('logged_in')['usertype'])){
			
					
			$this->form_validation->set_rules('nombre_clientem','Nombre_cliente','trim|required');
			$this->form_validation->set_rules('apellido_clientem','Apellido_cliente','trim|required');
			$this->form_validation->set_rules('email_clientem','Email_cliente','trim|required');
			//$this->form_validation->set_rules('clave_clientem','Clave_cliente','trim|required');
			$this->form_validation->set_rules('tel_clientem','Telefono_cliente','trim|required');
			$this->form_validation->set_rules('abono_clientem','Abono_cliente','required');
			
			if($this->form_validation->run()){
				
				$dni = $this->input->post('dni_clientem');
				$nombre = $this->input->post('nombre_clientem');
				$apellido = $this->input->post('apellido_clientem');
				$abono = $this->Abono_modelo->get_abono($this->input->post('abono_clientem'));
				$id_abono=0;
				$dias_abono=0;
				foreach($abono as $fila){
					$id_abono=$fila->id;
					$dias_abono=$fila->cantidad_dias;
				}
				$mail = $this->input->post('email_clientem');
				$telefono = $this->input->post('tel_clientem');
				$clave = $this->input->post('clave_clientem');
				
				$datos_usuario = array(
						
						'nombre'=>$nombre,
						'apellido'=>$apellido,
						'password'=>$clave,
						'telefono'=>$telefono,
						'email'=>$mail
				);
				
				$datos_cliente = array(
						'clases_sin_asignar'=>$dias_abono,
						'idabono'=>$id_abono,
				);
				
				
				
				$consulta=$this->Cliente_modelo->update_cliente($id,$datos_usuario,$datos_cliente);
				redirect(base_url('Home/'));
					
			}
			else
				$this->modificacion_cliente($dni);
			}
			else redirect(base_url());
					
					
		
		
	}
	
	function baja_cliente($dni){
		if($this->session->userdata('logged_in')['login'] &&
				$this->Administrador_modelo->is_administrador($this->session->userdata('logg_in')['usertype'])){
		$cliente = $this->Cliente_modelo->get_cliente($dni);
		
		foreach ($cliente as $cli){
		$notas= $this->Nota_modelo->get_notas($cli->id);
		foreach ($notas as $nota){
			$this->Nota_modelo->delete_nota($nota->id);
		}
		$this->Cliente_modelo->delete_cliente($cli->id);
		}
		redirect(base_url('Home/'));
	}
	else redirect(base_url());
	}
	
}

?>
