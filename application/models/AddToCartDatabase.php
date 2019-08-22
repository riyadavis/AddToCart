<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddToCartDatabase extends CI_Model
{

    public function insertProduct()
    {
        $insertProduct = $this->db->query("select * from product")->result_array();
        return $insertProduct;
    }

    public function addCart()
    {
        // $addCart = $this->input->post('pid');
        //assuming session contains user_id in variable 'userid'
        //session variable is set here to check the code
        $this->session->set_userdata('userid',1);
        if($this->session->has_userdata('userid'))
        {
            // $user_id = $this->session->userdata('userid');
            $addCart = array('user_id'=>$this->session->userdata('userid'),
                            'product_id'=>$this->input->post('pid'),
                            'quantity' =>$this->input->post('quantity'),
                            'time_stamp'=>Date('Y-m-d h:i:s'));
            $this->db->insert('cart',$addCart);
            return "success";
        }
        else
        {
            return "error";
        }
        // return $addCart;
    }
}