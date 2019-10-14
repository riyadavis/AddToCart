<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AddToCartApi extends CI_Controller {

	// private $hashData = null;

	public function __construct()
	{
		parent :: __construct();
		$this->load->model('AddToCartDatabase');
		// $this->hashData = $this->AddToCartDatabase->SaltData();
		// $this->session->unset_userdata('userauth');
		if($this->session->has_userdata('userauth') == FALSE)
        {
			$this->AddToCartDatabase->SaltData();
			if($this->session->has_userdata('userauth') == FALSE)
			{
				echo json_encode("error");
				die();
			}
		}
		
	}
	public function index()
	{
		redirect('AddToCartApi/AddToCart');	
	}

	public function AddToCart()
	{
			$this->load->view('AddToCart');
	}

	public function insertProduct()
	{
			$data = $this->AddToCartDatabase->insertProduct();
			echo json_encode($data);
	}

	public function addCart()
	{
			$data = $this->AddToCartDatabase->addCart();
			echo json_encode($data);
			// echo $data;
	}

	public function c()
	{
		
			$data = $this->AddToCartDatabase->c();
			echo json_encode($data);
			// echo "hello";
			// echo json_encode($this->session->userdata('userauth'));
		
		// echo $data;
		// print_r($data);
		// echo $this->hashData;
	}
	
}
