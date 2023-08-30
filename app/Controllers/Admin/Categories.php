<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    public function index()
    {
        // Initialize $result as an empty array
        return view('Admin/User/categories');
    }

    public function insert_categories()
    {
        $categoryModel = new CategoryModel();
        $name = $this->request->getPost('name');
        // File upload
        $imageFile = $this->request->getFile('image');
        $data = [
            'name' => $name,
            // 'image' => $imageFile,
        ];



        if ($imageFile->isValid()) {
            $newName = $imageFile->getRandomName();

            // Move the uploaded file to the desired location
            $imageFile->move(ROOTPATH . 'public/uploads', $newName);

            $data['image'] = $newName;
        }

        $insert = $categoryModel->insert($data);

        if ($insert) {
            $result = ['success' => 'Data inserted successfully.'];
        } else {
            $result = ['error' => 'Failed to insert data.'];
        }

        return redirect()->to('/admin/Categories/show_category')->with('result', $result);
    }


    public function show_category()
    {
        $categoryModel = new CategoryModel();
        $data = $categoryModel->findAll();
        // echo print_r($data);

        $result['data'] = $data;

        return view('Admin/User/categories', $result);
    }

    
    public function show_category_user()
    {
        $categoryModel = new CategoryModel();
        $data = $categoryModel->findAll();
        // echo print_r($data);

        $result['data'] = $data;

        return view('categories', $result);
    }

    public function delete_category($id)
    {

        $categoryModel = new CategoryModel();
        $categoryModel->delete($id);

        return redirect()->to('admin/Categories/show_category');
    }
    public function edit_category($id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        if ($category) {
            $result['category'] = $category;
            return view('Admin/User/edit_category', $result);
        } else {
            return redirect()->to('admin/Categories/show_category')->with('error', 'Category not found.');
        }
    }
    public function update_category($id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        if ($category) {
            $name = $this->request->getPost('name');
            $data = [
                'name' => $name,
            ];

            $updated = $categoryModel->update($id, $data);

            if ($updated) {
                $result = ['success' => 'Category updated successfully.'];
                return redirect()->to('admin/Categories/show_category')->with('result', $result);
            } else {
                $result = ['error' => 'Failed to update category.'];
                return redirect()->back()->withInput()->with('result', $result);
            }
        } else {
            return redirect()->to('admin/Categories/show_category')->with('error', 'Category not found.');
        }
    }
}
