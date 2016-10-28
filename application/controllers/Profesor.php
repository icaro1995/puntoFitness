<?php
class Profesor extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'Profesor_modelo', '', TRUE );
		$this->load->model ( 'Administrador_modelo', '', TRUE );
		$this->load->helper ( 'url' );
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		$data = array ();
	}
	function alta_profesor() {
		$data ['sesion'] = $this->session->userdata ( 'logged_in' );
		$data ['left_menu'] = $this->Administrador_modelo->menu_administrador ();
		$data ['content'] = 'profesor/alta_profesor';
		$this->load->view ( 'home_view', $data );
	}
	function alta() {
		$dni = $this->input->post ( 'dni_profesor' );
		$nombre = $this->input->post ( 'nombre_profesor' );
		$apellido = $this->input->post ( 'apellido_profesor' );
		$mail = $this->input->post ( 'email_profesor' );
		$telefono = $this->input->post ( 'tel_profesor' );
		$clave = $this->input->post ( 'clave_profesor' );
		$titulo = $this->input->post ( 'titulo_profesor' );
		
		if ($this->validar ()) {
			$this->Profesor_modelo->insert_profesor ( $nombre, $apellido, $dni, $mail, $telefono, $clave, $titulo );
			redirect ( base_url ( 'Home/' ) );
		} else {
			
			$this->alta_profesor ();
		}
	}
	
	function modificacion_profesor($id) {
		$data ['sesion'] = $this->session->userdata ( 'logged_in' );
		$data ['left_menu'] = $this->Administrador_modelo->menu_administrador ();
		$data ['content'] = 'profesor/modificacion_profesor';
		
		$data ['profesor'] = $this->Profesor_modelo->get_profesor( $id );
		
		$this->load->view ( 'home_view', $data );
	}
	
	function modificacion($id) {
		
		if ($this->validar_modificacion()) {
			
			
			$nombre = $this->input->post ( 'nombre_profesorm' );
			$apellido = $this->input->post ( 'apellido_profesorm' );
			$mail = $this->input->post ( 'email_profesorm' );
			$telefono = $this->input->post ( 'tel_profesorm' );
			
			$titulo = $this->input->post ( 'titulo_profesorm' );
			
			$datos_profesor = array(
				'titulo'=>$titulo
			);
			$datos_usuario = array(
				
				'nombre'=>$nombre,
				'apellido'=>$apellido,
				'telefono'=>$telefono,
				'email'=>$mail
					
			);
			$this->Profesor_modelo->update_profesor ( $id,$datos_profesor,$datos_usuario );
			redirect ( base_url ( 'Home/' ) );
		} else {
			
			$this->modificacion_profesor($id);
		}
	}
	function validar() { // valida los datos
		$this->form_validation->set_rules ( 'nombre_profesor', 'Nombre_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'apellido_profesor', 'Apellido_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'dni_profesor', 'Dni_profesor', 'trim|required|callback_check_dni' );
		$this->form_validation->set_rules ( 'email_profesor', 'Email_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'clave_profesor', 'Clave_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'tel_profesor', 'Telefono_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'titulo_profesor', 'Titulo_profesor', 'trim|required' );
		
		return $this->form_validation->run ();
	}
	function check_dni($dni) { // verifica que no exista el nuevo dni
		if ($this->Profesor_modelo->existe_dni ( $dni )) {
			return false;
		} else
			return true;
	}
	function validar_modificacion() { // valida los datos
		$this->form_validation->set_rules ( 'nombre_profesorm', 'Nombre_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'apellido_profesorm', 'Apellido_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'email_profesorm', 'Email_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'tel_profesorm', 'Telefono_profesor', 'trim|required' );
		$this->form_validation->set_rules ( 'titulo_profesorm', 'Titulo_profesor', 'trim|required' );
		
		return $this->form_validation->run ();
	}
	function lista_profesor($operacion) {
		if ($this->session->userdata ( 'logged_in' ) ['login'] && $this->Administrador_modelo->is_administrador ( $this->session->userdata ( 'logged_in' ) ['usertype'] )) {
			$data ['sesion'] = $this->session->userdata ( 'logged_in' );
			$data ['left_menu'] = $this->Administrador_modelo->menu_administrador ();
			$data ['content'] = 'profesor/lista_profesor';
			$data ['profesores'] = $this->Profesor_modelo->get_profesores();
			
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
	function baja($id) {
		$this->Profesor_modelo->delete_profesor ( $id );
		redirect ( base_url ( 'Home/' ) );
	}
}

?>