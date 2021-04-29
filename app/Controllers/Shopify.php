<?php

namespace App\Controllers;

class Shopify extends BaseController {

    function verify_webhook($data, $hmac_header) {
        $calculated_hmac = base64_encode(hash_hmac('sha256', $data, getenv('SHOPIFY_APP_SECRET'), true));
        return hash_equals($hmac_header, $calculated_hmac);
    }

    public function customercreated() {
        $request = \Config\Services::request();

        //Read JSON Data
        $shopify_json = $request->getJSON();

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
                    'customer' => json_encode($shopify_json)
                ];

                $db->table('customers')->insert($data);
            }
        } else {
            log_message('error', 'Auth failed.');
        }
        exit;
    }
    
    public function ordercreated() {
        $request = \Config\Services::request();

        //Read JSON Data
        $shopify_json = $request->getJSON();

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
                    'order_id' => $request->getJsonVar('id'),
                    'order' => json_encode($shopify_json)
                ];

                $db->table('orders')->insert($data);
            }
        } else {
            log_message('error', 'Auth failed.');
        }
        exit;
    }

}
