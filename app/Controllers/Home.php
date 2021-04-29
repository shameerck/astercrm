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
		return view('dashboard');
	}
        
        public function orders()
	{
		return view('orders');
	}
        
        public function customers()
	{
		return view('customers');
	}
}
