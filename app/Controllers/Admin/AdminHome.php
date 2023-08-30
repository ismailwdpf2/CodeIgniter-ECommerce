<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminHome extends BaseController
{
    public function index()
    {
    //     $user = session('user');

    // if (!$user || !isset($user['id']) || $user['id'] = 2) {
    //     return redirect()->to(base_url('login'));
    // }
    // else{

        return view('Layouts/Admin/AdminView');
    // }
    }
    public function adminuser(){
        return view('Admin/User/user');
    }

}
