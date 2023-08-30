<?php

namespace App\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SubcategoryModel;
use CodeIgniter\Files\File;
use Intervention\Image\ImageManagerStatic as Image;

class Product extends BaseController
{
    use ResponseTrait;
    protected $security;
    private $db;
    private $model;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->security = \Config\Services::security();
        $this->model = new ProductModel();
    }
    public function index()
    {
        $builder = $this->db->table('products');
        $builder->select('products.*, categories.name as catname, subcategories.name as subcatname');
        $builder->join('categories', 'categories.id = products.category_id', 'inner');
        $builder->join('subcategories', 'subcategories.id = products.subcategory_id', 'inner');
        $data = $builder->get()->getResultArray();
        return $this->respond($data, 200);
        // dd($data);
    }
    public function create()
    {
        $c = new CategoryModel();
        $data['cats'] = $c->select("id,name")->findAll();






        $validation = \Config\Services::validation();
        if (!$this->request->is('post')) {
            return view('Admin/product/create', $data);
        }
        $rules = [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'description' => 'required|',
            'sku' => 'required|is_unique[products.sku]',
            'images' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[images]',
                    'is_image[images]',
                    'mime_in[images,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[images,100]',
                    // 'max_dims[images,10024,7068]',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['status' => 'error', 'errors' => $errors]);
        }
        //
        $request = request();
        $img = $this->request->getFile('images');
        //file upload

        $imagename = "";
        if (!$img->hasMoved()) {
            $imagename = $img->store();
            // echo $imagename;
            // exit;

            $filepath = WRITEPATH . 'uploads/' . $imagename;
            $data = ['uploaded_fileinfo' => new File($filepath)];
            //watermark
            //image intervention
            // $image = Image::make($filepath)->resize(800, null, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // })->insert(WRITEPATH.'/uploads/logoci.png','center')->save($filepath);
            //watermark end


            // return $this->response->setJSON($data);
            // dd($data);

        }
        //file upload end
        $arr = [
            'category_id' => $request->getpost('category_id'),
            'subcategory_id' => $request->getpost('subcategory_id'),
            // 'subcategory_id'=>"1",
            // 'sku'=>$_POST['sku'],
            'sku' => $request->getPost('sku'),
            // 'sku'=>$this->request->getPost("sku"),
            'name' => $request->getPost('name'),
            'description' => $request->getPost('description'),
            'price' => $_POST['price'],
            'newprice' => $_POST['newprice'],
            // 'images'=> $imagename,
            'quantity' => $_POST['quantity'],
            'discount' => $_POST['discount'],
            'hot' => isset($_POST['hot']) ? $_POST['hot'] : 0,
        ];

        $this->model->insert($arr);

        $pid = $this->model->getInsertID();
        //add $imagename in image table
        $data = [
            "product_id" => $pid,
            'name' => $imagename
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('images');
        $builder->insert($data);
        //add $imagename in image table end

        return $this->response->setJSON(['status' => 'success', 'message' => "Product Added to Database"]);

        // return view('products/upload_success', $data); 


        //redirect works only on named routes
        // return redirect("products");
        //redirect->to should use for normal routes
        //return redirect()->to("products/new");
    }

    // ..................................

    public function show($productId)
    {
        $product = $this->model->find($productId);

        if (!$product) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found']);
        }

        return $this->response->setJSON(['status' => 'success', 'product' => $product]);
    }


    // public function product_show()
    // {
    //     $pmodel = new ProductModel();

    //     $product = $pmodel->where('category_id', 12)->select('products.*, images.name as imagename,categories.name as catname')
    //         ->join('images', 'products.id = images.product_id', 'left')
    //         ->join('subcategories', 'products.category_id = categories.id', 'left')
    //         // ->join('categories','images.product_id  = categories.id', 'left')
    //         ->orderBy('products.id', 'desc')
    //         ->findAll();
    //     dd($product);

    //     // return view('Admin/product/create', ['product' => $product]);
    // }


    // ..................................


    // public function product_show()
    // {
    //     $pmodel = new ProductModel();

    //     $product = $pmodel->where('products.category_id')
    //     ->select('products.*, images.name as imagename, categories.name as catname')
    //     ->join('images', 'products.id = images.product_id', 'left')
    //     ->join('categories', 'products.category_id = categories.id', 'left')
    //     ->join('subcategories', 'products.subcategory_id = subcategories.id', 'left')
    //     ->orderBy('products.id', 'desc')
    //     ->findAll();
    //     // dd($product);

    //     return view('Layouts/image-card.php', ['product' => $product]);
    // }
    // ..................................

    public function product_show()
    {
        $pmodel = new ProductModel();

        $product = $pmodel->select('products.*, images.name as imagename, categories.name as catname')
            ->join('images', 'products.id = images.product_id', 'left')
            ->join('categories', 'products.category_id = categories.id', 'left')
            ->join('subcategories', 'products.subcategory_id = subcategories.id', 'left')
            ->orderBy('products.id', 'desc')
            ->findAll();

        return view('allproduct.php', ['product' => $product]);
        // return view('Layouts/image-card.php', ['product' => $product]);
    }
    public function singalpost($id)
    {
        $pmodel = new ProductModel();

        $product = $pmodel->select('products.*, images.name as imagename, categories.name as catname')
            ->join('images', 'products.id = images.product_id', 'left')
            ->join('categories', 'products.category_id = categories.id', 'left')
            ->join('subcategories', 'products.subcategory_id = subcategories.id', 'left')
            ->where('products.id', $id)
            ->orderBy('products.id', 'desc')
            ->findAll();
            // dd($product);

        return view('singale', ['product' => $product]);
        // return view('Layouts/image-card.php', ['product' => $product]);
    }
}
