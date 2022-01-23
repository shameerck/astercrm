<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    
   
	public function index()
	{
		return view('welcome_message');
	}
        
        public function login()
	{
             
            
        return view('login');
	}
        
}
