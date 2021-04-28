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

            log_message('info', $request->getJSON());
            exit;
            $hmac_header = $_GET['hmac'];;

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
