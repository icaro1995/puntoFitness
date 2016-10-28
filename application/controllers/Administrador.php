<?php 


class Administrador extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Administrador_modelo','',TRUE);
		$this->load->model('Profesor_modelo','',TRUE);
		$this->load->model('Cliente_modelo','',TRUE);
		$this->load->model('Abono_modelo','',TRUE);
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data=array();
	
	}
	
	
}

?>