<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\MenuItemModel;

class MenuItems extends BaseController
{
    public function __construct(){
        helper('app');
         $request = \Config\Services::request();

        if (!login() || !$request->isAJAX())
        {
            return "<script>location.reload();</script>";
        }
    }

    public function index($menu_id){
        $menu_id = dec($menu_id);
        $menuModel = new MenuModel();
        $itemModel = new MenuItemModel();
        
        $data['menu'] = $menuModel->find($menu_id);
        $data['items'] = $itemModel->where('menu_id', $menu_id)->orderBy('order', 'asc')->findAll();
        
        return view('menuItem/index', $data);
    }

    public function create($menu_id){
        $menu_id = dec($menu_id);
        $menuModel = new MenuModel();
        $data['menu'] = $menuModel->find($menu_id);
        return view('menuItem/create', $data);
    }

    public function store($menu_id){
        $menu_id = dec($menu_id);
        $model = new MenuItemModel();
        $model->save([
            'menu_id' => $menu_id,
            'title_en' => $this->request->getPost('title_en'),
            'title_ar' => $this->request->getPost('title_ar'),
            'url' => $this->request->getPost('url'),
            'order' => $this->request->getPost('order')
        ]);
        return redirect()->to("/menus/" . enc($menu_id) . "/items")->with('success', 'Menu item created successfully');

    }

    public function edit($menu_id, $id){
        $menu_id=dec($menu_id);
        $id = dec($id);
        $model = new MenuItemModel();
        $menuModel = new MenuModel();
        
        $data['item'] = $model->find($id);
        $data['menu'] = $menuModel->find($menu_id);
        
        return view('menuItem/edit', $data);
    }

    public function update($menu_id, $id){
        $menu_id = dec($menu_id);
        $id = dec($id);

        $model = new MenuItemModel();
        $model->update($id, [
            'title_en' => $this->request->getPost('title_en'),
            'title_ar' => $this->request->getPost('title_ar'),
            'url' => $this->request->getPost('url'),
            'order' => $this->request->getPost('order')
        ]);
        return redirect()->to("/menus/" . enc($menu_id) . "/items")->with('success', 'Menu item updated successfully');
    }

    public function delete($menu_id, $id){
        $menu_id = dec($menu_id);
        $id = dec($id);

        $model = new MenuItemModel();
        $model->delete($id);
        return redirect()->to("/menus/" . enc($menu_id) . "/items")->with('success', 'Menu item deleted successfully');
    }
}