<?php

namespace App\Controllers;

use App\Models\UserModel;

$session = \Config\Services::session();

class Login extends BaseController
{
    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        return view('Rigester');
    }
    public function do_login()
    {
        $resultmodel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $result = $resultmodel->where('email', $email)->first();

        if ($result) {
            // User found, check password
            if (password_verify('$password', $result['password'])) {
                // Password matches, store user data in session or perform other authentication actions
                $resultData = [
                    'user_id' => $result['id'],
                    'name' => $result['name'],
                    'email' => $result['email'],
                    'role' => $result['role'],
                    // Add other user data if needed
                ];

                $this->session->set('user', $resultData);

                // Redirect the user to the authenticated area or perform other actions
                if ($result['role'] == 2) {
                    return redirect()->to(base_url('admin'));
                } elseif ($result['role'] == 1) {
                    return redirect()->to('/');
                } else {
                    return redirect()->to("/");
                }
            } else {
                // User not found
                $this->session->setFlashdata('error', 'Invalid email or password.');
            }

            // Redirect the user back to the login page if authentication fails
            return redirect()->back();
        }
    }
    // public function do_login()
    // {
    //     $resultmodel = new UserModel();
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');
    //     $result = $resultmodel->where('email', $email)->first();

    //     if (!empty($result) && is_array($result)) {
    //         $result = (object) $result;
    //     }

    //     if ($result && isset($result->id) && $result->id > 0) {
    //         if (password_verify('$password', $result->password)) {
    //             $this->session->set('user', $result);
    //             return redirect()->to(base_url('admin'));
    //             // echo 'login sucesfull.';
    //         } else {
    //             echo 'Invalid password.';
    //         }
    //     } else {
    //         echo 'Invalid Email or password.';
    //     }
    // }
    public function do_register()
    {
        $resultmodel = new UserModel();
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $password = password_hash('$password', PASSWORD_BCRYPT);

        $data = [
            "name" => $name,
            "email" => $email,
            "password" => $password,

        ];
        $insert = $resultmodel->insert($data);

        if ($insert) {
            // Registration successful
            $_SESSION['success'] = 'Registration successful! Please login with your credentials.';
        } else {
            // Registration failed
            $_SESSION['error'] = 'Registration failed. Please try again.';
        }

        return redirect()->to('/login');
        exit();
    }
    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }
}
