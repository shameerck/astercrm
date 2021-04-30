<?php

namespace App\Models;

use CodeIgniter\Model;

class TableDataModel extends Model {

    
    public function dtOrders(){
        $db = \Config\Database::connect();
    $builder = $db->table("orders");
    $builder->orderby('id', 'desc');
    return $builder;
    }
    
    public function dtCustomers(){
        $db = \Config\Database::connect();
    $builder = $db->table("customers");
    $builder->orderby('id', 'desc');
    return $builder;
    }
    
    public function dtViewButton(){
    $viewButton = function($row){
        
            return '<a target="_blank" href="print/' . $row['ID'] .'" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></a>';
        
    };
    return $viewButton;
    }
    
    
    public function dtRowTotal(){
   $total = function($row){
            return number_format(($row['UNITS'] * $row['UNITPRICE'])-$row['DISCOUNT'],2);
   };
   return $total;
      
    }
    
    
    public function dtPayButton(){
    $payButton = function($row){
        if ($row['STATUS'] == 0) {
            return '<button class="btn btn-primary mb-1 btn-sm">Pay</button>';
        }
        else
        {
            return '<span class="shadow-none badge badge-success">Paid</span>';
        }
    };
    return $payButton;
    }

    

    function getBalance($orgid) {
        $db = \Config\Database::connect();
        $builder = $db->table('CREDITDIARY');
        $builder->where('ORGID', $orgid);
        $builder->where('STATUS', 2);
        $builder->select('(UNITS*UNITPRICE)-DISCOUNT AS TOTAL');
        $query = $builder->get();
        $row = $query->getRow();
        if ($row != null) {
            return number_format($row->TOTAL,2);
        } else {
            return 0;
        }
    }
    
    
    function findInvoice($invid,$orgid) {
        $db = \Config\Database::connect();
        $builder = $db->table('CREDITDIARY CD');
        $builder->join('ORGANISATIONS O', "O.ID=CD.ORGID");
        $builder->where('CD.ORGID', $orgid);
        $builder->where('CD.ID', $invid);
        $builder->select('O.*,CD.*, CD.ID AS INVOICENUMBER, CD.CREATEDDATE AS INVOICEDATE, CD.PURCHASETYPE AS INVPURCHASETYPE, CD.STATUS AS PAYMENTSTATUS');
         $query = $builder->get();
        return $query->getRow();
        
    }
    
    
    

}
