<?php
class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cliente_modelo','',TRUE);
		$this->load->model ( 'Profesor_modelo', '', TRUE );
		$this->load->model ( 'Administrador_modelo', '', TRUE );
		
		$this->load->helper('url');
		
	}

	
	function login() {
		$this->load->helper(array('form'));
		$this->load->view ( 'login_view' );
	}
	
	
	function index()
	{
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('usuario', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
	
		if($this->form_validation->run() == FALSE)
		{
			
			$this->login();
			
		}
		else
		{ 
			//Go to private area
			
			$data=array();
			$data['sesion'] = $this->session->userdata('logged_in');
		
			redirect(base_url('Home/'));
			
		}
	
	}
	
	function check_database($password)
	{
	
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('usuario');
		$type="";
	
		//query the database
		$resultCliente = $this->Cliente_modelo->login($username, $password);
		$resultProfesor = $this->Profesor_modelo->login ( $username, $password );
		$resultAdmin = $this->Administrador_modelo->login ( $username, $password );
		$result ="";
		if ($resultCliente && !$resultProfesor  && !$resultAdmin) {
			$result = $resultCliente; $type='cliente';
				
		} else {
			if (!$resultCliente && $resultProfesor && !$resultAdmin) {
				$result = $resultProfesor; $type='profesor';
			} else {
				if ($resultAdmin) {
					$result = $resultAdmin; $type='administrador';
				}
			}
		}
	
		 
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{	echo $row->nombre;
			$sess_array = array(
					'id' => $row->id,
					'username' => $row->dni,
					'name' =>$row->nombre,
					'login'=>TRUE,
					'usertype' =>$type
			);
			$this->session->set_userdata('logged_in', $sess_array);
			}
				
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Usuario o contraseña incorrectos.');
	
			return false;
		}
	}
	
}
?>