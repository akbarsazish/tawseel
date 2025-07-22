<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BusinessesModel;

class MyBusiness extends BaseController
{
    protected $userModel;
    protected $businessesModel;

    public function __construct()
    {
        helper('app');
        
        $this->userModel = new UserModel();
        $this->businessesModel = new BusinessesModel();
        $request = \Config\Services::request();

        if (!login() || !$request->isAJAX())
        {
            return "<script>location.reload();</script>";
        }
    }

    public function create()
    {
        $userId = session()->get('user_id');
        $data['record'] = $this->userModel->find($userId);

        return view('mybusiness/create', $data);
    }

    public function upgrade()
    {
        $id = session()->get('user_id');
        $data = $this->request->getPost();

        if ($this->userModel->update($id, $data)) 
        {
            session()->setFlashdata('success', lang('app.account_upgraded_from_personal_to_business'));

            // Return a script for redirection
            return $this->response->setContentType('application/javascript')->setBody("window.location.href = 'business/registration';");
        } 
        else 
        {
            session()->setFlashdata('error', lang('app.account_upgrade_failed'));

            // Return a script to reload the page
            return $this->response->setContentType('application/javascript')->setBody("location.reload();");
        }
    }

}