<?php namespace App\Models;
use CodeIgniter\Model;

    class Tehsil extends Model{
        protected $primaryKey = 'id';
        protected $table = 'tehsil';
        protected $allowedFields = ['district_id','tehsil'];
        
    }

?>