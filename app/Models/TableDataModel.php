<?php

namespace App\Models;

use CodeIgniter\Model;

class TableDataModel extends Model {

    
    public function dtOrders(){
        $db = \Config\Database::connect();
    $builder = $db->table("orders");
    $builder->select('id, order_id, DATE_FORMAT(JSON_UNQUOTE(JSON_EXTRACT(order_json, "$.created_at")),"%d-%m-%Y %H:%m") as invoice_date, '
            . 'CONCAT(JSON_UNQUOTE(JSON_EXTRACT(order_json, "$.customer[0].first_name")), " ",JSON_UNQUOTE(JSON_EXTRACT(order_json, "$.customer[0].last_name"))) as first_name, '
            . 'JSON_UNQUOTE(JSON_EXTRACT(order_json,"$.total_price")) as amount, '
            . 'JSON_EXTRACT(order_json, "$.line_items[0].quantity") as beneficiaries, '
            . 'JSON_UNQUOTE(JSON_EXTRACT(order_json, "$.customer[0].email"))as email, '
            . 'JSON_UNQUOTE(JSON_EXTRACT(order_json, "$.customer[0].default_address[0].phone"))as phone');
    $builder->orderby('order_id', 'desc');
    return $builder;
    }
    
    public function dtUnits(){
        $db = \Config\Database::connect();
    $builder = $db->table("units");
    $builder->select('*');
    $builder->orderby('id', 'asc');
    return $builder;
    }
    
    public function dtUsers(){
        $db = \Config\Database::connect();
    $builder = $db->table("users");
    $builder->select('users.id, units.unitname, users.email, users.password, users.location_id ');
    $builder->join('units','units.id=users.location_id');
        
    $builder->orderby('users.id', 'asc');
    return $builder;
    }
    
    public function editUnitButton(){
    $viewButton = function($row){
        
            //return '<a target="_blank" href="print/' . $row['id'] .'" class="bs-tooltip" data-toggle="modal" data-target="#addunitModal" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
        return '<button onclick="editunit(\''.$row['id'].'\',\''.$row['unitname'].'\',\''.$row['unitinchargename'].'\',\''.$row['unitinchargeemail'].'\',\''.$row['unitinchargemobile'].'\',\''.$row['unitinchargewhatsapp'].'\',\''.$row['unitmanagername'].'\',\''.$row['unitmanageremail'].'\',\''.$row['unitmanagermobile'].'\',\''.$row['unitmanagerwhatsapp'].'\')" class="btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button><button onclick="deleteunit(\''.$row['id'].'\')" class="btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>';
        
    };
    return $viewButton;
    }
    
    public function editUserButton(){
    $viewButton = function($row){
        
            //return '<a target="_blank" href="print/' . $row['id'] .'" class="bs-tooltip" data-toggle="modal" data-target="#addunitModal" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
        return '<button onclick="edituser(\''.$row['id'].'\',\''.$row['location_id'].'\',\''.$row['email'].'\',\''.$row['password'].'\')" class="btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button><button onclick="deleteuser(\''.$row['id'].'\')" class="btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>';
        
    };
    return $viewButton;
    }
    
     
    public function jsonextract(){
    $viewButton = function($row){
        
        $json = json_decode($row['message'],true);
        
        if($json) { return $json["to"]; } 
        //return $row["fullname"];
        
        
    };
    return $viewButton;
    }
    
    public function dtVisits(){
    $db = \Config\Database::connect();
    $builder = $db->table("visits");
    $builder->select('visits.id as visitid, concat("Expected: ", visits.expecteddate,"<br>Scheduled: ", IFNULL(visits.visitingdate,""),"<br>Visited: ", IFNULL(visits.visiteddate,"")) as dates, visits.visittitle, visits.comments, visits.username, beneficiaries.hospital, concat("<strong>",beneficiaries.firstname," ",beneficiaries.lastname,"</strong>", "<br>", replace(address, ",", "<br>")) as fullname');
    $builder->join('beneficiaries','beneficiaries.id=visits.beneficiaryid');
    if($_SESSION["locationid"]!=null)
    {
        $builder->where('beneficiaries.hospital', $_SESSION["locationname"]);
    }
    $builder->orderby('expecteddate', 'desc');
    return $builder;
    }
    public function editVisit(){
    $viewButton = function($row){
        
            //return '<a target="_blank" href="print/' . $row['id'] .'" class="bs-tooltip" data-toggle="modal" data-target="#addunitModal" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
        return '<button onclick="editschedule(\''.$row['visitid'].'\')" class="btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></button><button onclick="editstatus(\''.$row['visitid'].'\')" class="btn-sm btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button>';
        
    };
    return $viewButton;
    }
    
    public function dtNotifications(){
    $db = \Config\Database::connect();
    $builder = $db->table("notifications");
    $builder->select('notifications.created_at, concat(beneficiaries.firstname," ",beneficiaries.lastname,"<br>",beneficiaries.hospital) as fullname, messagetype, message, response');
    $builder->join('beneficiaries','beneficiaries.id=notifications.beneficiaryid','left');
    $builder->orderby('created_at', 'desc');
    return $builder;
    }
    
    public function dtBeneficiaries(){
    $db = \Config\Database::connect();
    $builder = $db->table("beneficiaries");
    $builder->select('concat(beneficiaries.firstname," ",beneficiaries.lastname) as fullname, age, gender, replace(address, ",", "<br>") as address, phone, hospital');
    if($_SESSION["locationid"]!=null)
    {
        $builder->where('beneficiaries.hospital', $_SESSION["locationname"]);
    }
    $builder->orderby('fullname', 'asc');
    return $builder;
    }
    
    
    public function dtCustomers(){
    $db = \Config\Database::connect();
    $builder = $db->table("customers");
    $builder->select('CONCAT(JSON_UNQUOTE(JSON_EXTRACT(customer_json, "$.first_name"))," ",JSON_UNQUOTE(JSON_EXTRACT(customer_json, "$.last_name"))) as fullname '
            . ', JSON_UNQUOTE(JSON_EXTRACT(customer_json, "$.email")) as email'
            . ', JSON_UNQUOTE(JSON_EXTRACT(customer_json, "$.default_address.phone")) as phone');
    $builder->orderby('email', 'asc');
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
