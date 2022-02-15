<?php namespace App\Models;
use CodeIgniter\Model;

    class Province extends Model{
        protected $primaryKey = 'id';
        protected $table = 'province';
        protected $allowedFields = ['name'];
        
    }

?>