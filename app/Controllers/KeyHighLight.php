<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\KeyHighlightModel;

class KeyHighLight extends BaseController{
    protected $KeyHighlightModel;

    public function __construct(){
        $this->KeyHighlightModel = new KeyHighlightModel();
        helper('app');
        helper('form');
         $request = \Config\Services::request();

        if (!login() || !$request->isAJAX())
        {
            return "<script>location.reload();</script>";
        }
    }

    public function index(){
        $highLights = $this->KeyHighlightModel->first();
        return view('keyHighlight/index', ['highLights' => $highLights]);
    }
    

    public function create(){
        return view('keyHighlight/create');
    }

    public function save(){
        $rules = [
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'subtitle_en' => 'required|max_length[255]',
            'subtitle_ar' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->KeyHighlightModel->save([
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'subtitle_en' => $this->request->getVar('subtitle_en'),
            'subtitle_ar' => $this->request->getVar('subtitle_ar'),
        ]);

        session()->setFlashdata('success', lang('app.record_added_successfully'));
        return redirect()->to('/keyhighlight');
    }


    public function edit($id){
        $id = dec($id);
        $data = $this->KeyHighlightModel->getHighlightInfo($id);
        return view('keyHighlight/edit', ['keyHightlight' => $data]);
    }

    public function update($id){
        $id = dec($id);
        $rules = [
            'title_en' => 'required|max_length[255]',
            'title_ar' => 'required|max_length[255]',
            'subtitle_en' => 'required|max_length[255]',
            'subtitle_ar' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->KeyHighlightModel->save([
            'id'=>$id,
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'subtitle_en' => $this->request->getVar('subtitle_en'),
            'subtitle_ar' => $this->request->getVar('subtitle_ar'),
        ]);
        session()->setFlashdata('success', lang('app.record_updated_successfully'));
        return redirect()->to('/keyhighlight');
    }


    public function show($id){
        $id = dec($id);
        $data = $this->KeyHighlightModel->getHighlightInfo($id);
        return view('keyHighlight/show', ['keyHighlight' => $data]);
    }

     
    public function delete($id){
        $id = dec($id);
        $keyHighlight = $this->KeyHighlightModel->find($id);
        
        if ($keyHighlight) {
            $this->KeyHighlightModel->delete($id);
            
            session()->setFlashdata('success', lang('app.record_deleted_successfully'));
            return redirect()->to('/keyhighlight');
        }

        return $this->respond([
            'status' => 'error',
            'message' => 'No home information to delete'
        ], 404);
    }



}