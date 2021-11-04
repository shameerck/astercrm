<?php namespace App\Controllers;


use App\Models\UserModel;

class User extends BaseController
{
	public function login_validate()
	{
            
            helper(['form', 'url']);
         
            $request = \Config\Services::request();
            

        if (! $this->validate([
            'username'  => [
            'label'  => 'User Name',
            'rules'  => 'required|min_length[5]|max_length[255]|valid_email'],
            'password'  => [
            'label'  => 'Password',
            'rules'  => 'required|min_length[6]|max_length[255]']
            
        ]))
        {
            echo $this->validator->listErrors();
        }
        else
        {
            $usermodel = new UserModel();

            $data["email"]=$request->getVar('username');
            $user = $usermodel->find($data["email"]);
            if ($user)
                {
                if( $user['password']==$request->getVar('password'))
                {
                    
                     $newdata = [
                    'email'     => $user['email'],

                         'location_id'     => $user['location_id'],

                    'logged_in' => TRUE
                    ];
                    
                    $session = session();
                    $session->set($newdata);
                    if($user['location_id']==null)
                    {
                        //PARTNER
                        echo "admin";
                        
                    }
                    else
                    {
                        //ADMIN
                        return "manager";
                    }
                    
                }
                else
            {
                    //$logmodel->addlog($request->getVar('email'),$request->getVar('password'), 'Password wrong!');
              echo json_encode(" Password does not match!");
            }
                }
            else
            {
                $logmodel->addlog($request->getVar('email'),$request->getVar('password'), 'User not found!');
              echo json_encode(" User not found!");
            }
            

        }
		
	}
    
        public function logout()
	{
            $session = \Config\Services::session();
            $session->destroy();
            return redirect()->to(base_url());
            
        }
       
       
        public function sendmessage()
	{
            $request = \Config\Services::request();
            
            $message="<div>";
            $message.="From: ".$request->getVar('messageuser');
            $message.="<br>Email: ".$request->getVar('messageemail');
            $message.="<br>Phone: ".$request->getVar('messagephone');
            $message.="<br><br>Message: ".$request->getVar('messagemsg');
            $message.="</div>";
            
            $this->sendmail($message,"Saleculator: Partner Message!", "support@saleculator.com");
            
            echo json_encode("Your message has been sent successfully. It has been forwarded to the relevant department and will be dealt with as soon as possible.");
            
        }
        
        
        
        function sendmail($message, $subject, $tomail)
{

    
                        $url = 'https://api.goalrain.com/grmail/sendmail';
                        $fields = array(
                            'server' => 'smtp.gmail.com',
                            'from' => 'Saleculator',
                            'port' => 587,
                            'user' => 'sales@saleculator.com',
                            'password' => 'Sales@2014',
                            'auth' => '1',
                            'tls' => '1',
                            'tomail' => trim($tomail),
                            'subject' => $subject,
                            'message' => $message
                        );
                        
                        
                        $fields_string = '';
                        //url-ify the data for the POST 
                        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
                        rtrim($fields_string, '&');
                        //open connection
                        $ch = curl_init();
                        //set the url, number of POST vars, POST data
                        curl_setopt($ch,CURLOPT_URL, $url);
                        curl_setopt($ch,CURLOPT_POST, count($fields));
                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        //execute post
                        $result = curl_exec($ch);
                        //close connection
                        curl_close($ch);
    
}
        
        
       

}
