<?php 

class Home extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cliente_modelo','',TRUE);
		$this->load->model ( 'Profesor_modelo', '', TRUE );
		$this->load->model ( 'Administrador_modelo', '', TRUE );
	
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data=array();
	
	}
	
	function index(){
		if($this->session->userdata('logged_in')['login']){
				
		$data['sesion']=$this->session->userdata('logged_in');
		
		$tipoUsuario = $data['sesion']['usertype'];
		
		if ($this->Cliente_modelo->is_cliente($tipoUsuario)) {
			
			$this->home_cliente();
		} 
		else 
			
		if ($this->Profesor_modelo->is_profesor($tipoUsuario)) {
				$this->home_profesor();
		}
		else 
			
		if ($this->Administrador_modelo->is_administrador($tipoUsuario)) {
					$this->home_administrador();
		}
		}
		else redirect(base_url());
		
	}
	
	
	function home_cliente(){
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Cliente_modelo->menu_cliente();
		$data['content'] ='content';
		
		$this->load->view ('home_view',$data);
		
	}
	
	function home_profesor(){
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Profesor_modelo->menu_profesor();
		$data['content'] ='content';
		
		$this->load->view ('home_view',$data);
	}
	
	function home_administrador(){
		
		$data['sesion'] = $this->session->userdata('logged_in');
		$data['left_menu'] = $this->Administrador_modelo->menu_administrador();
		$data['content'] ='content';
		
		$this->load->view ('home_view',$data);
	}
	
	
}

?>