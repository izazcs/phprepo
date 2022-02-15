<?php

namespace App\Controllers;

use App\Models\District;
use App\Models\UserModel;
use App\Models\Province;
use App\Models\Tehsil;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
    public function api(){
        $data['ismain'] = true;
        $data['title'] = 'WENA Save a Life || WENA Save a life!';
        echo view('templates/header', $data);
        echo view('api');
    }

 

    public function index(){
        if ($this->request->isAJAX()){
            $bloodgroup = $this->request->getPost('bloodGroup');
            $pr = $this->request->getPost('province');
            $district = $this->request->getPost('district');
            $tehsil = $this->request->getPost('tehsil');
            //$user = new UserModel();
            $where = [
                'bloodGroup'=> $bloodgroup,
                'user.province' => $pr,
                'user.district' => $district,
                'searchme' => '1',
                'verified' => '1',
            ];
                $this->db = db_connect();
                $builder = $this->db->table("users as user");
                $builder->select('user.name, user.fname, user.bloodGroup, user.mobile, user.phone,user.image, p.name as pname, d.district as dname, t.tehsil as tname');
                $builder->join('province as p', 'user.province = p.id', 'left');
                $builder->join('district as d', 'user.district = d.id', 'left');
                $builder->join('tehsil as t', 'user.tehsil = t.id', 'left');
                $builder->where($where);
                $fetch = $builder->get()->getResult('array');
                //$query =$this->db->getLastQuery();
                //echo (string) $query;
            if($fetch){
                echo json_encode($fetch);
            }else{
                echo json_encode(array('norecord' => '0'));
            }
        }else{
            $data['ismain'] = true;
            $data['title'] = 'WENA Save a Life || WENA Save a life!';
            $province = new Province();
            $data['province'] = $province->findAll();
            echo view('templates/header', $data);
            echo view('index');
        }
        //echo view('templates/footer');
    }
    public function import(){
        if($this->request->getMethod() == 'post'){
            $rules = [
                'dimage' =>  'uploaded[dimage]|ext_in[dimage,csv]'
                ];
                if(!$this->validate($rules)){
                    $data['validation'] = $this->validator;
                        $data['ismain'] = false;
                        $data['title'] = 'Import Item || WENA Save a life!';
                        echo view('templates/header', $data);
                        echo view('import');
                        echo view('templates/footer');
                }else{
                    $dimage = $this->request->getFile('dimage');
                    $file_name = $dimage->getName();
                    if(!empty($dimage) && $dimage->getSize() > 0){
                        $dimage->move('./assets/images/dimages/', $file_name);
                        $file = fopen('assets/images/dimages/'.$file_name,"r");
                        //Save flag
                        $flag=true;
                        //$this->db->trans_begin();
                        $i=1;
                        //from here get data for each item and validate it
                        $dmodel = new Tehsil();
                        while(($importdata = fgetcsv($file, NULL, ",")) !== FALSE){
                            $row = array(
                                'district_id'  =>  $importdata[0],
                                'tehsil'  =>  $importdata[1],
                            );
                            //If any record failed to save flag will be set false,then all records rolled back
                            if(!$dmodel->save($row)){
                                $flag=false;
                            }
                        }
                        if(!$flag){
                            //$this->db->trans_rollback();
                            $session = session();
                            $session->setFlashdata("message", "Record not Inserted!");
                            $data['ismain'] = false;
                            $data['title'] = 'Import Item || WENA Save a life!';
                            echo view('templates/header', $data);
                            echo view('import');
                            echo view('templates/footer');
                        }else{
                            $session = session();
                            $session->setFlashdata("message", "Record  Inserted!");
                            $data['ismain'] = false;
                            $data['title'] = 'Import Item || WENA Save a life!';
                            echo view('templates/header', $data);
                            echo view('import');
                            echo view('templates/footer');
                        }
                        fclose($file);
                    }
                }  
                
            }else{
                $data['ismain'] = false;
                $data['title'] = 'Import Items || WENA Save a life!';
                echo view('templates/header', $data);
                echo view('import');
                echo view('templates/footer');
            }
        }

   
    
    public function register(){
        if($this->request->getMethod() == 'post'){
            //do form validation here
            $rules = [
                'name' => 'trim|required|min_length[3]',
                'fname' => 'trim|required',
                'email' => 'required|valid_email', 
                'mobile' => 'required|max_length[11]|min_length[11]|is_unique[users.mobile]|regex_match[/03/]',
                'password' => 'required|max_length[255]',
                'confirm_password' => 'matches[password]',
            ];
            $dimage = $this->request->getFile('dimage');
                if(!empty($dimage) && $dimage->getSize() > 0){
                    $rules = [
                        'dimage' => [
                            'uploaded[dimage]',
                            'mime_in[dimage,image/jpg,image/jpeg, image/JPG, image/JPEG,image/png]',
                            'max_size[dimage,1024]',
                        ]
                    ];
                }
            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                $data['ismain'] = false;
                    $data['title'] = 'Registration Page || WENA Save a life!';
                    $province = new Province();
                    $data['province'] = $province->findAll();
                    echo view('templates/header', $data);
                    echo view('register');
                    echo view('templates/footer');
            }else{

                //store the suer now in db
                $imgName = 'noimage';
                if(!empty($dimage) && $dimage->getSize() > 0){
                    $imgName = $dimage->getRandomName();
                    $dimage->move('./assets/images/dimages/', $imgName);
                }
                $code = rand(5, 99999);
                $userData = [
                    'name' => $this->request->getVar('name'),
                    'fname' => $this->request->getVar('fname'),
                    'email' => $this->request->getVar('email'),
                    'mobile' => $this->request->getVar('mobile'),
                    'phone' => $this->request->getVar('phone'),
                    'dob' => $this->request->getVar('dob'),
                    'drugAdict' => $this->request->getVar('drugAdict'),
                    'province' => $this->request->getVar('province'),
                    'district' => $this->request->getVar('district'),
                    'tehsil' => $this->request->getVar('tehsil'),
                    'bloodGroup' => $this->request->getVar('bloodGroup'),
                    'password' => $this->request->getVar('password'),
                    'code' =>$code,
                    'image' => $imgName,
                ];
                $saveUserModel = new UserModel();
                if($saveUserModel->save($userData)){
                    //set session and send sms after successfull registration.
                    $to = $this->request->getPost('mobile');
                    $user = $saveUserModel->where('mobile', $to)->first();      
                    $this->setUserSession($user);
                    $this->sendSMS($to, $code);
                    session()->setFlashdata("message", "Record Inserted Successfully!");
                    return redirect()->to(base_url().'/login');
                }else{
                    $data['ismain'] = false;
                    $data['title'] = 'Registration Page || WENA Save a life!';
                    $province = new Province();
                    $data['province'] = $province->findAll();
                    echo view('templates/header', $data);
                    echo view('register');
                    echo view('templates/footer');
                }
            }
        }else{
            //if the page view request occur then load page
            $data['ismain'] = false;
            $data['title'] = 'Registration Page || WENA Save a life!';
            $province = new Province();
            $data['province'] = $province->findAll();
            echo view('templates/header', $data);
            echo view('register');
            echo view('templates/footer');
        }
    }
    public function login(){
        if($this->request->getMethod() == 'post'){
            //do form validation here
            $rules = [
                'mobile' => 'required|max_length[11]',
                'password' => 'required|max_length[255]|validateUser[mobile,password]',
            ];
            $validateError = [
                'password' => [
                    'validateUser' => 'Mobile # or Password dos\'t match!'
                ]
            ];

            if(!$this->validate($rules, $validateError)){
                $data['validation'] = $this->validator;
                $data['ismain'] = false;
                $data['title'] = 'Login Page || WENA Save a life!';
                echo view('templates/header', $data);
                echo view('login');
                echo view('templates/footer');
            }else{
                $userModel = new UserModel();
                $user = $userModel->where('mobile', $this->request->getVar('mobile'))->first();      
                $this->setUserSession($user);
                //then redirect the user to varification page
                //$data['ismain'] = false;
                //$data['title'] = 'User Dashboard || WENA Save a life!';
                //$user = new UserModel();
                //$data['isvarified'] = $user->select('verified')->where('id', session()->get('id'))->first();
                //echo view('templates/header', $data);
                //echo view('dashboard');
                //echo view('templates/footer');
                return redirect()->to(base_url().'/dashboard');
            }
        }else{
            $data['ismain'] = false;
            $data['title'] = 'Login Page || WENA Save a life!';
            echo view('templates/header', $data);
            echo view('login');
            echo view('templates/footer');
        } 
    }
    public function setUserSession($user){
        $distM = new District();
        $tehM = new Tehsil();
        $ddata = $distM->where('id', $user['district'])->first();
        $did = $ddata['id'];
        $dname = $ddata['district'];
        $tdata = $tehM->where('id', $user['tehsil'])->first();
        $tid = $tdata['id'];
        $tname = $tdata['tehsil'];
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'fname' => $user['fname'],
            'mobile' => $user['mobile'],
            'email' => $user['email'],
            'bloodGroup' => $user['bloodGroup'],
            'is_loged_in' => true,
            'province' => $user['province'],
            'did' => $did,
            'dname' =>$dname,
            'tid' => $tid,
            'tname' => $tname,
            'phone' => $user['phone'],
            'dob' => $user['dob'],
            'image' => $user['image'],
            'searchme' => $user['searchme'],
        ];
        return session()->set($data);
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
    public function dashboard(){
             $data['ismain'] = false;
            $data['title'] = 'User Dashboard || WENA Save a life!';
            $province = new Province();
            $data['province'] = $province->findAll();
            $user = new UserModel();
            $data['isvarified'] = $user->select('verified')->where('id', session()->get('id'))->first();
            echo view('templates/header', $data);
            echo view('dashboard');
    }
    public function verify(){
        if($this->request->getMethod() == 'post'){
            $rules = [
                'vcode' => 'required|min_length[3]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $data['ismain'] = false;
                $province = new Province();
                $data['province'] = $province->findAll();
                $user = new UserModel();
                $data['isvarified'] = $user->select('verified')->where('id', session()->get('id'))->first();
                $data['title'] = 'User Dashboard || WENA Save a life!';
                echo view('templates/header', $data);
                echo view('dashboard');
            } else {
                $code = $this->request->getPost('vcode');
                $id = session()->get('id');
                $updateData = ['verified' => '1'];
                $userModel = new UserModel();
                //echo $id;
                //echo $code;
                if ($userModel->where('id', $id)->where('code', $code)->first()) {
                    $userModel->update($id, $updateData);
                    session()->setFlashdata("message", "Your Account Verified Successfully Thank you for your support!");
                    return redirect()->to(base_url().'/dashboard');
                } else {
                    session()->setFlashdata("message", "Unable to verify your account");
                    return redirect()->to(base_url().'/dashboard');
                }
                
               
            }
        }
    }
    //update user profile
    public function update(){
        if($this->request->getMethod() == 'post'){
            //do form validation here
            $rules = [
                'name' => 'trim|required|min_length[3]',
                'fname' => 'trim|required',
                'email' => 'required|valid_email', 
            ];
            $dimage = $this->request->getFile('dimage');
                if(!empty($dimage) && $dimage->getSize() > 0){
                    $rules = [
                        'dimage' => [
                            'uploaded[dimage]',
                            'mime_in[dimage,image/jpg,image/jpeg, image/JPG, image/JPEG,image/png]',
                            'max_size[dimage,1024]',
                        ]
                    ];
                }
            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                $data['ismain'] = false;
                    $data['title'] = 'User Dashboard || WENA Save a life!';
                    $province = new Province();
                    $data['province'] = $province->findAll();
                    echo view('templates/header', $data);
                    echo view('dashboard');
            }else{

                //store the suer now in db
                $userM = new UserModel();
                $ddata = $userM->where('id', session()->get('id'))->first();
                $img = $ddata['image'];
                $imgName = $img;
                if(!empty($dimage) && $dimage->getSize() > 0){
                    $imgName = $dimage->getRandomName();
                    $dimage->move('./assets/images/dimages/', $imgName);
                    //delete old file
                    if($img == 'noimage'){
                        //there is no image return
                    }else{
                        //ulink image
                        unlink('./assets/images/dimages/'.$img);
                    }
                }
                $userData = [
                    'id' => session()->get('id'),
                    'name' => $this->request->getVar('name'),
                    'fname' => $this->request->getVar('fname'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                    'dob' => $this->request->getVar('dob'),
                    'drugAdict' => $this->request->getVar('drugAdict'),
                    'province' => $this->request->getVar('province'),
                    'district' => $this->request->getVar('district'),
                    'tehsil' => $this->request->getVar('tehsil'),
                    'searchme' => $this->request->getVar('searchme'),
                    'bloodGroup' => $this->request->getVar('bloodGroup'),
                    'image' => $imgName,
                ];
                $saveUserModel = new UserModel();
                if($saveUserModel->save($userData)){
                    return redirect()->to(base_url().'/logout');
                }else{
                    $data['ismain'] = false;
                    $data['title'] = 'User Dashboard || WENA Save a life!';
                    $province = new Province();
                    $data['province'] = $province->findAll();
                    echo view('templates/header', $data);
                    echo view('dashboard');
                }
            }
        }else{
            //if the page view request occur then load page
            $data['ismain'] = false;
            $data['title'] = 'User Dashboard || WENA Save a life!';
            $province = new Province();
            $data['province'] = $province->findAll();
            echo view('templates/header', $data);
            echo view('dashboard');
        }
    }
    
    public function logout(){ 
        session()->destroy();
        return redirect()->to(base_url().'/login');
    }

}
