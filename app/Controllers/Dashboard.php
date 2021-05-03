<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	
        public function summary()
	{
            
            
            $db = \Config\Database::connect();

            $query = $db->query('SELECT count(*) as orders FROM orders');
            $row   = $query->getRow();

            
            $data = array();
            
            array_push($data, array(
                    'orders' => $row->orders
                ));
            
            $query = $db->query('SELECT sum(JSON_EXTRACT(order_json, "$.line_items[0].quantity")) as beneficiaries FROM orders;');
            $row   = $query->getRow();
            
            array_push($data, array(
                    'beneficiaries' => $row->beneficiaries
                ));
            
            //$query = $db->query('SELECT sum(order_json->>"$.total_price") as total FROM orders');
            $query = $db->query('SELECT sum(JSON_EXTRACT(order_json,"$.total_price")) as total FROM orders');
            $row   = $query->getRow();
            
            array_push($data, array(
                    'income' => number_format($row->total,2)
                ));
            
            echo json_encode($data); 
	}
        
        
}
