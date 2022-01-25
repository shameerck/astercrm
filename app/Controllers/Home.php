<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function __construct(){
        date_default_timezone_set('Asia/Dubai');
        $session = session();
        

        
        if($session->get("logged_in")==null || $session->get("logged_in")==false) {
            header("Location:".base_url("/login"));exit;
        }
        
    }
	public function index()
	{
		return view('welcome_message');
	}
        
        public function dashboard()
	{
            
                if($this->session->get("role")=="Admin")
                {
                return view('dashboard');
                }
                else
                {
                    return view('dashboardunit');
                }
       
	}
        
        public function orders()
	{
                return view('orders');
        
		
	}
        
        public function notifications()
	{
            
            return view('notifications');
       
		
	}
        
        public function visits()
	{
            
                return view('visits');
        
		
	}
        
       
        
        public function customers()
	{
		 
                return view('customers');
      
		
	}
        
        public function beneficiaries()
	{
                return view('beneficiaries');
        	
             
	}
        
         
        
        
         public function schedule($visitid)
	{
             
                 
                 $db = \Config\Database::connect();
        
$query = $db->query('SELECT beneficiaries.*, visits.id as visitid, visits.visittitle, visits.expecteddate, visits.visitingdate FROM visits join beneficiaries on beneficiaries.id=visits.beneficiaryid where visits.id like "' . $visitid . '"');
                    $ben = $query->getRow();
//            var_dump($ben);exit;
                    if($ben)
                    {
             $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                $data['fullname']="<strong>".$ben->firstname." ".$ben->lastname."</strong><br>".$ben->address;
                $data['phone']=$ben->phone;
                $data['visittitle']=$ben->visittitle;
                $data['visitid']=$ben->visitid;
                $data['expecteddate']=$ben->expecteddate;
                if($ben->visitingdate==null)
                {
                    $data['visitingdate']=""; //Date('Y-m-d');
                }
                else
                {
                    
                    $theDate    = new \DateTime($ben->visitingdate);
                    
                $data['visitingdate']=$theDate->format('Y-m-d\TH:i');
                }
                return view('schedule',$data);
                    }
                    else
                    {
                        echo "Record not found!";
                    }
       
	}
        
        public function visitstatus($visitid)
	{
                 
                 $db = \Config\Database::connect();
        
$query = $db->query('SELECT beneficiaries.*, visits.id as visitid, visits.visittitle, visits.expecteddate, visits.visitingdate, visits.visiteddate, visits.status FROM visits join beneficiaries on beneficiaries.id=visits.beneficiaryid where visits.id like "' . $visitid . '"');
                    $ben = $query->getRow();
//            var_dump($ben);exit;
                    if($ben)
                    {
             $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                $data['fullname']="<strong>".$ben->firstname." ".$ben->lastname."</strong><br>".$ben->address;
                $data['phone']=$ben->phone;
                $data['visittitle']=$ben->visittitle;
                $data['visitid']=$ben->visitid;
                $expdate = strtotime($ben->expecteddate);

                $data['expecteddate']=date('Y-m-d g:i A',$expdate);
                if($ben->visitingdate==null)
                {
                    $data['visitingdate']="Not Scheduled"; //Date('Y-m-d');
                }
                else
                {
                    $visitdate = strtotime($ben->visitingdate);
                    $new_time= date('Y-m-d g:i A',$visitdate);
                $data['visitingdate']= $new_time;
                }
                
                if($ben->visiteddate==null)
                {
                    $data['visiteddate']=""; //Date('Y-m-d');
                }
                else
                {
                    $theDate    = new \DateTime($ben->visiteddate);
                    
                $data['visiteddate']=$theDate->format('Y-m-d\TH:i');
                }
                $data['visitedstatus']=$ben->status;
                
                return view('visitstatus',$data);
                    }
                    else
                    {
                        echo "Record not found!";
                    }
       
	}
        
        
}
