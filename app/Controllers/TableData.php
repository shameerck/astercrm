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
            ->setSearch(["order_id","order"])
          ->setOutput(["id","order_id", "order"]);
    return $table->getDatatable();
            
    }
    
    public function dtCustomersList() {
            
           
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtCustomers())
            ->setDefaultOrder("id","desc")
            ->setSearch(["customer_id","customer"])
          ->setOutput(["id","customer_id", "customer"]);
    return $table->getDatatable();
            
    }
}
