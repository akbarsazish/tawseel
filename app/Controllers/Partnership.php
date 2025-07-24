<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\PartnershipModel;
use App\Models\PartnershipItemModel;
use App\Models\MenuModel;
use App\Models\MenuItemModel;

class Partnership extends BaseController {
    protected $Partnership;
    protected $MenuModel;
    protected $MenuItemModel;
    
    public function __construct(){
        $this->PartnershipModel = new PartnershipModel();
        $this->partnershipItemModel = new PartnershipItemModel();
        $this->MenuModel = new MenuModel();
        $this->MenuItemModel = new MenuItemModel();

        helper('app');
        helper('form');
         $request = \Config\Services::request();

        if (!login() || !$request->isAJAX()){
            return "<script>location.reload();</script>";
        }
    }

    public function index(){
        $partnerships = $this->PartnershipModel->first();
        return view('partnership/index', ['partnerships' => $partnerships]);
    }


    public function allPartner(){
        $partnerships = $this->PartnershipModel->first();
         $items = $this->partnershipItemModel->findAll();
                  // Fetch menus by title (use 'title_en', or by 'id')
        $legalInfo    = $this->MenuModel->where('title_en', 'Legal Information')->first();
        $services     = $this->MenuModel->where('title_en', 'Services')->first();
        $links        = $this->MenuModel->where('title_en', 'Links')->first();

        // Fetch their menu items
        $data['legalItems']  = $legalInfo ? 
            $this->MenuItemModel->where('menu_id', $legalInfo['id'])->orderBy('order', 'asc')->findAll() : [];
        $data['serviceItems'] = $services ?
            $this->MenuItemModel->where('menu_id', $services['id'])->orderBy('order', 'asc')->findAll() : [];
        $data['linkItems']   = $links ?
            $this->MenuItemModel->where('menu_id', $links['id'])->orderBy('order', 'asc')->findAll() : [];


        return view('partnership/allpartner', [
            'partnerships' => $partnerships, 'items' => $items,
            'legalItems' => $data['legalItems'],
            'serviceItems' => $data['serviceItems'],
            'linkItems' => $data['linkItems'],
        ]);
    }


    public function create(){
        return view('partnership/create');
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

        $this->PartnershipModel->save([
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'subtitle_en' => $this->request->getVar('subtitle_en'),
            'subtitle_ar' => $this->request->getVar('subtitle_ar'),
        ]);

        session()->setFlashdata('success', lang('app.record_added_successfully'));
        return redirect()->to('/partnership');
    }


    public function edit($id){
        $id = dec($id);
        $data = $this->PartnershipModel->getPartnershipInfo($id);
        return view('partnership/edit', ['parnership' => $data]);
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

        $this->PartnershipModel->save([
            'id'=>$id,
            'title_en' => $this->request->getVar('title_en'),
            'title_ar' => $this->request->getVar('title_ar'),
            'subtitle_en' => $this->request->getVar('subtitle_en'),
            'subtitle_ar' => $this->request->getVar('subtitle_ar'),
        ]);
        session()->setFlashdata('success', lang('app.record_updated_successfully'));
        return redirect()->to('/partnership');
    }


    public function show($id){
        $id = dec($id);
        $data = $this->PartnershipModel->getPartnershipInfo($id);
        return view('keyHighlight/show', ['keyHighlight' => $data]);
    }

     
    public function delete($id){
        $id = dec($id);
        $keyHighlight = $this->PartnershipModel->find($id);
        
        if ($keyHighlight) {
            $this->PartnershipModel->delete($id);
            
            session()->setFlashdata('success', lang('app.record_deleted_successfully'));
            return redirect()->to('/partnership');
        }

        return $this->respond([
            'status' => 'error',
            'message' => 'No home information to delete'
        ], 404);
    }


}