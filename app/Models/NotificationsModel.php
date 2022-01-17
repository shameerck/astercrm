<?php namespace App\Models;

use CodeIgniter\Model;

class NotificationsModel extends Model
{

    protected $table      = 'notifications';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','orderid', 'beneficiaryid', 'messagetype', 'message', 'response','responsecode'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
}