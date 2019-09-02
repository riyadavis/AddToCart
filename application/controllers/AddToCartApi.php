<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddToCartApi extends CI_Controller {

	public function __construct()
	{
		parent :: __construct();
		$this->load->model('AddToCartDatabase');
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
	}
	
}
