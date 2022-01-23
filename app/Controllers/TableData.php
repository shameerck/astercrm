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
    
    public function dtNotificationsList() {
            
           
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtNotifications())
            ->setDefaultOrder("created_at","desc")
            ->setSearch(["id"])
          ->setOutput(["created_at","fullname","messagetype", $tabledatamodel->jsonextract(), "response"]);
    return $table->getDatatable();
            
    }
    
    public function dtUnitsList() {
            
          
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtUnits())
            ->setDefaultOrder("id","asc")
            ->setSearch(["unitname"])
          ->setOutput(["id", "unitname", "unitinchargename", "unitinchargeemail", "unitinchargemobile", "unitinchargewhatsapp", "unitmanagername", "unitmanageremail", "unitmanagermobile", "unitmanagerwhatsapp", $tabledatamodel->editUnitButton()]);
    return $table->getDatatable();
            
    }
    
    public function dtUsersList() {
            
          
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtUsers())
            ->setDefaultOrder("id","asc")
          ->setOutput(["id", "unitname","email", "password", $tabledatamodel->editUserButton()]);
    return $table->getDatatable();
            
    }
    
    public function dtVisitsList() {
            
          
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtVisits())
            ->setDefaultOrder("expecteddate","desc")
          ->setOutput(["fullname", "hospital", "visittitle", "dates","comments", "username", $tabledatamodel->editVisit()]);
    return $table->getDatatable();
            
    }
    
     public function dtBeneficiariesList() {
            
           
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtBeneficiaries())
            ->setDefaultOrder("fullname","asc")
            ->setSearch(["fullname","address"])
          ->setOutput(["fullname","age", "gender", "phone", "address", "hospital"]);
    return $table->getDatatable();
            
    }
    
    public function dtCustomersList() {
            
           
        $tabledatamodel = new TableDataModel();
    $table = new TablesIgniter();
    $table->setTable($tabledatamodel->dtCustomers())
            ->setDefaultOrder("email","asc")
          ->setOutput(["fullname", "email", "phone"]);
    return $table->getDatatable();
            
    }
}
