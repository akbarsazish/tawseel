<?php namespace App\Controllers;
use App\Models\SiteInfoModel;
use CodeIgniter\API\ResponseTrait;
class SiteInfo extends BaseController
{

    use ResponseTrait;
    protected $model;
    protected $siteInfoModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        helper('app');
        $this->siteInfoModel = new SiteInfoModel();

        $request = \Config\Services::request();

        if (auth('admin') && $request->isAJAX()) {
            
        }else {
            return "<script>location.reload();</script>";
        }
    }
    

    public function index(){
        $siteInfo = $this->siteInfoModel->first();
        
        return view('siteinfo/index', ['siteInfo' => $siteInfo]);
    }
    
    
    public function create(){
        return view('siteinfo/create');
    }


    public function save(){
        $rules = [
            'facebook' => 'permit_empty|valid_url',
            'instagram' => 'permit_empty|valid_url',
            'twitter' => 'permit_empty|valid_url',
            'youtube' => 'permit_empty|valid_url',
            'linkedin' => 'permit_empty|valid_url',
            'email' => 'permit_empty|valid_email',
            'phone' => 'permit_empty|string|max_length[20]',
            'address_ar' => 'permit_empty|string',
            'address_en' => 'permit_empty|string',
            'location' => 'permit_empty|string',
        ];

        if (!$this->validate($rules)) {
            return $this->respond(['status' => 'error', 'errors' => $this->validator->getErrors()
            ], 400);
        }

        $this->siteInfoModel->save([
            'facebook' => $this->request->getVar('facebook'),
            'instagram' => $this->request->getVar('instagram'),
            'twitter' => $this->request->getVar('twitter'),
            'youtube' => $this->request->getVar('youtube'),
            'linkedin' => $this->request->getVar('linkedin'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'address_ar' => $this->request->getVar('address_ar'),
            'address_en' => $this->request->getVar('address_en'),
            'location' => $this->request->getVar('location'),
        ]);

        session()->setFlashdata('success', lang('app.record_added_successfully'));
        return redirect()->to('/siteinfo');
    }


    public function edit($id){
        $id = dec($id);
        $siteInfo = $this->siteInfoModel->getSiteInfo($id);
        return view('siteinfo/edit', ['siteInfo' => $siteInfo]);
    }

    public function update($id){
        $id = dec($id);
        $rules = [
            'facebook' => 'permit_empty|valid_url',
            'instagram' => 'permit_empty|valid_url',
            'twitter' => 'permit_empty|valid_url',
            'youtube' => 'permit_empty|valid_url',
            'linkedin' => 'permit_empty|valid_url',
            'email' => 'permit_empty|valid_email',
            'phone' => 'permit_empty|string|max_length[20]',
            'address_ar' => 'permit_empty|string',
            'address_en' => 'permit_empty|string',
            'location' => 'permit_empty|string',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->siteInfoModel->save([
            'id'=>$id,
            'facebook' => $this->request->getVar('facebook'),
            'instagram' => $this->request->getVar('instagram'),
            'twitter' => $this->request->getVar('twitter'),
            'youtube' => $this->request->getVar('youtube'),
            'linkedin' => $this->request->getVar('linkedin'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'address_ar' => $this->request->getVar('address_ar'),
            'address_en' => $this->request->getVar('address_en'),
            'location' => $this->request->getVar('location'),
        ]);
        session()->setFlashdata('success', lang('app.record_updated_successfully'));
        return redirect()->to('/siteinfo');
    }

  
    public function delete($id){
        $id = dec($id);
        $siteInfo = $this->siteInfoModel->find($id);
    
        if ($siteInfo) {
            $this->siteInfoModel->delete($id);
            
            session()->setFlashdata('success', lang('app.record_deleted_successfully'));
            return redirect()->to('/siteinfo');
        }

        return $this->respond([
            'status' => 'error',
            'message' => 'No site information to delete'
        ], 404);
    }


   
}

