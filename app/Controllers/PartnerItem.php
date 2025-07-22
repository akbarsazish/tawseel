<?php namespace App\Controllers;

use App\Models\PartnershipItemModel;
use App\Models\PartnershipModel;
use CodeIgniter\Controller;

class PartnerItem extends Controller
{
    protected $uploadPath = WRITEPATH . 'uploads/partnership/';

    public function __construct()
    {
        helper('form');
        helper('app');
        $this->model = new PartnershipItemModel();
        $this->partnershipModel = new PartnershipModel();

         $request = \Config\Services::request();
          if (!login() || !$request->isAJAX()){
            return "<script>location.reload();</script>";
        }
    }

    // Index: List all items
    public function index()
    {
        $data['items'] = $this->model->findAll();
        return view('partnershipitem/index', $data);
    }

    // Create Form
    public function create()
    {
        $data['partnerships'] = $this->partnershipModel->findAll();
        return view('partnershipitem/create', $data);
    }

    // Store Item
    public function save()
    {
        $rules = [
            'partnership_id' => 'required|numeric',
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost([
            'partnership_id', 'title_en', 'title_ar', 'description_en', 'description_ar'
        ]);

        // Insert to get ID first
        $itemId = $this->model->insert($data);

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            // Create directory if not exists
            if (!is_dir($this->uploadPath)) {
                mkdir($this->uploadPath, 0777, true);
            }

            $newName = "item_{$itemId}." . $image->getExtension();
            $image->move($this->uploadPath, $newName);
        }

        return redirect()->to('/partnershipitem')->with('success', 'Item created successfully');
    }


    
    public function show($id){
        $id = dec($id);
        $data = $this->model->find($id);
        return view('partnershipitem/show', ['partner' => $data]);
    }

    // Edit Form
    public function edit($id) {
        $id = dec($id);
        $data = [
            'item' => $this->model->find($id),
            'partnerships' => $this->partnershipModel->findAll()
        ];
        return view('partnershipitem/edit', $data);
    }

    // Update Item
    public function update($id)
    {
        $rules = [
            'partnership_id' => 'required|numeric',
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image' => 'max_size[image,2048]|is_image[image]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost([
            'partnership_id', 'title_en', 'title_ar', 'description_en', 'description_ar'
        ]);

        $this->model->update($id, $data);

        // Handle image update
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Delete old image if exists
            $oldFiles = glob($this->uploadPath . "item_{$id}.*");
            foreach ($oldFiles as $file) {
                if (is_file($file)) unlink($file);
            }

            // Upload new image
            $newName = "item_{$id}." . $image->getExtension();
            $image->move($this->uploadPath, $newName);
        }

        return redirect()->to('/partnershipitem')->with('success', 'Item updated successfully');
    }

    // Delete Item
    public function delete($id){
        $id=dec($id);
        // Delete image files
        $files = glob($this->uploadPath . "item_{$id}.*");
        foreach ($files as $file) {
            if (is_file($file)) unlink($file);
        }

        $this->model->delete($id);
        return redirect()->to('/partnershipitem')->with('success', 'Item deleted successfully');
    }

}