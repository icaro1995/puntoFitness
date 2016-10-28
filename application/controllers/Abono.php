<?php
class Abono extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'Abono_modelo', '', TRUE );
		$this->load->model ( 'Administrador_modelo', '', TRUE );
		
		$this->load->helper ( 'url' );
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		$data = array ();
	}
	function alta_abono() {
		$data ['sesion'] = $this->session->userdata ( 'logged_in' );
		$data ['left_menu'] = $this->Administrador_modelo->menu_administrador ();
		$data ['content'] = 'abono/alta_abono';
		$this->load->view ( 'home_view', $data );
	}
	function alta() {
		$duracion = $this->input->post ( 'duracion_abono' );
		$precio = $this->input->post ( 'precio_abono' );
		$cantDias = $this->input->post ( 'cantDias_abono' );
		
		if ($this->validar ()) {
			$this->Abono_modelo->insert_abono ( $duracion, $precio, $cantDias );
			redirect ( base_url ( 'Home/' ) );
		} else {
			$this->alta_abono ();
		}
	}
	function validar() {
		$this->form_validation->set_rules ( 'duracion_abono', 'Duracion_abono', 'trim|required' );
		$this->form_validation->set_rules ( 'precio_abono', 'Precio_abono', 'trim|required' );
		$this->form_validation->set_rules ( 'cantDias_abono', 'CantidadDias_abono', 'trim|required' );
		
		return $this->form_validation->run ();
	}
	function lista_abono($operacion) {
		if ($this->session->userdata ( 'logged_in' ) ['login'] && $this->Administrador_modelo->is_administrador ( $this->session->userdata ( 'logged_in' ) ['usertype'] )) {
			$data ['sesion'] = $this->session->userdata ( 'logged_in' );
			$data ['left_menu'] = $this->Administrador_modelo->menu_administrador ();
			$data ['content'] = 'abono/lista_abono';
			$data ['abonos'] = $this->Abono_modelo->get_abonos();
			
			if ($operacion == 'lista') {
				$data ['baja'] = false;
				$data ['modificacion'] = false;
			} else if ($operacion == 'modificar') {
				
				$data ['baja'] = false;
				$data ['modificacion'] = true;
			} else {
				$data ['baja'] = true;
				$data ['modificacion'] = false;
			}
			$this->load->view ( 'home_view', $data );
		} else
			redirect ( base_url () );
	}
	function modificacion_abono($id) {
		$data ['sesion'] = $this->session->userdata ( 'logged_in' );
		$data ['left_menu'] = $this->Administrador_modelo->menu_administrador ();
		$data ['content'] = 'abono/modificacion_abono';
		
		$data ['abono'] = $this->Abono_modelo->get_abono ( $id );
		
		$this->load->view ( 'home_view', $data );
	}
	function modificacion($id) {
		$duracion_abono = $this->input->post ( 'duracion_abono' );
		$precio_abono = $this->input->post ( 'precio_abono' );
		$cantDias_abono = $this->input->post ( 'cantDias_abono' );
		
		if ($this->validar ()) {
			$this->Abono_modelo->update_abono ( $id, $duracion_abono, $precio_abono, $cantDias_abono );
			redirect ( base_url ( 'Home/' ) );
		} else {
			$this->modificacion_abono ( $id );
		}
	}
	function baja($id) {
		$this->Abono_modelo->delete_abono ( $id );
		redirect ( base_url ( 'Home/' ) );
	}
}
?>