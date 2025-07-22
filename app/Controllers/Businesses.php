<?php

namespace App\Controllers;

use App\Models\BusinessesModel;
use App\Models\UserModel;

class Businesses extends BaseController
{
    protected $userModel;
    protected $businessesModel;
    protected $request;

    public function __construct()
    {
        helper('app');
        $this->userModel = new UserModel();
        $this->businessesModel = new BusinessesModel();
        $this->request = \Config\Services::request();

        if (!login() || !$this->request->isAJAX())
        {
            echo view('nallowed');
            exit;
        }
    }

    public function all()
    {
        if($this->request->getPost('search'))
        {
            $search_term = $this->request->getPost('search');    
        }
        else
        {
            $search_term = $this->request->getGet('search');
        }

        $perPage = 20; // Number of items per page
        $currentPage = $this->request->getGet('page') ?? 1; // Get current page from URL
        
        // Build query with optional search
            if (!empty($search_term)) 
            {
                $this->businessesModel->groupStart()
                    ->like('cr_number', $search_term)
                    ->orLike('cr_name_en', $search_term)
                    ->orLike('cr_name_ar', $search_term)
                    ->orLike('created_at', $search_term)
                    ->orLike('id_first_name', $search_term)
                    ->orLike('id_number', $search_term)
                    ->orLike('id_second_name', $search_term)
                    ->orLike('id_date_of_birth', $search_term)
                    ->orLike('id_third_name', $search_term)
                    ->orLike('id_sur_name', $search_term)
                    ->orLike('id_address', $search_term)
                    ->orLike('cr_email', $search_term)
                    ->orLike('cr_gsm', $search_term)
                    ->orLike('cr_po_box', $search_term)
                    ->orLike('cr_postal_code', $search_term)
                    ->orLike('cr_fax', $search_term)
                    ->orLike('cr_establishment_date', $search_term)
                    ->orLike('cr_legal_type', $search_term)
                    ->orLike('cr_expiry_date', $search_term)
                    ->orLike('cr_head_quarter', $search_term)
                    ->orLike('cc_cr_number', $search_term)
                    ->orLike('cc_head_quarter', $search_term)
                    ->orLike('cc_occi_number', $search_term)
                    ->orLike('cc_expire_date', $search_term)
                    ->orLike('ta_governorate', $search_term)
                    ->orLike('ta_complex_no', $search_term)
                    ->orLike('ta_state', $search_term)
                    ->orLike('ta_plot_no', $search_term)
                    ->orLike('ta_area', $search_term)
                    ->orLike('ta_building_no', $search_term)
                    ->orLike('ta_street_name_no', $search_term)
                    ->orLike('ta_flat_shop_no', $search_term)
                    ->orLike('ta_way_no', $search_term)
                    ->orLike('ta_type_of_activity', $search_term)
                    ->orLike('ta_rent_contract_no', $search_term)
                    ->orLike('ta_expire_date', $search_term)
                    ->orLike('lc_cr_number', $search_term)
                    ->orLike('lc_governorate', $search_term)
                    ->orLike('lc_rent_contract_no', $search_term)
                    ->orLike('lc_state', $search_term)
                    ->orLike('lc_poa_code', $search_term)
                    ->orLike('lc_area', $search_term)
                    ->orLike('lc_license_type', $search_term)
                    ->orLike('lc_license_name', $search_term)
                    ->orLike('lc_license_number', $search_term)
                    ->orLike('lc_expire_date', $search_term)
                    ->orLike('lc_activities_code', $search_term)
                    ->orLike('lc_activities_description', $search_term)
                    ->orLike('tcc_cr_number', $search_term)
                    ->orLike('tcc_tax_card_number', $search_term)
                    ->orLike('tcc_tin', $search_term)
                    ->orLike('tcc_expire_date', $search_term)
                    ->orLike('vc_cr_number', $search_term)
                    ->orLike('vc_vat_certificate_number', $search_term)
                    ->orLike('vc_vatin', $search_term)
                    ->orLike('vc_expire_date', $search_term)
                    ->groupEnd();
            }

        // Get total count for pagination
        $totalItems = $this->businessesModel->countAllResults(false); // false to keep previous conditions
        
        // Calculate total pages
        $totalPages = ceil($totalItems / $perPage);
        
        // Get paginated results
        $offset = ($currentPage - 1) * $perPage;
        $data['businesses'] = $this->businessesModel->orderBy('created_at', 'DESC')->findAll($perPage, $offset);

        // Pass pagination data to view
        $data['pagination'] = [
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total_items' => $totalItems,
            'has_previous' => $currentPage > 1,
            'has_next' => $currentPage < $totalPages,
        ];

        // Pass search term to view
        $data['search_term'] = $search_term;

        return view('businesses/all', $data);
    }

    public function view($id)
    {
        $id = dec($id);
        $data['form'] = $this->request->getGet('form');
        $data['record'] = $this->businessesModel->find($id);
        return view('businesses/view', $data);
    }

    public function edit($form,$id)
    {
        $id = dec($id);
        $data['record'] = $this->businessesModel->find($id);
        return view('businesses/'.$form, $data);
    }

    public function update($form,$id)
    {
        $id = dec($id);
        $file = $this->request->getFile($form.'_document');
        $data = $this->request->getPost();

        if ($file && $file->isValid() && !$file->hasMoved()) 
        {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/documents', $newName);
            $data[$form.'_document'] = $newName;
            
            if (!empty($this->request->getPost('old_'.$form.'_document'))) 
            {
                @unlink(WRITEPATH . 'uploads/documents/' . $this->request->getPost('old_'.$form.'_document'));
            }
        }

        try {
            if ($this->businessesModel->update($id, $data)) 
            {
                session()->setFlashdata('success', lang('app.record_updated_successfully'));
            }
            else 
            {
                session()->setFlashdata('error', lang('app.record_update_failed'));
            }
        } 
        catch (\Exception $e) 
        {
            session()->setFlashdata('error', $e->getMessage());
        }
        $data['form'] = $form;
        $data['record'] = $this->businessesModel->find($id);
        return view('businesses/view', $data);

    }

    public function type($type)
    {
        $data['search_term'] = '';
        if ($this->request->getGet('search')) 
        {
            $data['search_term'] = $this->request->getGet('search');
        }
        if ($this->request->getPost('search')) 
        {
            $data['search_term'] = $this->request->getPost('search');
        }

        $perPage = 20; 
        // Number of items per page
        $currentPage = $this->request->getGet('page') ?? 1; 
        // Get current page from URL

        // Build query with optional search
        if (!empty($data['search_term'])) 
        {
            $this->businessesModel->groupStart()
                ->like('cr_number', $data['search_term'])
                ->orLike('cr_name_en', $data['search_term'])
                ->orLike('cr_name_ar', $data['search_term'])
                ->groupEnd();
        }

        // Join with users and filter for eco type
        $this->businessesModel->select('businesses.*, users.type')
            ->join('users', 'businesses.pid = users.id')
            ->where('users.type', $type)->orWhere('users.sub_type', $type)->orWhere('users.logistics_type', $type)
            ->orderBy('businesses.created_at', 'DESC');

        // Get total count for pagination
        $totalItems = $this->businessesModel->countAllResults(false);
         // false to keep previous conditions

        // Calculate total pages
        $totalPages = ceil($totalItems / $perPage);

        // Get paginated results
        $offset = ($currentPage - 1) * $perPage;
        $data['businesses'] = $this->businessesModel->findAll($perPage, $offset);

        // Pass pagination data to view
        $data['pagination'] = [
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total_items' => $totalItems,
            'has_previous' => $currentPage > 1,
            'has_next' => $currentPage < $totalPages,
        ];

        // Pass search term to view
        $data['type'] = $type;

        return view('businesses/type', $data);
    }

}