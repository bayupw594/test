<?php if(!defined('BASEPATH')) exit ('No Direct Script Allowed');
	class Pdfexample extends CI_Controller {
		function __construct(){
			parent::__construct();
		}

		function index() {
			$this->load->library('Pdf');
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			
		}
	}
?>