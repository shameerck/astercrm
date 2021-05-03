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
            return view('login');
        }
	}
        
        public function orders()
	{
            
             if ($this->session->get("logged_in")) {
            
                $data['email']=$this->session->get("email");
                $data['location']=$this->session->get("location_id");
                
                return view('orders',$data);
        } else {
            return view('login');
        }
		
	}
        
        public function customers()
	{
		return view('customers');
	}
        
         public function login()
	{
             if ($this->session->get("logged_in")) {
            
            return redirect()->to(base_url('dashboard'));
        } else {
            return view('login');
        }
	}
}
