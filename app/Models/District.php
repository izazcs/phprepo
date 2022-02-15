<?php namespace App\Models;
use CodeIgniter\Model;

    class District extends Model{
        protected $primaryKey = 'id';
        protected $table = 'district';
        protected $allowedFields = ['province_id','district'];
        
    }

?>