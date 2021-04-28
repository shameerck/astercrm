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
            $request = service('request');

            
            $hmac_header = $request->getGet('HTTP_X_SHOPIFY_HMAC_SHA256');

            if($hmac_header!=null)
            {
$data = file_get_contents('php://input');
$verified = $this->verify_webhook($data, $hmac_header);

    log_message('Shopify Hook', 'Customer Created.');
    log_message('Shopify Hook', $verified);
    log_message('Shopify Hook', $data);
            }
       else
       {
           echo "Auth failed.";
       }
exit;
	}
}
