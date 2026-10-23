
<?php 
$this->load->view("includes/header");
$this->load->view('includes/notificaciones');
menu();
$this->load->view("includes/navbar");
$this->load->view("includes/breadcrumbs");
$this->load->view($content); 
$this->load->view("includes/footer");
?>
				