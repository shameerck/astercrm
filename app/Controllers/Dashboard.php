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
        
        public function unitwisesummary()
	{
            
            
            $db = \Config\Database::connect();

          
                       
            
            $query = $db->query('SELECT JSON_EXTRACT(order_json, "$.note_attributes") as attributes FROM orders;');
            $rows   = $query->getResultArray();
//            var_dump($row->attributes);
            
            
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
            
            foreach($rows as $row ) {
                
            $atts = json_decode( $row['attributes'], true );
     foreach($atts as $key ) {
         $value = $key['value'];
         
         
         if( $this->str_contains($value,$unitNameKochi))
         {
             $unitKochi=$unitKochi+1;
         }
         else if( $this->str_contains($value,$unitNameCalicut))
         {
             $unitCalicut=$unitCalicut+1;
         }
         else if( $this->str_contains($value,$unitNameKannur))
         {
             $unitKannur=$unitKannur+1;
         }
         else if( $this->str_contains($value,$unitNameKottakkal))
         {
             $unitKottakkal=$unitKottakkal+1;
         }
         else if( $this->str_contains($value,$unitNameWayanad))
         {
             $unitWayanad=$unitWayanad+1;
         }
            
     
    
 
}
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
          echo json_encode($data); 
	}
        
        function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
    
    public function unitsummary()
	{
            
            
            $db = \Config\Database::connect();
$data = array();
            
            $query = $db->query("SELECT count(*) as beneficiaries FROM beneficiaries where hospital like '". $_SESSION['locationname'] ."';");
            $row   = $query->getRow();
            
            array_push($data, array(
                    'beneficiaries' => $row->beneficiaries
                ));
            
            
            $query = $db->query('SELECT count(*) as visits FROM visits where status=0');
            $row   = $query->getRow();

            
            array_push($data, array(
                    'visits' => $row->visits
                ));
            //$query = $db->query('SELECT sum(order_json->>"$.total_price") as total FROM orders');
            $query = $db->query('SELECT count(*) as visited FROM visits where status=1');
            $row   = $query->getRow();
            
            array_push($data, array(
                    'visited' => $row->visited
                ));
            
            echo json_encode($data); 
	}
        
        public function upcomingvisits()
	{
            
            $db = \Config\Database::connect();
            $data = array();
            
            $request = \Config\Services::request();
            $days=$request->getVar('days');
            $query = $db->query("SELECT * from visits join beneficiaries on beneficiaries.id=visits.beneficiaryid and beneficiaries.hospital like '". $_SESSION['locationname'] ."' where (visits.visitingdate is null and visits.expecteddate<='".Date('Y-m-d', strtotime('+'.$days.' days'))."') or (visits.visitingdate<='".Date('Y-m-d', strtotime('+8 days'))."') ;");
            $visits   = $query->getResultArray();

            $strvisits="";
            if($visits)
            {
                foreach($visits as $visit)
                {
                    
                    $strvisits=$strvisits.'<div class="transactions-list t-info">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-name">
                                                <h4>'.$visit['firstname'].' '.$visit['lastname'].'</h4>
                                                <p class="meta-date">'.$visit['expecteddate'].'</p>
                                            </div>
                                        </div>
                                        <div class="t-rate rate-inc">
                                            <p><span>'.($visit['visitingdate']?"Scheduled":"Expected").'</span></p>
                                        </div>
                                    </div>
                                </div>';
                }
            }
            array_push($data, array(
                    'visitdata' => $strvisits
                ));
            
            
            echo json_encode($data); 
	}
        
        
}
