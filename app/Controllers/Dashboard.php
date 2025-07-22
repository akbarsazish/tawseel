<?php

namespace App\Controllers;
use App\Models\BusinessesModel;
use App\Models\UserModel;
use App\Models\AgreementModel;
use App\Models\AgreementTempModel;

class Dashboard extends BaseController
{
    protected $businessesModel;
    protected $userModel;
    protected $AgreementModel;
    protected $AgreementTempModel;
    protected $request;

    public function __construct()
    {
        helper('app');
        $this->businessesModel = new BusinessesModel();
        $this->AgreementModel = new AgreementModel();
        $this->AgreementTempModel = new AgreementTempModel();
        $this->userModel = new UserModel();
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
            // Users by type
            $users = $this->userModel->select('type, COUNT(*) as count')
                        ->groupBy('type')
                        ->where('type IN ("personal", "eCommerce", "logistics")')
                        ->get()
                        ->getResultArray();

            // Users by sub-type
            $users_sub = $this->userModel->select('sub_type, COUNT(*) as count')
                        ->groupBy('sub_type')
                        ->where('sub_type IN ("b2b", "b2c", "c2c", "1pl", "2pl", "34pl")')
                        ->orderBy('sub_type')
                        ->get()
                        ->getResultArray();

            // Monthly registrations (fixed query)
            $currentYear = date('Y');
            $users_reg = $this->userModel->select("DATE_FORMAT(created_at, '%M') as month, COUNT(*) as count")
            ->where('YEAR(created_at)', $currentYear)
            ->groupBy(["DATE_FORMAT(created_at, '%M')", "MONTH(created_at)"])
            ->orderBy("MONTH(created_at)")
            ->get()
            ->getResultArray();

            $data = [
                'users' => $users,
                'users_sub' => $users_sub,
                'users_reg' => $users_reg
            ];
            
            return view('dashboard/home',$data);
        }

        return redirect()->to('login');
    }

    public function users($type='')
    {
        $userModel = new UserModel();
        // Handle search term (both POST and GET)
        if($this->request->getPost('search')) 
        {
            $search_term = $this->request->getPost('search');    
        } 
        else 
        {
            $search_term = $this->request->getGet('search');
        }

        $perPage = 20; // Number of items per page
        $currentPage = $this->request->getGet('page') ?? 1;

        // Build query with optional search
       if (!empty($search_term)) 
       {
            $userModel->groupStart()
                ->like('email', $search_term)
                ->orLike('phone', $search_term)
                ->orLike('fullname', $search_term)
                ->orLike('address_line_1', $search_term)
                ->orLike('address_line_2', $search_term)
                ->orLike('way', $search_term)
                ->orLike('country', $search_term)
                ->orLike('province', $search_term)
                ->orLike('state', $search_term)
                ->orLike('city', $search_term)
                ->orLike('location', $search_term)
                ->orLike('cr', $search_term)
                ->groupEnd();
        }

        if($type)
        {
            $userModel = $userModel->where('type',$type)->orWhere('sub_type', $type)->orWhere('logistics_type', $type);
        }

        // Get total count for pagination
        $totalItems = $userModel->countAllResults(false);

        // Calculate total pages
        $totalPages = ceil($totalItems / $perPage);
        // Get paginated results
        $offset = ($currentPage - 1) * $perPage;
        $data['users'] = $userModel->orderBy('created_at', 'DESC')->findAll($perPage, $offset);

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

        return view('dashboard/users', $data);
    }

    public function users_profile($user_id)
    {
        $userId = dec($user_id);

        $user = $this->userModel->find($userId);

        $data['record'] = $user;

        return view('dashboard/users_profile', $data);
    }    

    public function users_edit($user_id)
    {
        $userId = dec($user_id);

        $user = $this->userModel->find($userId);

        $data['record'] = $user;

        return view('dashboard/users_edit', $data);
    }

    public function users_update($user_id)
    {
        $userId = dec($user_id);
        $password = $this->request->getPost('password');
        
        // Get all post data
        $postData = $this->request->getPost();
        
        // Prepare update data - ensure no arrays are passed directly
        $updateData = [];
        
        // Handle password separately
        if ($password) {
            if (strlen($password) < 8) {
                session()->setFlashdata('error', lang('app.long_password'));
                $user = $this->userModel->find($userId);
                return view('dashboard/users_profile', ['record' => $user, 'errors' => ['password' => lang('app.long_password')]]);
            }
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        
        // Copy other fields (excluding password if empty)
        foreach ($postData as $key => $value) {
            if ($key !== 'password' && !is_array($value)) {
                $updateData[$key] = $value;
            }
        }
        
        $role = implode(',', $this->request->getPost('role'));
        $updateData ['role'] = $role;
        
        try {
            // Use the builder syntax that works in both CI4 versions
            $result = $this->userModel->where('id', $userId)->set($updateData)->update();
            
            if ($result) {
                session()->setFlashdata('success', lang('app.record_updated_successfully'));
            } else {
                session()->setFlashdata('error', lang('app.record_update_failed'));
            }
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }
        
        // Get updated user data
        $user = $this->userModel->find($userId);
        
        // Return to the profile view with all necessary data
        return view('dashboard/users_profile', ['record' => $user]);
    }        

    public function agreement_temp()
    {
        $records = $this->AgreementTempModel->orderBy('id', 'DESC')->find();
        return view('dashboard/agreement_list',['records' => $records]);
    }

    public function agreement_create($sub_type)
    {
        $sub_type = dec($sub_type);
        $lastRecord = $this->AgreementTempModel->where('sub_type',$sub_type)->orderBy('id', 'DESC')->first();
        if($lastRecord)
        {
            $newVersion = (int)$lastRecord['version'] + 1;
        }
        else
        {
            $lastRecord = $this->AgreementTempModel->orderBy('id', 'DESC')->first();
            $newVersion = 1; // Default version
        }
        
        $lastRecord['version'] = $newVersion;
        $lastRecord['sub_type'] = $sub_type;
        $this->AgreementTempModel->insert($lastRecord);
        $lastRecord = $this->AgreementTempModel->orderBy('id', 'DESC')->first();

        return view('dashboard/agreement_temp',['record' => $lastRecord]);
    }

    public function agreement_view($id)
    {
        $id = dec($id);
        $record = $this->AgreementTempModel->find($id);

        return view('dashboard/agreement_temp',['record' => $record]);
    }

    public function agreement_del($id)
    {
        $id = dec($id);
        $this->AgreementTempModel->delete($id);
        session()->setFlashdata('success',true);
        
        return $this->agreement_temp();
    }
    
    public function agreement_list($pid)
    {
        $dpid = dec($pid);
        $agreement = $this->AgreementModel->where('pid', $dpid)->find();
        if($agreement)
        {
            $record = $this->businessesModel
            ->join('agreements', 'agreements.pid = businesses.id')
            ->where('businesses.id', $dpid)
            ->first();
            
            return view('dashboard/agreement_assigned',['record' => $record]);
        }
        else
        {
            $brecord = $this->businessesModel->find($dpid);
            $urecord = $this->userModel->find($brecord['pid']);
            if($urecord['sub_type'] == '1pl' && $urecord['logistics_type'] == 'corporation')
            {
                $sub_type = '1plc';
            }
            elseif($urecord['sub_type'] == '1pl' && $urecord['logistics_type'] == 'individual')
            {
                $sub_type = '1plc';
            }
            else
            {
                $sub_type = $urecord['sub_type'];
            }
            $records = $this->AgreementTempModel->where('sub_type',$sub_type)->orderBy('id', 'DESC')->find();
            return view('dashboard/agreement_list_for_assgin',['records' => $records, 'pid' => $pid]);
        }
    }    

    public function agreement_assign($id, $pid)
    {
        $id = dec($id);
        $pid = dec($pid);

        $record = $this->AgreementTempModel->find($id);
        $record = array_slice($record, 1, -3); 
        $record['pid'] = $pid;
        $this->AgreementModel->insert($record);
        session()->setFlashdata('success', lang('app.agreement_assigned_successfully'));
        
        $record = $this->businessesModel
            ->join('agreements', 'agreements.pid = businesses.id')
            ->where('businesses.id', $pid)
            ->first();
        return view('dashboard/agreement_assigned',['record' => $record]);
    }

}
