<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Response;

class User extends BaseController
{
    
        public function index()
        {
            $userModel = new UserModel();
            $data = $userModel->findAll();
    
            $result['data'] = $data;
    
            return view('Admin/User/user', $result);
        }
    
        public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/admin/user');
    }
  
}