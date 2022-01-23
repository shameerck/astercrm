<?php

namespace App\Controllers;

class Schedule extends BaseController
{
    
    public function __construct(){
        date_default_timezone_set('Asia/Dubai');
        $session = session();
        
        if($session->get("logged_in")==true && $session->get("location_id")!=null) {
            header("Location:".base_url("/login"));exit;
        }
        
    }
	
        public function savevisit()
	{
            
        helper('form');
        $request = \Config\Services::request();
        
            
           if (! $this->validate([
            'visitid'  => [
            'label'  => 'Visit ID',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} is required'
            ],
                ],
            'visitdate'  => [
            'label'  => 'Visit Date',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} is required'
            ]]
            
        ])){
            $errors = str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $this->validator->listErrors());
            $data = [
                'success' => false,
                'message' => $errors
                    ];

                return $this->response->setJSON($data);
        }
        else
        {
            
            //$data['id']= uniqid();
            $data['visitingdate']= $request->getVar('visitdate');
            if($request->getVar('visitid'))
            {
           return $this->update_schedule($request->getVar('visitid'), $data);
            }
 
        }
        
	}
        
    function update_schedule($visitid, $data) {
        $db = \Config\Database::connect();
        
            $builder = $db->table('visits');
            try
            {
                $builder->where('id', $visitid);
        
            $builder->update($data);
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("settings"),
                'message' => "Visit scheduled successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "Visit scheduling failed.", "data" => $e));
            }
            }
        
    }
    
    public function savestatus()
	{
            
     
        helper('form');
        $request = \Config\Services::request();
       
            
           if (! $this->validate([
            'visitid'  => [
            'label'  => 'Visit ID',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} is required'
            ],
                ],
            'visiteddate'  => [
            'label'  => 'Visit Date',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} is required'
            ]],
            'visitstatus'  => [
            'label'  => 'Visit Status',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} is required'
            ]]
            
        ])){
            $errors = str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $this->validator->listErrors());
            $data = [
                'success' => false,
                'message' => $errors
                    ];

                return $this->response->setJSON($data);
        }
        else
        {
            
            //$data['id']= uniqid();
            $data['visiteddate']= $request->getVar('visiteddate');
            $data['status']= $request->getVar('visitstatus');
            $data['comments']= $request->getVar('visitcomments');
            
            
            if($request->getVar('visitid'))
            {
                
           return $this->update_status($request->getVar('visitid'), $data);
            }
 
        }
            
        
	}
        
    function update_status($visitid, $data) {
        $db = \Config\Database::connect();
        
            $builder = $db->table('visits');
             $builder->where('id', $visitid);
        
                
            $builder->update($data);
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("settings"),
                'message' => "Visit status updated successfully."
                    ];

                return $this->response->setJSON($rslt);
            try
            {
               
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "Visit status updating failed.", "data" => $e));
            }
            }
        
    }
    
        
}
