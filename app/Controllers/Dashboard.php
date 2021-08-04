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
        
        public function unitsummary()
	{
            
            
            $db = \Config\Database::connect();

          
                       
            
            $query = $db->query('SELECT JSON_EXTRACT(order_json, "$.note_attributes") as attributes FROM orders;');
            $row   = $query->getRow();
//            var_dump($row->attributes);
            $atts = json_decode( $row->attributes, true );
            
            $unitKochi=0;
            $unitCalicut=0;
            $unitKannur=0;
            $unitKottakkal=0;
            $unitWayanad=0;
            
            $unitNameKochi="Aster Medcity - Kochi";
            $unitNameCalicut="Aster MIMS - Calicut";
            $unitNameKannur="Aster MIMS - Kannur";
            $unitNameKottakkal="Aster MIMS - Kottakkal";
            $unitNameWayanad="Aster Hospital - Wayanad";
            
            foreach ($atts as $key => $jsons) { // This will search in the 2 jsons
     foreach($jsons as $key => $value) {
         
         if( $this->str_contains($value,$unitNameKochi))
         {
             $unitKochi=$unitKochi+1;
         }
         elseif( $this->str_contains($value,$unitNameCalicut))
         {
             $unitCalicut=$unitCalicut+1;
         }
         elseif( $this->str_contains($value,$unitNameKannur))
         {
             $unitKannur=$unitKannur+1;
         }
         elseif( $this->str_contains($value,$unitNameKottakkal))
         {
             $unitKottakkal=$unitKottakkal+1;
         }
         elseif( $this->str_contains($value,$unitNameWayanad))
         {
             $unitWayanad=$unitWayanad+1;
         }
         
          $data = array();
            
            array_push($data, array(
                    'unitKochi' => $unitKochi
                ));
           
            array_push($data, array(
                    'unitCalicut' => $unitCalicut
                ));
            array_push($data, array(
                    'unitKannur' => $unitKannur
                ));
            array_push($data, array(
                    'unitKottakkal' => $unitKottakkal
                ));
            array_push($data, array(
                    'unitWayanad' => $unitWayanad
                ));
            
     
    }
 
}
          echo json_encode($data); 
	}
        
        function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
        
        
}
