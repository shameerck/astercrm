<?php

namespace App\Controllers;

use App\Models\NotificationsModel;

class Shopify extends BaseController {

    function verify_webhook($data, $hmac_header) {
        $calculated_hmac = base64_encode(hash_hmac('sha256', $data, getenv('SHOPIFY_APP_SECRET'), true));
        //echo $calculated_hmac;
        return hash_equals($hmac_header, $calculated_hmac);
    }

    public function customercreated() {
        $request = \Config\Services::request();

        //Read JSON Data
        $shopify_json = $request->getJSON();

        //log_message('error', $shopify_json);


        $hmac_header = $request->getHeaderLine('X-Shopify-Hmac-Sha256');

        /*
         * ob_flush();
          ob_start();
          var_dump($request);
          file_put_contents("dump.txt", ob_get_flush());
          exit;
         * 
         */

        if ($hmac_header != null) {
            $data = file_get_contents('php://input');

            $verified = $this->verify_webhook($data, $hmac_header);

            if ($verified) {
                $db = \Config\Database::connect();

                $data = [
                    'customer_id' => $request->getJsonVar('id'),
                    'customer_json' => json_encode($shopify_json)
                ];

                $db->table('customers')->insert($data);
            }
        } else {
            log_message('error', 'Auth failed.');
        }
        exit;
    }

    public function ordercreated() {
        
//        $data = file_get_contents('php://input');
//        echo base64_encode(hash_hmac('sha256', $data, getenv('SHOPIFY_APP_SECRET'), true));exit;

        $request = \Config\Services::request();

        //Read JSON Data
        $shopify_json = $request->getJSON();

        //log_message('error', $shopify_json);

        $hmac_header = $request->getHeaderLine('X-Shopify-Hmac-Sha256');

        /*
         * ob_flush();
          ob_start();
          var_dump($request);
          file_put_contents("dump.txt", ob_get_flush());
          exit;
         * 
         */

        if ($hmac_header != null) {

            $data = file_get_contents('php://input');
            $verified = $this->verify_webhook($data, $hmac_header);

            if ($verified) {

                $db = \Config\Database::connect();

                $data = [
                    'order_id' => $request->getJsonVar('order_number'),
                    'order_json' => json_encode($shopify_json)
                ];

                $db->table('orders')->insert($data);

                //Insert beneficiaries
                

                $atts = $shopify_json->note_attributes;

                $ben_count = $shopify_json->line_items[0]->quantity;
                $benarray = array();
                for ($i = 1; $i <= $ben_count; $i++) {
                    $benarray[$i]['id'] = uniqid();
                    $benarray[$i]['orderid'] = $shopify_json->order_number;;
                }


//Iterate beneficiaries
                for ($i = 1; $i <= $ben_count; $i++) {
                    foreach ($atts as $attvalue) {

                        if ($this->endsWith($attvalue->name, '-' . $i . '-hospital')) {
                            $benarray[$i]['hospital'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-firstname')) {
                            $benarray[$i]['firstname'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-lastname')) {
                            $benarray[$i]['lastname'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-gender')) {
                            $benarray[$i]['gender'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-age')) {
                            $benarray[$i]['age'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-email')) {
                            $benarray[$i]['email'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-phone')) {
                            $benarray[$i]['phone'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-address')) {
                            $benarray[$i]['address'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-district')) {
                            $benarray[$i]['district'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-pin')) {
                            $benarray[$i]['pin'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-landmark')) {
                            $benarray[$i]['landmark'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-emergency')) {
                            $benarray[$i]['emergency'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-hospital')) {
                            $benarray[$i]['hospital'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-medicalhistory')) {
                            $benarray[$i]['medicalhistory'] = $attvalue->value;
                        }
                    }
                }


                $mailarray = array();
                $mailcount = 0;
                foreach ($benarray as $ben) {


                    $db->table('beneficiaries')->insert($ben);

                    $visitid = uniqid();
                    
                    $visitdate = strtotime($shopify_json->closed_at);
                    $new_time= date('Y-m-d H:i:s',$visitdate);

                    $dataVisit1 = [
                        'id' => $visitid,
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "1st Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+1 days')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit1);

                    $dataVisit2 = [
                        'id' => uniqid(),
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "2nd Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+3 months')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit2);

                    $dataVisit3 = [
                        'id' => uniqid(),
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "3rd Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+6 months')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit3);

                    $dataVisit4 = [
                        'id' => uniqid(),
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "4th Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+9 months')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit4);

                    if($ben!=null && isset($ben['hospital']))
                    {
                    $mailarray[$mailcount]['orderid'] = $request->getJsonVar('order_number');
                    $mailarray[$mailcount]['beneficiaryid'] = $ben['id'];
                    $mailarray[$mailcount]['visitid'] = $visitid;
                    $mailarray[$mailcount]['hospital'] = $ben['hospital'];
                    $mailarray[$mailcount]['firstname'] = ($ben['firstname']?$ben['firstname']:"");
                    $mailarray[$mailcount]['lastname'] = ($ben['lastname']?$ben['lastname']:"");
                    $mailcount++;
                    }
                }

//Send Email

                $settingsquery = $db->query('SELECT * FROM settings ');
                $notificationsettings = $settingsquery->getRow();

                foreach ($mailarray as $benmail) {

                    $query = $db->query('SELECT * FROM units where unitname like "' . $benmail['hospital'] . '"');
                    $units = $query->getRow();
                    if ($units) {

                        if ($notificationsettings && $notificationsettings->enableemail == '1') {
                            //Send Email
                            if ($units->unitinchargeemail != "") {
                                $mail_data['visiturl'] = base_url("/schedule/" . $benmail['visitid']);
                                $message = view('reminder_email_1', $mail_data);

                                try {
                                    $this->sendmail($benmail['orderid'], $benmail['beneficiaryid'], $message, "New Dilse Order#" . $request->getJsonVar('order_number') . ", Beneficiary " . $benmail["firstname"] . " " . $benmail["lastname"], $units->unitinchargeemail);
                                } catch (\Exception $e) { {
                                        return $this->response->setJSON(array("success" => false, "message" => "Sending Email failed.", "data" => $e));
                                    }
                                }
                            }
                        }

                        if ($notificationsettings && $notificationsettings->enablesms == '1') {
                            //Send SMS
                            if ($units->unitinchargemobile != "") {


                                try {
                                    $this->sendsms($benmail['orderid'], $benmail['beneficiaryid'], "New Order " . $request->getJsonVar('order_number') . ", Beneficiary " . $benmail["firstname"] . " " . $benmail["lastname"], $units->unitinchargemobile);
                                } catch (\Exception $e) {
                                    return $this->response->setJSON(array("success" => false, "message" => "Sending SMS message failed.", "data" => $e));
                                }
                            }
                        }
                        if ($notificationsettings && $notificationsettings->enablewhatsapp == '1') {
                            //Send WhatApp
                            if ($units->unitinchargewhatsapp != "") {

                                try {
                                    $this->sendwhatsapp($benmail['orderid'], $benmail['beneficiaryid'], "You have a new order.\nYou can find the order information below.\nhttps://asterdisle.com/visit/" . $request->getJsonVar('order_number'), $units->unitinchargewhatsapp);
                                } catch (\Exception $e) {
                                    return $this->response->setJSON(array("success" => false, "message" => "Sending WhatsApp message failed.", "data" => $e));
                                }
                            }
                        }
                    }
                }
            } else {
                echo "Not verified";
            }
        } else {
            log_message('error', 'Auth failed.');
        }
        exit;
    }
    
    
    public function naseeraordercreated() {
        
//        $data = file_get_contents('php://input');
//        echo base64_encode(hash_hmac('sha256', $data, getenv('SHOPIFY_APP_SECRET'), true));exit;

        $request = \Config\Services::request();

        //Read JSON Data
        $shopify_json = $request->getJSON();

        //log_message('error', $shopify_json);

        $hmac_header = $request->getHeaderLine('X-Shopify-Hmac-Sha256');

        /*
         * ob_flush();
          ob_start();
          var_dump($request);
          file_put_contents("dump.txt", ob_get_flush());
          exit;
         * 
         */

        if ($hmac_header != null) {

            $data = file_get_contents('php://input');
            $verified = $this->verify_webhook($data, $hmac_header);

            if ($verified) {

                $db = \Config\Database::connect('naseera');

                $data = [
                    'order_id' => $request->getJsonVar('order_number'),
                    'order_json' => json_encode($shopify_json)
                ];

                $db->table('orders')->insert($data);

                //Insert beneficiaries
                

                $atts = $shopify_json->note_attributes;

                $ben_count = $shopify_json->line_items[0]->quantity;
                $benarray = array();
                for ($i = 1; $i <= $ben_count; $i++) {
                    $benarray[$i]['id'] = uniqid();
                    $benarray[$i]['orderid'] = $shopify_json->order_number;;
                }


//Iterate beneficiaries
                for ($i = 1; $i <= $ben_count; $i++) {
                    foreach ($atts as $attvalue) {

                        if ($this->endsWith($attvalue->name, '-' . $i . '-hospital')) {
                            $benarray[$i]['hospital'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-firstname')) {
                            $benarray[$i]['firstname'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-lastname')) {
                            $benarray[$i]['lastname'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-gender')) {
                            $benarray[$i]['gender'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-age')) {
                            $benarray[$i]['age'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-email')) {
                            $benarray[$i]['email'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-phone')) {
                            $benarray[$i]['phone'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-address')) {
                            $benarray[$i]['address'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-district')) {
                            $benarray[$i]['district'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-pin')) {
                            $benarray[$i]['pin'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-landmark')) {
                            $benarray[$i]['landmark'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-emergency')) {
                            $benarray[$i]['emergency'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-hospital')) {
                            $benarray[$i]['hospital'] = $attvalue->value;
                        } else if ($this->endsWith($attvalue->name, '-' . $i . '-medicalhistory')) {
                            $benarray[$i]['medicalhistory'] = $attvalue->value;
                        }
                    }
                }


                $mailarray = array();
                $mailcount = 0;
                foreach ($benarray as $ben) {


                    $db->table('beneficiaries')->insert($ben);

                    $visitid = uniqid();
                    
                    $visitdate = strtotime($shopify_json->closed_at);
                    $new_time= date('Y-m-d H:i:s',$visitdate);

                    $dataVisit1 = [
                        'id' => $visitid,
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "1st Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+1 days')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit1);

                    $dataVisit2 = [
                        'id' => uniqid(),
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "2nd Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+3 months')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit2);

                    $dataVisit3 = [
                        'id' => uniqid(),
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "3rd Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+6 months')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit3);

                    $dataVisit4 = [
                        'id' => uniqid(),
                        'orderid' => $request->getJsonVar('order_number'),
                        'visittitle' => "4th Visit",
                        'expecteddate' => date('Y-m-d H:i:s',strtotime($new_time.'+9 months')),
                        'beneficiaryid' => $ben['id'],
                        'status' => 0
                    ];

                    $db->table('visits')->insert($dataVisit4);

                    if($ben!=null && isset($ben['hospital']))
                    {
                    $mailarray[$mailcount]['orderid'] = $request->getJsonVar('order_number');
                    $mailarray[$mailcount]['beneficiaryid'] = $ben['id'];
                    $mailarray[$mailcount]['visitid'] = $visitid;
                    $mailarray[$mailcount]['hospital'] = $ben['hospital'];
                    $mailarray[$mailcount]['firstname'] = ($ben['firstname']?$ben['firstname']:"");
                    $mailarray[$mailcount]['lastname'] = ($ben['lastname']?$ben['lastname']:"");
                    $mailcount++;
                    }
                }

//Send Email

                $settingsquery = $db->query('SELECT * FROM settings ');
                $notificationsettings = $settingsquery->getRow();

                foreach ($mailarray as $benmail) {

                    $query = $db->query('SELECT * FROM units where unitname like "' . $benmail['hospital'] . '"');
                    $units = $query->getRow();
                    if ($units) {

                        if ($notificationsettings && $notificationsettings->enableemail == '1') {
                            //Send Email
                            if ($units->unitinchargeemail != "") {
                                $mail_data['visiturl'] = base_url("/schedule/" . $benmail['visitid']);
                                $message = view('reminder_email_1', $mail_data);

                                try {
                                    $this->sendmail($benmail['orderid'], $benmail['beneficiaryid'], $message, "New Dilse Order#" . $request->getJsonVar('order_number') . ", Beneficiary " . $benmail["firstname"] . " " . $benmail["lastname"], $units->unitinchargeemail);
                                } catch (\Exception $e) { {
                                        return $this->response->setJSON(array("success" => false, "message" => "Sending Email failed.", "data" => $e));
                                    }
                                }
                            }
                        }

                        if ($notificationsettings && $notificationsettings->enablesms == '1') {
                            //Send SMS
                            if ($units->unitinchargemobile != "") {


                                try {
                                    $this->sendsms($benmail['orderid'], $benmail['beneficiaryid'], "New Order " . $request->getJsonVar('order_number') . ", Beneficiary " . $benmail["firstname"] . " " . $benmail["lastname"], $units->unitinchargemobile);
                                } catch (\Exception $e) {
                                    return $this->response->setJSON(array("success" => false, "message" => "Sending SMS message failed.", "data" => $e));
                                }
                            }
                        }
                        if ($notificationsettings && $notificationsettings->enablewhatsapp == '1') {
                            //Send WhatApp
                            if ($units->unitinchargewhatsapp != "") {

                                try {
                                    $this->sendwhatsapp($benmail['orderid'], $benmail['beneficiaryid'], "You have a new order.\nYou can find the order information below.\nhttps://asterdisle.com/visit/" . $request->getJsonVar('order_number'), $units->unitinchargewhatsapp);
                                } catch (\Exception $e) {
                                    return $this->response->setJSON(array("success" => false, "message" => "Sending WhatsApp message failed.", "data" => $e));
                                }
                            }
                        }
                    }
                }
            } else {
                echo "Not verified";
            }
        } else {
            log_message('error', 'Auth failed.');
        }
        exit;
    }

    
    
    function sendmail($orderid, $beneficiaryid, $message, $subject, $tomail) {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('api.url') . '/api/v1/gmail/sendemail',
            //CURLOPT_URL => getenv('api.url').'/api/v1/gmail/sendcalendar',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'to=' . $tomail . '&subject=' . $subject . '&message=' . $message,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $txtmsg = str_replace(array("\r\n", "\n"), '<br>', $this->strip_html_tags($message));
        $txtmsg = str_replace(array("<br><br>", "  "), '', $txtmsg);
        $data = [
            'id' => uniqid(),
            'orderid' => $orderid,
            'beneficiaryid' => $beneficiaryid,
            'messagetype' => 'email',
            'response' => $response,
            'responsecode' => $httpcode,
            'message' => '{"to":' . '"' . $tomail . '", "subject":' . '"' . $subject . '", "message":"' . $txtmsg . '"}'
        ];

        $notificationModel = new NotificationsModel();
        $notificationModel->insert($data);

        return 1;
    }

    function sendsms($orderid, $beneficiaryid, $message, $to) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('api.url') . '/api/v1/sms/sendsms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'to=' . $to . '&message=' . $message,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        //echo $response;

        $txtmsg = str_replace(array("\r\n", "\n"), '<br>', $this->strip_html_tags($message));
        $txtmsg = str_replace(array("<br><br>", "  "), '', $txtmsg);
        $data = [
            'id' => uniqid(),
            'orderid' => $orderid,
            'beneficiaryid' => $beneficiaryid,
            'messagetype' => 'sms',
            'response' => $response,
            'responsecode' => $httpcode,
            'message' => '{"to":' . '"' . $to . '", "message":"' . $txtmsg . '"}'];

        $notificationModel = new NotificationsModel();
        $notificationModel->insert($data);
        return 1;
    }

    function sendwhatsapp($orderid, $beneficiaryid, $message, $to) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('api.url') . '/api/v1/whatsapp/sendwhatsapp',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'to=' . $to . '&message=' . $message,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $txtmsg = str_replace(array("\r\n", "\n"), '<br>', $this->strip_html_tags($message));
        $txtmsg = str_replace(array("<br><br>", "  "), '', $txtmsg);
        $data = [
            'id' => uniqid(),
            'orderid' => $orderid,
            'beneficiaryid' => $beneficiaryid,
            'messagetype' => 'whatsapp',
            'response' => $response,
            'responsecode' => $httpcode,
            'message' => '{"to":' . '"' . $to . '", "message":"' . $txtmsg . '"}'];

        $notificationModel = new NotificationsModel();
        $notificationModel->insert($data);
        return 1;
    }

    function strip_html_tags($text) {
        $text = preg_replace(
                array(
                    // Remove invisible content
                    '@<head[^>]*?>.*?</head>@siu',
                    '@<style[^>]*?>.*?</style>@siu',
                    '@<script[^>]*?.*?</script>@siu',
                    '@<object[^>]*?.*?</object>@siu',
                    '@<embed[^>]*?.*?</embed>@siu',
                    '@<applet[^>]*?.*?</applet>@siu',
                    '@<noframes[^>]*?.*?</noframes>@siu',
                    '@<noscript[^>]*?.*?</noscript>@siu',
                    '@<noembed[^>]*?.*?</noembed>@siu',
                    // Add line breaks before and after blocks
                    '@</?((address)|(blockquote)|(center)|(del))@iu',
                    '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
                    '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
                    '@</?((table)|(th)|(td)|(caption))@iu',
                    '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
                    '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
                    '@</?((frameset)|(frame)|(iframe))@iu',
                ),
                array(
                    ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
                    "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
                    "\n\$0", "\n\$0",
                ),
                $text);
        return strip_tags($text);
    }

    function startsWith($haystack, $needle) {
        $length = strlen($needle);
        return substr($haystack, 0, $length) === $needle;
    }

    function endsWith($haystack, $needle) {
        $length = strlen($needle);
        if (!$length) {
            return true;
        }
        return substr($haystack, -$length) === $needle;
    }

}
