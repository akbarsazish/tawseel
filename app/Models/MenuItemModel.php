<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuItemModel extends Model
{
    protected $table = 'menu_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['menu_id', 'title_en', 'title_ar', 'url', 'order'];
    protected $useTimestamps = true;
}