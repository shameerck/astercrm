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
            
            
            array_push($data, array(
                    'beneficiaries' => 1
                ));
            
            $query = $db->query('SELECT sum(order_json->>"$.total_price") as total FROM orders');
            $row   = $query->getRow();
            
            array_push($data, array(
                    'income' => number_format($row->total,2)
                ));
            
            echo json_encode($data); 
	}
        
        
}
