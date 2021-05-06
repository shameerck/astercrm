<?php

namespace App\Controllers;

use App\Models\TableDataModel;

class TableData extends BaseController
{
	public function dtOrdersList() {
            
           
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtOrders())
            ->setDefaultOrder("id","desc")
            ->setSearch(["order_id"])
          ->setOutput(["order_id", "invoice_date", "first_name","email", "phone", "amount", "beneficiaries"]);
    return $table->getDatatable();
            
    }
    
    public function dtCustomersList() {
            
           
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtCustomers())
            ->setDefaultOrder("id","desc")
            ->setSearch(["customer_id","customer_json"])
          ->setOutput(["id","customer_id", "customer_json"]);
    return $table->getDatatable();
            
    }
}
