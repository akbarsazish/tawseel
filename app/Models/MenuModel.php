<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title_en', 'title_ar'];
    protected $useTimestamps = true;

    public function getMenuWithItems($id){
        return $this->db->table('menus')
            ->select('menus.*, menu_items.id as item_id, menu_items.title as item_title, menu_items.url, menu_items.order')
            ->join('menu_items', 'menu_items.menu_id = menus.id', 'left')
            ->where('menus.id', $id)
            ->orderBy('menu_items.order', 'asc')
            ->get()
            ->getResult();
    }
}