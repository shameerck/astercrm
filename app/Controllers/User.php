<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController {

    public function login_validate() {

        helper(['form', 'url']);

        $request = \Config\Services::request();

        if (!$this->validate([
                    'username' => [
                        'label' => 'User Name',
                        'rules' => 'required|min_length[5]|max_length[255]'],
                    'password' => [
                        'label' => 'Password',
                        'rules' => 'required|min_length[6]|max_length[255]']
                ])) {
            echo $this->validator->listErrors();
        } else {
            $usermodel = new UserModel();

            $data["email"] = $request->getVar('username');
            $user = $usermodel->find($data["email"]);
            if ($user) {
                if ($user['password'] == $request->getVar('password')) {

                    $newdata = [
                        'email' => $user['email'],
                        'locationid' => $user['location_id'],
                        'logged_in' => TRUE
                    ];

                    if ($user['location_id'] == null) {
                        $newdata['role'] = 'Admin';
                        $newdata['usermenu']='<ul class="list-unstyled menu-categories" id="topAccordion">
                                <li class="menu single-menu">
                                    <a href="'. base_url('/dashboard'). '" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                            <span>Dashboard</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                </li>
                                <li class="menu single-menu">
                                    <a href="#dashboard" data-toggle="collapse" class="dropdown-toggle autodroprown">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            <span>Beneficiaries</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                    <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                                        <li>
                                            <a href="'. base_url('/orders') .'"> Orders </a>
                                        </li>
                                        <li>
                                            <a href="'. base_url('/beneficiaries') .'"> Beneficiaries </a>
                                        </li>
                                        <li>
                                            <a href="' . base_url('/customers') .'"> Customers </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu single-menu">
                                    <a href="'. base_url('/visits') .'" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                            <span>Visits</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                </li>
                                <li class="menu single-menu">
                                    <a href="'. base_url('/notifications') .'" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>

                                            <span>Notifications</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                </li>
                                <li class="menu single-menu">
                                    <a href="#settingsmenu" data-toggle="collapse" class="dropdown-toggle autodroprown">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            <span>Settings</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                    <ul class="collapse submenu list-unstyled" id="settingsmenu" data-parent="#topAccordion">
                                        <li>
                                            <a href="'. base_url('/settings/units') .'"> Units </a>
                                        </li>
                                        <li>
                                            <a href="'. base_url('/settings/reminder') .'"> Reminder </a>
                                        </li>
                                        <li>
                                            <a href="'. base_url('/settings/users') .'"> Users </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>';
                    } else {
                        $newdata['role'] = 'Unit in Charge';
                        
                        $newdata['usermenu']='<ul class="list-unstyled menu-categories" id="topAccordion">
                                <li class="menu single-menu">
                                    <a href="'. base_url('/dashboard'). '" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                            <span>Dashboard</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                </li>
                                <li class="menu single-menu">
                                    <a href="'. base_url('/beneficiaries') .'" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                            <span>Beneficiaries</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                </li>
                                <li class="menu single-menu">
                                    <a href="'. base_url('/visits') .'" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                            <span>Visits</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                </li>
                            </ul>';

                        $db = \Config\Database::connect();

                        $query = $db->query('SELECT unitname from units where id = ' . $user['location_id']);
                        $rows = $query->getResultArray();
                        if ($rows) {
                            $newdata['locationname'] = $rows[0]['unitname'];
                        }
                    }

                    $session = session();
                    $session->set($newdata);
                    if ($user['location_id'] == null) {
                        //PARTNER
                        echo "admin";
                    } else {
                        //ADMIN
                        return "manager";
                    }
                } else {
                    //$logmodel->addlog($request->getVar('email'),$request->getVar('password'), 'Password wrong!');
                    echo json_encode("Password does not match!");
                }
            } else {
                //$logmodel->addlog($request->getVar('email'),$request->getVar('password'), 'User not found!');
                echo json_encode("User not found!");
            }
        }
    }

    public function logout() {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    public function sendmessage() {
        $request = \Config\Services::request();

        $message = "<div>";
        $message .= "From: " . $request->getVar('messageuser');
        $message .= "<br>Email: " . $request->getVar('messageemail');
        $message .= "<br>Phone: " . $request->getVar('messagephone');
        $message .= "<br><br>Message: " . $request->getVar('messagemsg');
        $message .= "</div>";

        $this->sendmail($message, "Saleculator: Partner Message!", "support@saleculator.com");

        echo json_encode("Your message has been sent successfully. It has been forwarded to the relevant department and will be dealt with as soon as possible.");
    }

    function sendmail($message, $subject, $tomail) {


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
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
    }

}
