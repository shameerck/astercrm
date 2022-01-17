<?php

namespace App\Controllers;

class Settings extends BaseController
{
	
        public function addunit()
	{
            
        $session = session();
        helper('form');
        $request = \Config\Services::request();
        if ($session->get("logged_in")) {
            
           if (! $this->validate([
            'unitname'  => [
            'label'  => 'Unit Name',
            'rules'  => 'required|min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],
                ],
            'unitinchargename'  => [
            'label'  => 'Unit In Charge Name',
            'rules'  => 'required|min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],
                ],
            'unitinchargeemail'  => [
            'label'  => 'Unit In Charge Email Address',
            'rules'  => 'required|min_length[5]|max_length[255]|valid_email',
             'errors' => [
                'required' => '{field} is required',
                 'min_length' => '{field} is too short.',
            ],
                ],
            'unitinchargemobile'  => [
            'label'  => 'Unit In Charge Mobile Phone Number',
            'rules'  => 'required|min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],],
            'unitinchargewhatsapp'  => [
            'label'  => 'Unit In Charge WhatsApp Number',
            'rules'  => 'min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],],
            'unitmanagername'  => [
            'label'  => 'Unit Manager Name',
            'rules'  => 'required|min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],],
            'unitmanageremail'  => [
            'label'  => 'Unit Manager Email Address',
            'rules'  => 'required|min_length[5]|max_length[255]|valid_email',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],],
            'unitmanagermobile'  => [
            'label'  => 'Unit Manager Mobile Phone Number',
            'rules'  => 'required|min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],],
            'unitmanagerwhatsapp'  => [
            'label'  => 'Unit Manager WhatsApp Number',
            'rules'  => 'min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],]
            
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
            $data['unitname']= $request->getVar('unitname');
            $data['unitinchargename']= $request->getVar('unitinchargename');
            $data['unitinchargeemail']= $request->getVar('unitinchargeemail');
            $data['unitinchargemobile']= $request->getVar('unitinchargemobile');
            $data['unitinchargewhatsapp']= $request->getVar('unitinchargewhatsapp');
            $data['unitmanagername']= $request->getVar('unitmanagername');
            $data['unitmanageremail']= $request->getVar('unitmanageremail');
            $data['unitmanagermobile']= $request->getVar('unitmanagermobile');
            $data['unitmanagerwhatsapp']= $request->getVar('unitmanagerwhatsapp');
            if($request->getVar('unitid'))
            {
           return $this->update_unit($request->getVar('unitid'), $data);
            }
 else {
     return $this->insert_unit($data);
 }
        }
            
        }
        else
        {
            return redirect()->to(base_url('/login'));
        }
	}
        
         function insert_unit($data) {
        $db = \Config\Database::connect();
        

            $builder = $db->table('units');
            try
            {
            $builder->insert($data);
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("settings"),
                'message' => "Unit registered successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "Unit registration failed.", "data" => $e));
            }
            }
        
    }
    function update_unit($unitid, $data) {
        $db = \Config\Database::connect();
        

            $builder = $db->table('units');
            try
            {
                $builder->where('id', $unitid);
        
            $builder->update($data);
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("settings"),
                'message' => "Unit updated successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "Unit updating failed.", "data" => $e));
            }
            }
        
    }
    function deleteunit() {
        
        
$session = session();
if ($session->get("logged_in")) {
    $db = \Config\Database::connect();
        $request = \Config\Services::request();
    
        $unitid=$request->getVar('unitid');
            $builder = $db->table('units');
            try
            {
                $builder->where('id', $unitid);
        
            $builder->delete();
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("settings"),
                'message' => "Unit deleted successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "Unit deletion failed.", "data" => $e));
            }
            }
}
else{
    return redirect()->to(base_url('/login'));
}
    }
    
        
    
    function saveescalation() {
        
$session = session();
if ($session->get("logged_in")) {
    
    
    if (! $this->validate([
            'pmemail'  => [
            'label'  => 'Escalation Email',
            'rules'  => 'required|min_length[5]|max_length[255]|valid_email',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],
                ],
            'pmmobile'  => [
            'label'  => 'Escalation Mobile Phone Number',
            'rules'  => 'required|min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],
                ],
            'pmwhatsapp'  => [
            'label'  => 'Escalation WhatsApp Number',
            'rules'  => 'required|min_length[5]|max_length[255]',
             'errors' => [
                'required' => '{field} is required',
                 'min_length' => '{field} is too short.',
            ],
                ]
            
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
    $db = \Config\Database::connect();
        $request = \Config\Services::request();
            $builder = $db->table('settings');
            try
            {
                $data['pmemail']= $request->getVar('pmemail');
            $data['pmmobile']= $request->getVar('pmmobile');
            $data['pmwhatsapp']= $request->getVar('pmwhatsapp');
                $builder->where('id', 1);
        
            $builder->update($data);
            
            $rslt = [
                'success' => true,
                'message' => "Escalation settings updated successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) 
            {
                return $this->response->setJSON(array("success" => false, "message" => "Escalation settings failed.", "data" => $e));
            }
            }

        
    }}
        
}
