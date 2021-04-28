<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{

    protected $table      = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['shopify_customer_id', 'customer'];
    
    
    function activate($orgid) {
        $db = \Config\Database::connect();
        $db->simpleQuery('udpate ORGANISATIONS SET STATUS=1 WHERE ID='.$orgid);        
    }
    
}