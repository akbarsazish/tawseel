<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\HomeInfoModel;

class HomeInfo extends BaseController
{
    protected $homeInfoModel;

    public function __construct(){
        $this->homeInfoModel = new HomeInfoModel();
        helper('app');
        helper('form');
         $request = \Config\Services::request();

        if (!login() || !$request->isAJAX())
        {
            return "<script>location.reload();</script>";
        }
    }

    public function index(){
        $result = $this->homeInfoModel->get();
        $homeInfos = $result->getResultArray();
        return view('homeinfo/index', ['homeInfos' => $homeInfos]);
    }
    
    public function create(){
        return view('homeinfo/create');
    }

    public function save(){
        $rules = [
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'title2_en' => 'required|max_length[255]',
            'title2_ar' => 'required|max_length[255]',
            'description_en' => 'required',
            'description_ar' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->homeInfoModel->save([
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'title2_en' => $this->request->getVar('title2_en'),
            'title2_ar' => $this->request->getVar('title2_ar'),
            'description_en' => $this->request->getVar('description_en'),
            'description_ar' => $this->request->getVar('description_ar'),
        ]);

        session()->setFlashdata('success', lang('app.record_added_successfully'));
        return redirect()->to('/homeinfo');
    }


    public function edit($id){
        $id = dec($id);
        $data = $this->homeInfoModel->getHomeInfo($id);
        return view('homeinfo/edit', ['homeInfo' => $data]);
    }

    public function update($id){
        $id = dec($id);
        $rules = [
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'title2_en' => 'required|max_length[255]',
            'title2_ar' => 'required|max_length[255]',
            'description_en' => 'required',
            'description_ar' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->homeInfoModel->save([
            'id'=>$id,
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'title2_en' => $this->request->getVar('title2_en'),
            'title2_ar' => $this->request->getVar('title2_ar'),
            'description_en' => $this->request->getVar('description_en'),
            'description_ar' => $this->request->getVar('description_ar'),
        ]);
        session()->setFlashdata('success', lang('app.record_updated_successfully'));
        return redirect()->to('/homeinfo');
    }


    public function show($id){
        $id = dec($id);
        $data = $this->homeInfoModel->getHomeInfo($id);
        return view('homeinfo/show', ['homeInfo' => $data]);
    }

     
    public function delete($id){
        $id = dec($id);
        $homeInfo = $this->homeInfoModel->find($id);
        
        if ($homeInfo) {
            $this->homeInfoModel->delete($id);
            session()->setFlashdata('success', lang('app.record_deleted_successfully'));
            return redirect()->to('/homeinfo');
        }

        

        return $this->respond([
            'status' => 'error',
            'message' => 'No home information to delete'
        ], 404);
    }


    
}