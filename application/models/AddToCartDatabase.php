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
        // $this->session->set_userdata('userid',1);
        //given source id as 1
        // $iduser = $this->session->userdata('userid');
        $source_id = 1;
        // $iduser = $_GET['q'];
         
        $iduser = 1; 
        $this->db->query("select * from customer where id = '$iduser'")->result_array();
        if($this->db->affected_rows()>0)
        {
            $items = $this->db->query("select items_added from cart_table where customer_id = '$iduser'")->result_array();
            
            //if customer id and shop id already exists
            if($this->db->affected_rows()>0)
            {
                //if the items_added is null
                // if($items[0]['items_added'] == null)
                // {
                    // $insert = array('id'=>$this->input->post('pid'),
                    //             'quantity'=> $this->input->post('quantity'));
                    $insert = json_decode(file_get_contents("php://input"), true);
                    $this->db->where('customer_id',$iduser);
                    $this->db->where('source_id',$source_id);
                    $this->db->set('items_added',json_encode($insert));
                    $this->db->set('time_stamp',Date('Y-m-d h:i:s'));
                    $this->db->update('cart_table');
                    return "item inserted"; 
                // }
                // else
                // {

                    // $countItems = count(preg_split('/,(?![^{]*})/', $items[0]['items_added']));
   
                    // if($countItems > 1)
                    // {
                    
                    //     $insert = json_decode($items[0]['items_added'],true);
                    //     $pid = $this->input->post('pid');
                        
                    //     $insertItem = array('id'=>$this->input->post('pid'),
                    //             'quantity'=> $this->input->post('quantity'));
                    //     array_push($insert,$insertItem);
                    //     $this->db->where('customer_id',$iduser);
                    //     // $this->db->where('source_id',$source_id);
                    //     $this->db->set('items_added',json_encode($insert));
                    //     $this->db->set('time_stamp',Date('Y-m-d h:i:s'));
                    //     $this->db->update('cart_table');
                    //     return "cart more than 1 item updated";
                    // }
                    // else
                    // {
                        
                    //     $insert[] = array('id'=>$this->input->post('pid'),
                    //                     'quantity'=> $this->input->post('quantity'));
                    //     $insert[] = json_decode($items[0]['items_added'],true);
                    //     $this->db->where('customer_id',$iduser);
                    //     $this->db->where('source_id',$source_id);
                    //     $this->db->set('items_added',json_encode($insert));
                    //     $this->db->set('time_stamp',Date('Y-m-d h:i:s'));
                    //     $this->db->update('cart_table');
                    //     return "cart updated";
                    // }
                    
                }               
                
                
                else
                {
                    // $array = array('id'=>$this->input->post('pid'),
                    //                 'quantity'=>$this->input->post('quantity'));
                    // $jsonArray = json_encode($array);
                    $jsonArray = json_decode(file_get_contents("php://input"), true);
                    $addCart = array('customer_id'=>$this->session->userdata('userid'),
                                    'items_added'=>json_encode($jsonArray),
                                    'source_id'=>$source_id,
                                    'time_stamp'=>Date('Y-m-d h:i:s'));
                    $this->db->insert('cart_table',$addCart);

                    return "success";
                }
            
            
            
            // return $jsonArray;
        }
        else
        {
            return "no user";
        }
        // return $addCart;
    }


    public function c()
    {
        $iduser = 1;
        $source_id = 1;
        // $insert[] = array('id'=>1,'quantity'=> 3);
        $insert2 = array('id'=>1,'quantity'=> 3);
        // $insert['id'] = 1;
        // $insert['quantity']=2;
        // $jsonArray = json_encode($insert);
        $cartItems = $this->db->query("select items_added from cart_table where customer_id = '$iduser' AND source_id = '$source_id' ")->result_array();
        $insert = json_decode($cartItems[0]['items_added'],true);
        // array_push($insert,$insert2);
        // $cartCount = count((array)$insert);
    //    for($i = 0 ;$i<$cartCount;$i++)
    //    {

    //    }
    //     // $addItems = array_push($decodeCart,$insert);
    $countItems = count(preg_split('/,(?![^{]*})/', $cartItems[0]['items_added']));
   
        // return $countItems;
        $insert = substr($insert, 1, strlen($insert) - 2);
        return $insert;
    
    for($i = 0; $i < $countItems; $i++)
    {
        $itemId[] = $insert[$i]['id'];
        $itemQuantity[] = $insert[$i]['quantity']; 
    }
    return $itemId;
    for ($i=0; $i < $cartCount; $i++)
    {
        if($itemId[$i] == $pid)
        {
            $itemQuantity[$i] = $itemQuantity++;
            $flag = 1;
            return 2;
        }
    }

    if($flag == 1)
    {
        for($i = 0; $i < $cartCount; $i++)
        {
            $xInsert[] = $itemId[$i];
            // $xInsert[]
        }
    }



       return $insert;
        // return $cartCount;
        // return var_dump($insert);
        // return var_dump($cartItems);
        for($i = 0; $i < $cartCount; $i++)
        {
            $itemId[] = $insert[$i]['id'];
            $itemQuantity[] = $insert[$i]['quantity']; 
            // $itemId[] = 1;
        }
        // return $itemQuantity;
        return $itemId;
        // return count((array)$cartItems[0]);
        // return var_dump(json_decode($cartItems[0]['items_added']));
        return $decodeCart;
        return var_dump($decodeCart);
        // return var_dump(json_decode($cartItems[0]['items_added']));
        // $a = json_decode($cartItems[0]['items_added'],true);
        array_push($cartItems[0],$jsonArray);
        // $a = json_decode(json_encode($cartItems[0]),true);
        // $a->items_added[] = $insert;
        // $b = json_decode($a,true);
        // array_push($cartItems[0],$jsonArray);
        // return var_dump($cartItems[0]['items_added']);
        // return var_dump(json_encode($cartItems));
        
        // return var_dump($a);
        return $cartItems;
        return var_dump($cartItems);
        return var_dump($b);
        $insert = array('id'=>$this->input->post('pid'),
                                'quantity'=> $this->input->post('quantity'));
                $jsonArray = json_encode($insert);
                array_push($items[0],$jsonArray);
                // $json = $items->items_added.','.$jsonArray;
                // // $j = json_encode(array_push($items,$insert));
                // // $j = json_encode(array_push($items,$insert));
                // $update = array('items_added'=>json_encode(array_push($items,$insert)));
                // // $b = array_push($data,$Array);
                $this->db->set('items_added',json_encode($items));
                $this->db->set('time_stamp',Date('Y-m-d h:i:s'));
                $this->db->update('cart_table');
                // $this->db->query("update cart_table set items_added = items_added'.$jsonArray'");
                return "success";
                // return $items;
                // return $j;

                $pid = $this->input->post('pid');
                $flag = 0;
                $insertArr = (array)json_decode($items[0]['items_added']);
                $cartCount = sizeof((array)$insertArr,1);
                // $decodeId = json_encode($insertArr);
                // $encodeId = json_decode($decodeId)->id;
                $cartCount = count((array)$items[0]);
                // return $encodeId;
                // //count of cart is posing some problem...
                // for($i = 0; $i < $cartCount; $i++)
                // {
                //     $itemId[] = json_decode($items[0]['items_added'])->id;
                //     $itemQuantity[] = json_decode($items[0]['items_added'])->quantity; 
                // }
                // return array_unique($itemQuantity);

                // for ($i=0; $i < $cartCount; $i++)
                // {
                    // if($itemId[$i] == $pid)
                    // {
                    //     $itemQuantity[$i] = $itemQuantity[$i] + 1;
                    //     $flag = 1;
                    // }
                // }
                // return array_unique($itemQuantity);

                // if($flag == 1)
                // {
                //     for($i = 0; $i < $cartCount; $i++)
                //     {
                //         $xInsert[] = $itemId[$i];
                //         $xInsert[] = $itemQuantity[$id];
                //     }
                //     $this->db->where('customer_id',$iduser);
                //     $this->db->where('source_id',$source_id);
                //     $this->db->set('items_added',json_encode($xinsert));
                //     $this->db->set('time_stamp',Date('Y-m-d h:i:s'));
                //     $this->db->update('cart_table');
                //     return "quantity updated";
                // }



    } 
}