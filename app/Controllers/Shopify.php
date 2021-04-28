<?php

namespace App\Controllers;

class Shopify extends BaseController
{
    
    
    function verify_webhook($data, $hmac_header)
{
  $calculated_hmac = base64_encode(hash_hmac('sha256', $data, getenv('SHOPIFY_APP_SECRET'), true));
  return hash_equals($hmac_header, $calculated_hmac);
}

	public function customercreated()
	{
            $request = \Config\Services::request();

            //Read JSON Data
            $shopify_json = $request->getJSON();
       
            $hmac_header = $request->getHeaderLine('HTTP_X_SHOPIFY_HMAC_SHA256');
            
            ob_flush();
ob_start();
    var_dump($hmac_header);
file_put_contents("dump.txt", ob_get_flush());
exit;
            
            $hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
            log_message('info', $hmac_header);
            
            $hmac_header1 =  $request->header('HTTP_X_SHOPIFY_HMAC_SHA256');
            log_message('info', $hmac_header1);
            
            if($hmac_header!=null)
            {
$data = file_get_contents('php://input');
$verified = $this->verify_webhook($data, $hmac_header);

    log_message('info', 'Hook: Customer Created.');
    log_message('info', $verified);
    log_message('info', $data);

            }
       else
       {
           log_message('error', 'Auth failed.');
       }
exit;
	}
}
