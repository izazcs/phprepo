<?php 
namespace App\Validation;
use App\Models\UserModel;

class UserRules{
    public function validateUser(string $str, string $fields, array $data){
        $userModel = new UserModel();

        $userData = $userModel->where('mobile', $data['mobile'])->first();

        if(!$userData)
            return false;
        return password_verify($data['password'], $userData['password']);
    }
}
?>