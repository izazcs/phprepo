<?php

namespace App\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use App\Models\UserModel;

class Main extends BaseController
{
    public function __construct()
    {
        //helper(['form']);
    }
    public function getDistrict(){
        //ajax code for getting district 
        if ($this->request->isAJAX())
        {
            $district = new District();
            $districtData = $district->where('province_id', $this->request->getVar('pid'))->findAll();
            return json_encode($districtData);
        }
    }
    public function getdistrictM(){
        $district = new District();
            if($districtData['odistrict'] = $district->where('province_id', $this->request->getVar('pid'))->findAll()){
                return json_encode($districtData);
            }else{
                $districtData['odistrict'] =array("id" => "0", "province" => "Select District");
                return json_encode($districtData);
            } 
    }
    public function getTehsilM(){
        $tehsil = new Tehsil();
            if($tehsilData['otehsil'] = $tehsil->where('district_id', $this->request->getVar('did'))->findAll()){
                return json_encode($tehsilData);
            }else{
                $tehsilData['otehsil'] =array("id" => "0", "tehsil" => "Select tehsil");
                return json_encode($tehsilData);
            } 
    }
    public function getTehsil(){
        //ajax code for getting district 
        if ($this->request->isAJAX())
        {
            $tehsil = new Tehsil();
            $tehsilData = $tehsil->where('district_id', $this->request->getVar('did'))->findAll();
            return json_encode($tehsilData);
        }
    }
    public function getUsers(){
        $bloodgroup = trim($this->request->getVar('bg'));
        $pr = $this->request->getVar('pid');
        $district = $this->request->getVar('did');
        $tehsil = $this->request->getVar('tid');
        //echo json_encode(array('pid' => $pr, 'bloodG' => $bloodgroup));
        if($bloodgroup == 'B' || $bloodgroup == "A" || $bloodgroup == "AB"){
            $bloodgroup .= "+";
        }
        $where = [
            'bloodGroup'=> $bloodgroup,
            'user.province' => $pr,
            'user.district' => $district,
            'searchme' => '1',
            'verified' => '1',
        ];
            $this->db = db_connect();
            $builder = $this->db->table("users as user");
            $builder->select('user.name, user.fname, user.bloodGroup, user.mobile, user.phone,user.image, user.created_at, p.name as pname, d.district as dname, t.tehsil as tname');
            $builder->join('province as p', 'user.province = p.id', 'left');
            $builder->join('district as d', 'user.district = d.id', 'left');
            $builder->join('tehsil as t', 'user.tehsil = t.id', 'left');
            $builder->where($where);
            $fetch['userdata'] = $builder->get()->getResult('array');
            //$query =$this->db->getLastQuery();
            //echo (string) $query;
        if($fetch){
            echo json_encode($fetch);
        }else{
            //http://localhost/blood/public/getUsers?bg=B+&pid=1&did=4&tid=11
            echo json_encode(array('userdata' => 'No data found!'));
        }
    }

    public function registerM(){
        //do form validation here
        $rules = [
            'name' => 'trim|required|min_length[3]',
            'fname' => 'trim|required',
            'email' => 'required|valid_email', 
            'mobile' => 'required|max_length[11]|min_length[11]|is_unique[users.mobile]|regex_match[/03/]',
            'password' => 'required|max_length[255]',
            'confirm_password' => 'matches[password]',
        ];
        
        if(!$this->validate($rules)){
            $data['rresult'] = array(
                array(
                    "saved" => "0",
                    "msg" => "Unable to regester form Validation Error!"
                    )
                );
               echo json_encode($data);
        }else{
           // print_r($rules);
            //store the suer now in db
            
            $imgName = 'noimage';
            $code = rand(5, 99999);
             $bloodgroup = trim($this->request->getVar('bg'));
            if($bloodgroup == 'B' || $bloodgroup == "A" || $bloodgroup == "AB"){
                $bloodgroup .= "+";
            }
            
            $userData= [
                'name' => $this->request->getVar('name'),
                'fname' => $this->request->getVar('fname'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'phone' => "0946000000",
                'dob' => $this->request->getVar('dob'),
                'drugAdict' => "0",
                'province' => $this->request->getVar('pid'),
                'district' => $this->request->getVar('did'),
                'tehsil' => $this->request->getVar('tid'),
                'bloodGroup' => $bloodgroup,
                'password' => $this->request->getVar('password'),
                'code' =>$code,
                'image' => $imgName,
            ];
            $saveUserModel = new UserModel();
            if($saveUserModel->save($userData)){
                //$to = $this->request->getVar('mobile');
                //$this->sendSMS($to, $code);
                $data['rresult'] = array(
                    "saved" => "1",
                    "msg" => "Regestration Successfull"
                );
                echo json_encode($data);
            }else{
            
                $data['rresult'] = array(
                    array(
                    "saved" => "0",
                    "msg" => "Unable to regester Insertion Error!"
                    )
                );
               echo json_encode($data);
            }
        }
}
public function sendSMS($num, $code){
    //liefetime sms api setting
        $url = "https://lifetimesms.com/plain";
        $parameters = [
            "api_token" => "74502e5dbb362a32c867f4cbe9a796228267c26571",
            "api_secret" => "@@khan@@72",
            "to" => $num,
            "from" => "WENA",
            "message" => "Your VCODE for WENA Network is".$code." .For any issue plz contact us www.wena.link or 03459514672 Thank you!",
        ];
        $ch = curl_init();
        $timeout  =  60;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
   
}
    public function test(){
        echo 'test';
    }

}

?>