<?php namespace App\Models;
use CodeIgniter\Model;

    class UserModel extends Model{
        protected $primaryKey = 'id';
        protected $table = 'users';
        protected $allowedFields = ['name', 'fname', 'email', 'mobile', 'phone', 'bloodGroup', 'province', 'district', 'tehsil','drugAdict','password', 'dob', 'image', 'code', 'verified', 'searchme'];
        protected $beforeInsert = ['beforeInsert'];
       // protected $beforeUpdate = ['beforeUpdate'];

        protected function beforeInsert(array $data){
            $data = $this->passwordHash($data);
            return $data;
        }
        //protected function beforeUpdate(array $data){
          //  $data = $this->passwordHash($data);
           // return $data;
        //}
        protected function passwordHash(array $data){
            if(isset($data['data']['password'])){
                $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
                return $data;
            }
        }
        protected function searchData(){
            $builder = $this->db->table('users');
            $builder->select('users.*, province.name as pname');
            $builder->join('province', 'province.id = users.province');
            //$builder->where($where);
            $data = $builder->get()->getResult();
            return $data;
        }
    }

?>