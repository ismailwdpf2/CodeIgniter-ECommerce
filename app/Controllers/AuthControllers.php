<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
      public $session;
      public function __construct()
      {
            helper("form");
            $this->session = session();
      }
      public function login()
      {
            $data = [
                'session' => $this->session,
            ];
            helper("request");
            if (! $this->request->is('post')) {
                return view('auth/login',$data);
            }
    
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[5]',                        
            ];
    
            if (! $this->validate($rules)) {
                return view('auth/login',$data);
            }
            
            $userModel = model('UserModel');
            $email = $this->request->getPost('email');
            $pass = $this->request->getPost("password");
            $user = $userModel->where('email', $email)->first();
            // dd($user);
            if($user){ 
                if(password_verify('$pass',$user['password'])){ 
                    $newdata = [
                        'username'  => $user['name'],
                        'email'     => $user['email'],
                        'role'     => $user['role'],
                        'logged_in' => true,
                    ];
                    
                    $this->session->set($newdata);
                    if($user['role']==2){
                        return redirect()->to("admin/dashboard");
                    }
                    elseif($user['role']==1){
                        return redirect()->to("/");  
                    }
                    else{
                        return redirect()->to("/"); 
                    }
                    
                }
                else{
                    $this->session->setFlashdata('type', 'danger');
                    $this->session->setFlashdata('message', 'password invalid');
                    return redirect()->to("login");  
                }
            }
            else{
                $this->session->setFlashdata('type', 'danger');
                $this->session->setFlashdata('message', 'User Email Or password invalid');
                return redirect()->to("login");
            }
        }
}
