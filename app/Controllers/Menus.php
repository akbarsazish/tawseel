<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\MenuItemModel;

class Menus extends BaseController
{
    public function __construct(){
        helper('app');
         $request = \Config\Services::request();

        if (!login() || !$request->isAJAX())
        {
            return "<script>location.reload();</script>";
        }
    }

    public function index()
    {
        $model = new MenuModel();
        $data['menus'] = $model->findAll();
        return view('menus/index', $data);
    }

    public function create(){
        return view('menus/create');
    }

    public function store(){
        $model = new MenuModel();

        $data = [
            'title_en' => $this->request->getPost('title_en'),
            'title_ar' => $this->request->getPost('title_ar'),
        ];

        if (!$model->save($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/menus')->with('success', 'Menu created successfully');
    }


    public function edit($id){
        $id = dec($id);
        $model = new MenuModel();
        $data['menu'] = $model->find($id);
        return view('menus/edit', $data);
    }


    public function update($id){
         $id = dec($id);
        $model = new MenuModel();

        $data = [
            'title_en' => $this->request->getPost('title_en'),
            'title_ar' => $this->request->getPost('title_ar'),
        ];

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/menus')->with('success', 'Menu updated successfully');
    }


    public function delete($id){
        $id = dec($id);
        $model = new MenuModel();
        $model->delete($id);
        return redirect()->to('/menus')->with('success', 'Menu deleted successfully');
    }
    
}