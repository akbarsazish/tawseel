<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BusinessesModel;

class Mydashboard extends BaseController
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
        
        if (!$this->request->isAJAX() && $this->request->getUri()->getSegment(2))
        {
            echo view('nallowed');exit;
        }
        if(!login())
        {
            return redirect()->to('home');   
        }
    }

    public function index()
    {
        if(login()) 
        {   
            return view('mydashboard/home');
        }

        return redirect()->to('login');
    }

    public function myprofile()
    {
        $userId = session()->get('user_id');

        $user = $this->userModel->find($userId);

        $data['record'] = $user;

        return view('mydashboard/myprofile', $data);
    }
        
    public function profile_edit()
    {
        $userId = session()->get('user_id');

        $user = $this->userModel->find($userId);

        $data['record'] = $user;

        return view('mydashboard/myprofile_edit', $data);
    }        

    public function profile_update()
    {
        $userId = session()->get('user_id');

        $data = [
            'fullname'      => $this->request->getPost('fullname'),
            'email'         => $this->request->getPost('email'),
            'phone'         => $this->request->getPost('phone'),
            'province'      => $this->request->getPost('province'),
            'city'          => $this->request->getPost('city'),
            'way'           => $this->request->getPost('way'),
            'address_line_1' => $this->request->getPost('address_line_1'),
            'address_line_2' => $this->request->getPost('address_line_2'),
            'location'      => $this->request->getPost('location'),
            'latitude'      => $this->request->getPost('latitude'),
            'longitude'     => $this->request->getPost('longitude'),
        ];
        try {
            if ($this->userModel->update($userId, $data)) 
            {
                session()->setFlashdata('success', lang('app.your_profile_updated_successfully'));
                $userId = session()->get('user_id');
                $user = $this->userModel->find($userId);
                $data['record'] = $user;
                return view('mydashboard/myprofile', $data);
            } 
            else 
            {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => lang('app.record_update_failed')
                ]);
            }
        } 
        catch (\Exception $e) 
        {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function view()
    {
        $data['record'] = $this->businessesModel->where('pid',session()->get('user_id'))->find();
        return view('mybusiness/view', $data);
    }


}
