<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\HighlightItemModel;

class HighLightItem extends BaseController
{
    protected $highlightItemModel;

    public function __construct(){
        $this->highlightItemModel = new HighlightItemModel();
        helper('app');
        helper('form');
         $request = \Config\Services::request();

        if (!login() || !$request->isAJAX())
        {
            return "<script>location.reload();</script>";
        }
    }

    public function index(){
        $result = $this->highlightItemModel->get();
        $highlightItems = $result->getResultArray();
        return view('highlightItem/index', ['highlightItems' => $highlightItems]);
    }
    
    public function create(){
        return view('highlightItem/create');
    }

    public function save(){
        $rules = [
            'icon' => 'required',
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'description_en' => 'required',
            'description_ar' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->highlightItemModel->save([
            'icon' => $this->request->getVar('icon'),
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'description_en' => $this->request->getVar('description_en'),
            'description_ar' => $this->request->getVar('description_ar'),
        ]);

        session()->setFlashdata('success', lang('app.record_added_successfully'));
        return redirect()->to('/highlightitems');
    }


    public function edit($id){
        $id = dec($id);
        $data = $this->highlightItemModel->getHighlightItem($id);
        return view('highlightItem/edit', ['highlightItem' => $data]);
    }

    public function update($id){
        $id = dec($id);
        $rules = [
            'icon' => 'required',
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'description_en' => 'required',
            'description_ar' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->highlightItemModel->save([
            'id'=>$id,
            'icon' => $this->request->getVar('icon'),
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'description_en' => $this->request->getVar('description_en'),
            'description_ar' => $this->request->getVar('description_ar'),
        ]);
        session()->setFlashdata('success', lang('app.record_updated_successfully'));
        return redirect()->to('highlightitems');
    }


    public function show($id){
        $id = dec($id);
        $data = $this->highlightItemModel->getHighlightItem($id);
        return view('highlightItem/show', ['highlightItem' => $data]);
    }

     
    public function delete($id){
        $id = dec($id);
        $highlightItme = $this->highlightItemModel->find($id);
        
        if ($highlightItme) {
            $this->highlightItemModel->delete($id);
            session()->setFlashdata('success', lang('app.record_deleted_successfully'));
            return redirect()->to('/highlightitems');
        }

        return $this->respond([
            'status' => 'error',
            'message' => 'No home information to delete'
        ], 404);
    }


    
}