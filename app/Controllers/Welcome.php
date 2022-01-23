<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    
   
	public function index()
	{
            $session = session();
            if($session->get("logged_in")==true) {
            header("Location:".base_url("/dashboard"));exit;
        }
		return view('welcome_message');
	}
        
        public function login()
	{
             
            
        return view('login');
	}
        
}
