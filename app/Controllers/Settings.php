<?php

namespace App\Controllers;

class Settings extends BaseController
{
    
    public function __construct(){
        date_default_timezone_set('Asia/Dubai');
        $session = session();
        
        if($session->get("logged_in")==true && $session->get("location_id")!=null) {
            header("Location:".base_url("/login"));exit;
        }
        
    }
    
    
    
     public function settings()
	{
            
            
               
                
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
        
		
	}
        
         public function units()
	{
           
                
                return view('settings_units');
        
		
	}
        
        public function reminder()
	{
            
                         
                $db = \Config\Database::connect();
        
$query = $db->query('SELECT * FROM settings');
                    $setting = $query->getRow();
                    
                    if($setting)
                    {
                    $data['pmemail']=$setting->pmemail;
                    $data['pmmobile']=$setting->pmmobile;
                    $data['pmwhatsapp']=$setting->pmwhatsapp;
                    
                    $data['chkEmail']=($setting->enableemail?"checked":"");
                    $data['chkSMS']=($setting->enablesms?"checked":"");
                    $data['chkWhatsapp']=($setting->enablewhatsapp?"checked":"");
                    }
                    else
                    {
                        $data['pmemail']="";
                    $data['pmmobile']="";
                    $data['pmwhatsapp']="";
                    }
                
                return view('settings_reminder',$data);
        
		
	}
        
         public function users()
	{
            
                
                $db = \Config\Database::connect();
                $query = $db->query("SELECT id, unitname from units");
        $unitslist = $query->getResultArray();
        $units="";
        if($unitslist) {
            $units = '<option value="">Select unit</option>';
            foreach($unitslist as $stat)
            {
             $units = $units.'<option value="'.$stat['id'].'">'.$stat['unitname'].'</option>';
            }
        }
        
        $data['units'] = $units;
                
                return view('settings_users',$data);
       
		
	}
	
        public function addunit()
	{
            
        
        helper('form');
        $request = \Config\Services::request();
        
            
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
        
         function insert_unit($data) {
        $db = \Config\Database::connect();
        

            $builder = $db->table('units');
            try
            {
            $builder->insert($data);
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("/settings/units"),
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
                'redirecturl' => base_url("/settings/units"),
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
                'redirecturl' => base_url("/settings/units"),
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
    
    
    
    
    public function adduser()
	{
            
        
        helper('form');
        $request = \Config\Services::request();
        
            
           if (! $this->validate([
            'unitid'  => [
            'label'  => 'Unit',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} is required'
            ],
                ],
            'username'  => [
            'label'  => 'Username',
            'rules'  => 'required|min_length[5]|max_length[255]',
            'errors' => [
                'required' => '{field} is required',
                'min_length' => '{field} is too short.',
            ],
                ],
            'userpassword'  => [
            'label'  => 'Password',
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
            
            //$data['id']= uniqid();
            $data['location_id']= $request->getVar('unitid');
            $data['email']= $request->getVar('username');
            $data['password']= $request->getVar('userpassword');
            if($request->getVar('userid'))
            {
           return $this->update_user($request->getVar('userid'), $data);
            }
 else {
     return $this->insert_user($data);
 }
        }
        
	}
        
         function insert_user($data) {
        $db = \Config\Database::connect();
        

            $builder = $db->table('users');
            try
            {
            $builder->insert($data);
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("/settings/users"),
                'message' => "User created successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "User creation failed.", "data" => $e));
            }
            }
        
    }
    function update_user($userid, $data) {
        $db = \Config\Database::connect();
        

            $builder = $db->table('users');
            try
            {
                $builder->where('id', $userid);
        
            $builder->update($data);
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("/settings/users"),
                'message' => "Unit updated successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "User updating failed.", "data" => $e));
            }
            }
        
    }
    function deleteuser() {
        
        
    $db = \Config\Database::connect();
        $request = \Config\Services::request();
    
        $unitid=$request->getVar('userid');
            $builder = $db->table('users');
            try
            {
                $builder->where('id', $unitid);
        
            $builder->delete();
            
            $rslt = [
                'success' => true,
                'redirecturl' => base_url("/settings/users"),
                'message' => "User deleted successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) {
            {
                return $this->response->setJSON(array("success" => false, "message" => "User deletion failed.", "data" => $e));
            }
            }
    }
        
    
    function saveescalation() {
        
    
    
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

        
    }
    
    function enablenotifications() {
        
    $db = \Config\Database::connect();
        $request = \Config\Services::request();
            $builder = $db->table('settings');
            try
            {
                $data['enableemail']= $request->getVar('pmemail');
            $data['enablesms']= $request->getVar('pmmobile');
            $data['enablewhatsapp']= $request->getVar('pmwhatsapp');
                $builder->where('id', 1);
        
            $builder->update($data);
            
            $rslt = [
                'success' => true,
                'message' => "Notifications settings updated successfully."
                    ];

                return $this->response->setJSON($rslt);
            }
            catch (\Exception $e) 
            {
                return $this->response->setJSON(array("success" => false, "message" => "Notification settings failed.", "data" => $e));
            }
            

        
    }
        
}
