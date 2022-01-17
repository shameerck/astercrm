<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
        
        public function dashboard()
	{
            
            if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                return view('dashboard',$data);
        } else {
            return redirect()->to(base_url('login'));
        }
	}
        
        public function orders()
	{
            
             if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                return view('orders',$data);
        } else {
            return redirect()->to(base_url('login'));
        }
		
	}
        
        public function notifications()
	{
            
             if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                return view('notifications',$data);
        } else {
            return redirect()->to(base_url('login'));
        }
		
	}
        
        public function visits()
	{
            
             if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                return view('visits',$data);
        } else {
            return redirect()->to(base_url('login'));
        }
		
	}
        
        public function settings()
	{
            
             if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                 $db = \Config\Database::connect();
        
$query = $db->query('SELECT * FROM settings');
                    $setting = $query->getRow();
                    
                    if($setting)
                    {
                    $data['pmemail']=$setting->pmemail;
                    $data['pmmobile']=$setting->pmmobile;
                    $data['pmwhatsapp']=$setting->pmwhatsapp;
                    }
                    else
                    {
                        $data['pmemail']="";
                    $data['pmmobile']="";
                    $data['pmwhatsapp']="";
                    }
                return view('settings',$data);
        } else {
            return redirect()->to(base_url('login'));
        }
		
	}
        
        public function customers()
	{
		 if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                return view('customers',$data);
        } else {
            return redirect()->to(base_url('login'));
        }
		
	}
        
        public function beneficiaries()
	{
             if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                return view('beneficiaries',$data);
        } else {
            return redirect()->to(base_url('login'));
        }
		
             
	}
        
         public function login()
	{
             
            
        return view('login');
	}
        
        
         public function schedule($visitid)
	{
             
             if ($this->session->get("logged_in")) {
                 
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
                    $data['visitingdate']="2022-12-12T18:22"; //Date('Y-m-d');
                }
                else
                {
                $data['visitingdate']= str_replace(" ", "T", $ben->visitingdate);
                }
                return view('schedule',$data);
                    }
                    else
                    {
                        echo "Record not found!";
                    }
        } else {
            return redirect()->to(base_url('login'));
        }
	}
        
        public function visitstatus($visitid)
	{
             
             if ($this->session->get("logged_in")) {
                 
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
                    $data['visitingdate']="2022-12-12T18:22"; //Date('Y-m-d');
                }
                else
                {
                $data['visitingdate']= str_replace(" ", "T", $ben->visitingdate);
                }
                return view('visitstatus',$data);
                    }
                    else
                    {
                        echo "Record not found!";
                    }
        } else {
            return redirect()->to(base_url('login'));
        }
	}
        
        
}
