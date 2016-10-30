<?php 

$this->load->view('main');
$this->load->view('header');
$this->load->view('control_sidebar');

$this->load->view('left_menu',$left_menu);

$this->load->view($content);

$this->load->view('footer');

?>
