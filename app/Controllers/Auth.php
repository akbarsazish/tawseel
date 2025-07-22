<?php

namespace App\Controllers;

use App\Models\BusinessesModel;
use App\Models\SiteInfoModel;
use App\Models\UserModel;
use App\Models\IndividualModel;
use App\Models\AgreementTempModel;
use App\Models\AgreementModel;

class Auth extends BaseController
{
    protected $request;
    protected $SiteInfoModel;
    protected $AgreementTempModel;
    protected $AgreementModel;
    protected $BusinessesModel;
    protected $UserModel;
    protected $IndividualModel;

    public function __construct()
    {
        $this->siteInfoModel = new SiteInfoModel();
        $this->AgreementTempModel = new AgreementTempModel();
        $this->AgreementModel = new AgreementModel();
        $this->BusinessesModel = new BusinessesModel();
        $this->UserModel = new UserModel();
        $this->IndividualModel = new IndividualModel();
        helper('app');
        helper('cookie');
    }
    
public function index()
{
    if(session()->get('logged_in')) 
    {
        return redirect()->to('home');
    }

    if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') 
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = 1;

        $user = $this->UserModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) 
        {
            // Set session data
            session()->set([
                'logged_in' => true,
                'user_id' => $user['id']
            ]);

            // Only set remember token if "Remember Me" was checked
            if ($remember) 
            {
                $token = bin2hex(random_bytes(32));
                $expires = date('Y-m-d H:i:s', time() + (30 * 24 * 60 * 60)); // 30 days
                
                // Save to database
                $this->UserModel->update($user['id'], [
                    'remember_token' => $token,
                    'remember_expires' => $expires
                ]);
                
                // Set secure cookie
                setcookie(
                    'remember_token',
                    $token,
                    time() + (30 * 24 * 60 * 60),
                    '/',
                    '', // your domain
                    true,  // secure
                    true   // httponly
                );
            }

            return redirect()->to('home'); 
        }
        else 
        {
            session()->setFlashdata('error', 'Invalid credentials');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    $siteInfo = $this->siteInfoModel->first();
    return view('auth/login',['siteInfo' => $siteInfo]);
}

public function businesses_reg()
{
    if (!session()->get('logged_in') || getMy('type') == 'personal') 
    {
        return redirect()->to('home');
    }

    if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') 
    {
        // Define validation rules
        $rules = [
              // Step 1 Rules
              'cr_name_en' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.cr_name_en').lang('app.in_step1'),
            ],
            'cr_name_ar' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.cr_name_ar').lang('app.in_step1'),
            ],
            'cr_number' => [
                'rules' => 'required|alpha_numeric|min_length[3]',
                'label' => lang('app.cr_number').lang('app.in_step1'),
            ],
            'cr_email' => [
                'rules' => 'required|valid_email',
                'label' => lang('app.email').lang('app.in_step1'),
            ],
            'cr_gsm' => [
                'rules' => 'required|numeric|max_length[8]|is_unique[businesses.cr_gsm]',
                'label' => lang('app.gsm').lang('app.in_step1'),
            ],
            'cr_po_box' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.po_box').lang('app.in_step1'),
            ],
            'cr_postal_code' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.postal_code').lang('app.in_step1'),
            ],
            'cr_fax' => [
                'rules' => 'permit_empty|numeric|min_length[3]',
                'label' => lang('app.fax').lang('app.in_step1'),
            ],
            'cr_establishment_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.establishment_date').lang('app.in_step1'),
            ],
            'cr_expiry_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.expiry_date').lang('app.in_step1'),
            ],
            'cr_legal_type' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.legal_type').lang('app.in_step1'),
            ],
            'cr_head_quarter' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.head_quarter').lang('app.in_step1'),
            ],
            'cr_cr_document' => [
                'rules' => 'uploaded[cr_document]|max_size[cr_document,2048]|mime_in[cr_document,image/jpeg,image/png,application/pdf]',
                'label' => lang('app.crc').lang('app.in_step1'),
            ],

            // Step 2 Rules
            'id_number' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.id_number').lang('app.in_step2'),
            ],
            'id_expire_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.expire_date').lang('app.in_step2'),
            ],
            'id_first_name' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.first_name').lang('app.in_step2'),
            ],
            'id_second_name' => [
                'rules' => 'permit_empty|min_length[3]',
                'label' => lang('app.second_name').lang('app.in_step2'),
            ],
            'id_third_name' => [
                'rules' => 'permit_empty|min_length[3]',
                'label' => lang('app.third_name').lang('app.in_step2'),
            ],
            'id_sur_name' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.sur_name').lang('app.in_step2'),
            ],
            'id_date_of_birth' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.date_of_birth').lang('app.in_step2'),
            ],
            'id_document' => [
                'rules' => 'uploaded[id_document]|max_size[id_document,2048]|mime_in[id_document,image/jpeg,image/png,application/pdf]',
                'label' => lang('app.id').lang('app.in_step2'),
            ],
            'id_address' => [
                'rules' => 'required',
                'label' => lang('app.address').lang('app.in_step2'),
            ],            
        
            // Step 3 Rules
            'cc_cr_number' => [
                'rules' => 'required|alpha_numeric|min_length[3]',
                'label' => lang('app.cr_number').lang('app.in_step3'),
            ],
            'cc_head_quarter' => [
                'rules' => 'required|min_length[3]',
                'label' => lang('app.head_quarter').lang('app.in_step3'),
            ],
            'cc_occi_number' => [
                'rules' => 'required|alpha_numeric|min_length[3]',
                'label' => lang('app.cc_occi_number').lang('app.in_step3'),
            ],
            'cc_document' => [
                'rules' => 'uploaded[cc_document]|max_size[cc_document,2048]|mime_in[cc_document,image/jpeg,image/png,application/pdf]',
                'label' => lang('app.cc').lang('app.in_step3'),
            ],
            // Step 4 Rules
            'ta_governorate' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.governorate').lang('app.in_step4'),
                ],
                'ta_complex_no' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.complex_no').lang('app.in_step4'),
                ],
                'ta_state' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.state').lang('app.in_step4'),
                ],
                'ta_plot_no' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.plot_no').lang('app.in_step4'),
                ],
                'ta_area' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.area').lang('app.in_step4'),
                ],
                'ta_building_no' => [
                    'rules' => 'required',
                    'label' => lang('app.building_no').lang('app.in_step4'),
                ],
                'ta_street_name_no' => [
                    'rules' => 'permit_empty|min_length[3]',
                    'label' => lang('app.street_name_no').lang('app.in_step4'),
                ],
                'ta_flat_shop_no' => [
                    'rules' => 'required',
                    'label' => lang('app.flat_shop_no').lang('app.in_step4'),
                ],
                'ta_way_no' => [
                    'rules' => 'required',
                    'label' => lang('app.way_no').lang('app.in_step4'),
                ],
                'ta_type_of_activity' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.type_of_activity').lang('app.in_step4'),
                ],
                'ta_rent_contract_no' => [
                    'rules' => 'permit_empty|min_length[3]',
                    'label' => lang('app.rent_contract_no').lang('app.in_step4'),
                ],
                'ta_expire_date' => [
                    'rules' => 'required|valid_date',
                    'label' => lang('app.expire_date').lang('app.in_step4'),
                ],
                'ta_document' => [
                    'rules' => 'uploaded[ta_document]|max_size[ta_document,2048]|mime_in[ta_document,image/jpeg,image/png,application/pdf]',
                    'label' => lang('app.ta').lang('app.in_step4'),
                ],
                // Step 5 Rules
                'lc_cr_number' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.cr_number').lang('app.in_step5'),
                ],
                'lc_governorate' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.governorate').lang('app.in_step5'),
                ],
                'lc_rent_contract_no' => [
                    'rules' => 'permit_empty|min_length[3]',
                    'label' => lang('app.rent_contract_no').lang('app.in_step5'),
                ],
                'lc_state' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.state').lang('app.in_step5'),
                ],
                'lc_area' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.area').lang('app.in_step5'),
                ],
                'lc_poa_code' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.poa_code').lang('app.in_step5'),
                ],
                'lc_license_type' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.license_type').lang('app.in_step5'),
                ],
                'lc_license_name' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.license_name').lang('app.in_step5'),
                ],
                'lc_license_number' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.license_number').lang('app.in_step5'),
                ],
                'lc_expire_date' => [
                    'rules' => 'required|valid_date',
                    'label' => lang('app.expire_date').lang('app.in_step5'),
                ],
                'lc_activities_code' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.activities_code').lang('app.in_step5'),
                ],
                'lc_activities_description' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.activities_description').lang('app.in_step5'),
                ],
                'lc_document' => [
                    'rules' => 'uploaded[lc_document]|max_size[lc_document,2048]|mime_in[lc_document,image/jpeg,image/png,application/pdf]',
                    'label' => lang('app.lc').lang('app.in_step5'),
                ],
                // Step 6 Rules
                'tcc_cr_number' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.cr_number').lang('app.in_step6'),
                ],
                'tcc_tax_card_number' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.tax_card_number').lang('app.in_step6'),
                ],
                'tcc_tin' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.tin').lang('app.in_step6'),
                ],
                'tcc_expire_date' => [
                    'rules' => 'required|valid_date',
                    'label' => lang('app.expire_date').lang('app.in_step6'),
                ],
                'ta_document' => [
                    'rules' => 'uploaded[ta_document]|max_size[ta_document,2048]|mime_in[ta_document,image/jpeg,image/png,application/pdf]',
                    'label' => lang('app.ta').lang('app.in_step6'),
                ],
                // Step 7 Rules
                'vc_cr_number' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.cr_number').lang('app.in_step7'),
                ],
                'vc_vat_certificate_number' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.vat_certificate_number').lang('app.in_step7'),
                ],
                'vc_vatin' => [
                    'rules' => 'required|min_length[3]',
                    'label' => lang('app.vatin').lang('app.in_step7'),
                ],
                'vc_expire_date' => [
                    'rules' => 'required|valid_date',
                    'label' => lang('app.expire_date').lang('app.in_step7'),
                ],
                'vc_document' => [
                    'rules' => 'uploaded[vc_document]|max_size[vc_document,2048]|mime_in[vc_document,image/jpeg,image/png,application/pdf]',
                    'label' => lang('app.vc').lang('app.in_step7'),
                ],
        ];
    
        // Validate input fields
        if (!$this->validate($rules)) 
        {
            $referrer = $this->request->getServer('HTTP_REFERER') ?? base_url('business/registration');
            return redirect()->to($referrer)->withInput()->with('errors', $this->validator->getErrors());
        }

        // Step 1: Upload CR document
        $crFile = $this->request->getFile('cr_document');
        if ($crFile->isValid() && !$crFile->hasMoved()) 
        {
            $crFileName = $crFile->getRandomName();
            $crFile->move(WRITEPATH . 'uploads/documents', $crFileName);
        }

        // Step 2: Upload ID document
        $idFile = $this->request->getFile('id_document');
        if ($idFile->isValid() && !$idFile->hasMoved()) 
        {
            $idFileName = $idFile->getRandomName();
            $idFile->move(WRITEPATH . 'uploads/documents', $idFileName);
        }

        // Step 3: Upload CC document
        $ccFile = $this->request->getFile('cc_document');
        if ($ccFile->isValid() && !$ccFile->hasMoved()) 
        {
            $ccFileName = $ccFile->getRandomName();
            $ccFile->move(WRITEPATH . 'uploads/documents', $ccFileName);
        }            
        // Step 4: Upload TA document
        $taFile = $this->request->getFile('ta_document');
        if ($taFile->isValid() && !$taFile->hasMoved()) 
        {
            $taFileName = $taFile->getRandomName();
            $taFile->move(WRITEPATH . 'uploads/documents', $taFileName);
        }            
        // Step 5: Upload LC document
        $lcFile = $this->request->getFile('lc_document');
        if ($lcFile->isValid() && !$lcFile->hasMoved()) 
        {
            $lcFileName = $lcFile->getRandomName();
            $lcFile->move(WRITEPATH . 'uploads/documents', $lcFileName);
        }
        // Step 6: Upload TCC document
        $tccFile = $this->request->getFile('tcc_document');
        if ($tccFile->isValid() && !$tccFile->hasMoved()) 
        {
            $tccFileName = $tccFile->getRandomName();
            $tccFile->move(WRITEPATH . 'uploads/documents', $tccFileName);
        }
        // Step 7: Upload VC document
        $vcFile = $this->request->getFile('vc_document');
        if ($vcFile->isValid() && !$vcFile->hasMoved()) 
        {
            $vcFileName = $vcFile->getRandomName();
            $vcFile->move(WRITEPATH . 'uploads/documents', $vcFileName);
        }            

        $data = [
            // Prepare data for Step 1
            'id_number' => $this->request->getPost('id_number'),
            'id_expire_date' => $this->request->getPost('id_expire_date'),
            'id_first_name' => $this->request->getPost('id_first_name'),
            'id_second_name' => $this->request->getPost('id_second_name'),
            'id_third_name' => $this->request->getPost('id_third_name'),
            'id_sur_name' => $this->request->getPost('id_sur_name'),
            'id_date_of_birth' => $this->request->getPost('id_date_of_birth'),
            'id_document' => $idFileName,
            'id_address' => $this->request->getPost('id_address'),
        
            // Prepare data for Step 2
            'cr_name_en' => $this->request->getPost('cr_name_en'),
            'cr_name_ar' => $this->request->getPost('cr_name_ar'),
            'cr_number' => $this->request->getPost('cr_number'),
            'cr_email' => $this->request->getPost('cr_email'),
            'cr_gsm' => $this->request->getPost('cr_gsm'),
            'cr_po_box' => $this->request->getPost('cr_po_box'),
            'cr_postal_code' => $this->request->getPost('cr_postal_code'),
            'cr_fax' => $this->request->getPost('cr_fax'),
            'cr_establishment_date' => $this->request->getPost('cr_establishment_date'),
            'cr_expiry_date' => $this->request->getPost('cr_expiry_date'),
            'cr_legal_type' => $this->request->getPost('cr_legal_type'),
            'cr_head_quarter' => $this->request->getPost('cr_head_quarter'),
            'cr_document' => $crFileName,
        
            // Prepare data for Step 3
            'cc_cr_number' => $this->request->getPost('cc_cr_number'),
            'cc_head_quarter' => $this->request->getPost('cc_head_quarter'),
            'cc_occi_number' => $this->request->getPost('cc_occi_number'),
            'cc_expire_date' => $this->request->getPost('cc_expire_date'),
            'cc_document' => $ccFileName,
        
            // Prepare data for Step 4
            'ta_governorate' => $this->request->getPost('ta_governorate'),
            'ta_complex_no' => $this->request->getPost('ta_complex_no'),
            'ta_state' => $this->request->getPost('ta_state'),
            'ta_plot_no' => $this->request->getPost('ta_plot_no'),
            'ta_area' => $this->request->getPost('ta_area'),
            'ta_building_no' => $this->request->getPost('ta_building_no'),
            'ta_street_name_no' => $this->request->getPost('ta_street_name_no'),
            'ta_flat_shop_no' => $this->request->getPost('ta_flat_shop_no'),
            'ta_way_no' => $this->request->getPost('ta_way_no'),
            'ta_type_of_activity' => $this->request->getPost('ta_type_of_activity'),
            'ta_rent_contract_no' => $this->request->getPost('ta_rent_contract_no'),
            'ta_expire_date' => $this->request->getPost('ta_expire_date'),
            'ta_document' => $taFileName,
        
            // Prepare data for Step 5
            'lc_cr_number' => $this->request->getPost('lc_cr_number'),
            'lc_governorate' => $this->request->getPost('lc_governorate'),
            'lc_rent_contract_no' => $this->request->getPost('lc_rent_contract_no'),
            'lc_state' => $this->request->getPost('lc_state'),
            'lc_area' => $this->request->getPost('lc_area'),
            'lc_poa_code' => $this->request->getPost('lc_poa_code'),
            'lc_license_type' => $this->request->getPost('lc_license_type'),
            'lc_license_name' => $this->request->getPost('lc_license_name'),
            'lc_license_number' => $this->request->getPost('lc_license_number'),
            'lc_expire_date' => $this->request->getPost('lc_expire_date'),
            'lc_activities_code' => $this->request->getPost('lc_activities_code'),
            'lc_activities_description' => $this->request->getPost('lc_activities_description'),
            'lc_document' => $lcFileName,
        
            // Prepare data for Step 6
            'tcc_cr_number' => $this->request->getPost('tcc_cr_number'),
            'tcc_tax_card_number' => $this->request->getPost('tcc_tax_card_number'),
            'tcc_tin' => $this->request->getPost('tcc_tin'),
            'tcc_expire_date' => $this->request->getPost('tcc_expire_date'),
            'tcc_document' => $tccFileName,
        
            // Prepare data for Step 7
            'vc_cr_number' => $this->request->getPost('vc_cr_number'),
            'vc_vat_certificate_number' => $this->request->getPost('vc_vat_certificate_number'),
            'vc_vatin' => $this->request->getPost('vc_vatin'),
            'vc_expire_date' => $this->request->getPost('vc_expire_date'),
            'vc_document' => $vcFileName,
            'pid' => session()->get('user_id'),
        ];
        
            $bid = $this->BusinessesModel->insert($data);
            if ($bid) 
            {
                $sub_type   = getMy('sub_type');
                $logistics_type   = getMy('logistics_type');
                if($sub_type == '1pl' && $logistics_type == 'corporation')
                {
                    $sub_type = '1plc';
                }
                elseif($sub_type == '1pl' && $logistics_type == 'individual')
                {
                    $sub_type = '1pli';
                }
                    $record = $this->AgreementTempModel->where('sub_type',$sub_type)->find($bid);
                    $record = array_slice($record, 1, -3); 
                    $record['pid'] = $bid;
                    $this->AgreementModel->insert($record);

                    session()->setFlashdata('success', lang('app.business_registered_successfully'));

                    return redirect()->to(base_url('mydashboard'));
            } 
            else 
            {
                $referrer = $this->request->getServer('HTTP_REFERER') ?? base_url('bussnes_reg');
                return redirect()->to($referrer)->withInput()->with('error', lang('app.business_registration_failed'));
            }
    } 
    elseif(has_business())
    {
        return redirect()->to('login');
    }
    else
    {
        return view('auth/bussnes_reg');
    }
}

    public function password()
    {
        if (!session()->get('logged_in')) 
        {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') 
        {
            // Get input from the request
            $newPassword = $this->request->getPost('password');
            $rePassword = $this->request->getPost('rpassword');
    
            // Validate the passwords
            if ($newPassword !== $rePassword) 
            {
                // Passwords do not match
                return redirect()->to(base_url($_SERVER['HTTP_REFERER']))->with('error', 'Passwords do not match.');
            }
    
            if (strlen($newPassword) < 8) 
            {
                // Password is too short
                return redirect()->to(base_url($_SERVER['HTTP_REFERER']))->with('error', 'Password must be at least 8 characters long.');
            }
    
            // Update the password in the database
            $userId = session()->get('user_id'); 
            // Assuming you have the user ID stored in session
            $userModel = new UserModel();
    
            // Hash the password before saving (use the password hashing function)
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user password
            $userModel->update($userId, ['password' => $hashedPassword]);
            
            // Redirect with success message
            return redirect()->to('/')->with('success', 'Password updated successfully.');
        }
        else
        {
            return view('auth/password');
        }
    }    

    public function signup($type = '', $sub_type = '')
    {
        $request = service('request');
        if (session()->get('logged_in')) 
        {
            session()->setFlashdata('error', 'Your already login!');
            return redirect()->to(base_url('home'));
        }

        if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') 
        {
            // Validate the request

            //dd($request->getPost('type'));
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'label' => lang('app.unique_email'),
                ],
                'phone' => 'required|string|is_unique[users.phone]',
                'fullname' => 'required',
                'password' => 'required|min_length[6]',
                'confirm_password' => [
                    'rules' => 'matches[password]',
                    'label' => lang('app.cpassword'),
                ],
                    'type' => [
                        'rules' => 'required|in_list[eCommerce,logistics,personal]',
                        'label' => 'Type',
                ],
                    'sub_type' => [
                        'rules' => 'required|in_list[b2b,b2c,c2c,1pl,2pl,34pl]',
                        'label' => 'Sub type',
                ],
    
            ]);

            if (!$validation->withRequest($request)->run()) 
            {
                $referrer = $this->request->getServer('HTTP_REFERER') ?? base_url('signup');
                return redirect()->to($referrer)->withInput()->with('errors', $validation->getErrors());
            }

            // Create a new user
            $userModel = new UserModel();
            $userModel->insert([
                'fullname' => $request->getPost('fullname'),
                'type' => $request->getPost('type'),
                'sub_type' => $request->getPost('sub_type'),
                'logistics_type' => $request->getPost('logistics_type'),
                'cr' => $request->getPost('cr'),
                'email' => $request->getPost('email'),
                'phone' => $request->getPost('phone'),                
                'password' => $request->getPost('password'),
            ]);

            // Flash success message
            $user = $userModel->where('email', $request->getPost('email'))->first();
            session()->set('logged_in', true);
            session()->set('user_id', $user['id']);

            if($request->getPost('type') == 'personal')
            {
                return redirect()->to(base_url('home'))->with('success', 'User registered successfully');
            }
            elseif($request->getPost('logistics_type') == 'individual')
            {
                return redirect()->to(base_url('business/individual'))->with('success', 'User registered successfully');
            }
            else
            {
                return redirect()->to(base_url('business/registration'))->with('success', 'User registered successfully');
            }
        }
        $siteInfo = $this->siteInfoModel->first();

        $data['type'] = $type;
        $data['sub_type'] = $sub_type;
        $data['siteInfo'] = $siteInfo;
        
        return view('auth/signup', $data);
    }  

    public function logout()
    {
        if (session()->get('user_id')) 
        {
            $this->UserModel->update(session()->get('user_id'), [
                'remember_token' => null,
                'remember_expires' => null
            ]);
        }
        
        // Delete cookie
        setcookie('remember_token', '', time() - 3600, '/');
        
        // Destroy session
        session()->destroy();
        
        return redirect()->to('login');
    }

    public function edit($id = '')
    {
        if (!auth('user_edit')) 
        {
            return redirect()->to('home');
        }
        $id = dec($id);
        if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') 
        {
            $request = service('request');

            // Validate the request
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => 'required|valid_email',
                'phone' => 'required|string',
                'role' => 'required',
                'cr' => 'required',
            ]);

            if (!$validation->withRequest($request)->run()) {
                // Flash error messages
                return redirect()->to(base_url($_SERVER['HTTP_REFERER']))->with('errors', $validation->getErrors());
            }

            // Create a new user
            $userModel = new UserModel();
            $userModel->update($id,[
                'cr' => $request->getPost('cr'),
                'email' => $request->getPost('email'),
                'phone' => $request->getPost('phone'),
                'type' => $request->getPost('type'),
                'sub_type' => $request->getPost('sub_type'),
                'role' => implode(',', $request->getPost('role'))
            ]);
            return redirect()->to(base_url('user'))->with('success', 'User Updated successfully');
        }

        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        return view('auth/edit', $data);
    }  

    public function password_reset($id='')
    {
        $did = dec($id);
        if (!auth('user_edit')) 
        {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') 
        {
            // Get input from the request
            $newPassword = $this->request->getPost('password');
            $rePassword = $this->request->getPost('rpassword');
    
            // Validate the passwords
            if ($newPassword !== $rePassword) 
            {
                // Passwords do not match
                return redirect()->to(base_url($_SERVER['HTTP_REFERER']))->with('error', 'Passwords do not match.');
            }
    
            if (strlen($newPassword) < 8) 
            {
                // Password is too short
                return redirect()->to(base_url($_SERVER['HTTP_REFERER']))->with('error', 'Password must be at least 8 characters long.');
            }
    
            // Update the password in the database
            $userId = $did; 
            // Assuming you have the user ID stored in session
            $userModel = new UserModel();
    
            // Hash the password before saving (use the password hashing function)
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user password
            $userModel->update($userId, ['password' => $hashedPassword]);
            
            session()->setFlashdata('success', 'Password updated successfully.');
            echo '<script>window.history.go(-2);</script>';
            exit;
        }
        else
        {
            $data['id'] = $id;
            return view('auth/password_reset',$data);
        }
    }

    public function getCity()
    {
        $province = $this->request->getPost('name');
        $options = '';

        // Check if the province exists in the language file
        if (lang('app.' . $province)) 
        {
            $cities = lang('app.' . $province);

            // Iterate through the cities
            foreach ($cities as $key => $value) {
                $options .= "<option value=\"$key\">$value</option>"; // Create option elements
            }
        }

        return $options; // Return the HTML options for cities
        
    }
    
    public function updateLocation()
    {
        if (!session()->get('logged_in'))
        {
            return redirect()->to('home');
        }
            $rules = [
                'address_line_1' => 'required|string|max_length[255]',
                'address_line_2' => 'permit_empty|string|max_length[255]',
                'way' => 'required|string|max_length[100]',
                'city' => 'required|string|max_length[100]',
                'province' => 'required|string|max_length[100]',
                'location' => 'required|string|max_length[255]',
                'latitude' => 'required|decimal',
                'longitude' => 'required|decimal',
            ];

            if (!$this->validate($rules)) 
            {
                return redirect()->to(base_url('home'))->with('errors', $this->validator->getErrors());
            }

            $data = [
                'address_line_1' => $this->request->getPost('address_line_1'),
                'address_line_2' => $this->request->getPost('address_line_2'),
                'way' => $this->request->getPost('way'),
                'city' => $this->request->getPost('city'),
                'province' => $this->request->getPost('province'),
                'location' => $this->request->getPost('location'),
                'longitude' => $this->request->getPost('longitude'),
                'latitude' => $this->request->getPost('latitude'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
    
            // Update the user record
            $userId = session()->get('user_id');
            $userModel = new UserModel();
            if ($userModel->update($userId, $data)) 
            {
                return redirect()->to(base_url('home'))->with('success','Your location updated');
            }
    }

public function individual()
{
    if (!session()->get('logged_in')) 
    {
        return redirect()->to('login');
    }

    if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') 
    {
       // Define validation rules
        $rules = [
            // Step 1 Rules (ID Information)
            'id_number' => [
                'rules' => 'required|numeric|min_length[3]|max_length[20]',
                'label' => lang('app.id_number').lang('app.in_step1'),
            ],
            'id_expire_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.expire_date').lang('app.in_step1'),
            ],
            'id_first_name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'label' => lang('app.first_name').lang('app.in_step1'),
            ],
            'id_second_name' => [
                'rules' => 'permit_empty|min_length[3]|max_length[100]',
                'label' => lang('app.second_name').lang('app.in_step1'),
            ],
            'id_third_name' => [
                'rules' => 'permit_empty|min_length[3]|max_length[100]',
                'label' => lang('app.third_name').lang('app.in_step1'),
            ],
            'id_sur_name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'label' => lang('app.sur_name').lang('app.in_step1'),
            ],
            'id_date_of_birth' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.date_of_birth').lang('app.in_step1'),
            ],
            'id_address' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'label' => lang('app.address_name').lang('app.in_step1'),
            ],
            'id_document' => [
                'rules' => 'uploaded[id_document]|max_size[id_document,2048]|mime_in[id_document,image/jpeg,image/png,application/pdf]',
                'label' => lang('app.id').lang('app.in_step1'),
            ],
            
            // Step 2 Rules (Driving License)
            'license_number' => [
                'rules' => 'required|min_length[3]|max_length[200]',
                'label' => lang('app.license_number').lang('app.in_step2'),
            ],
            'issued_at' => [
                'rules' => 'required',
                'label' => lang('app.issued_at').lang('app.in_step2'),
            ],
            'issue_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.issue_date').lang('app.in_step2'),
            ],
            'expiry_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.expiry_date').lang('app.in_step2'),
            ],
            'driving_license' => [
                'rules' => 'uploaded[driving_license]|max_size[driving_license,2048]|mime_in[driving_license,image/jpeg,image/png,application/pdf]',
                'label' => lang('app.driving_license').lang('app.in_step2'),
            ],
            
            // Step 3 Rules (Registration Certificate)
            'plate_number' => [
                'rules' => 'required|min_length[1]|max_length[200]',
                'label' => lang('app.plate_number').lang('app.in_step3'),
            ],
            'vehicle_owner' => [
                'rules' => 'required|min_length[3]|max_length[200]',
                'label' => lang('app.vehicle_owner').lang('app.in_step3'),
            ],
            'coletters_of_platelor' => [
                'rules' => 'required|min_length[1]|max_length[200]',
                'label' => lang('app.letters_of_plate').lang('app.in_step3'),
            ],
            'issue_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.issue_date').lang('app.in_step3'),
            ],
            'expiry_date' => [
                'rules' => 'required|valid_date',
                'label' => lang('app.expiry_date').lang('app.in_step3'),
            ],
            'registration_certificate' => [
                'rules' => 'uploaded[registration_certificate]|max_size[registration_certificate,2048]|mime_in[registration_certificate,image/jpeg,image/png,application/pdf]',
                'label' => lang('app.registration_certificate').lang('app.in_step3'),
            ]
        ];
    
        // Validate input fields
        if (!$this->validate($rules)) 
        {
            $referrer = $this->request->getServer('HTTP_REFERER') ?? base_url('business/individual');
            return redirect()->to($referrer)->withInput()->with('errors', $this->validator->getErrors());
        }

      // Step 1: Upload ID document
        $idFile = $this->request->getFile('id_document');
        if ($idFile->isValid() && !$idFile->hasMoved()) {
            $idFileName = $idFile->getRandomName();
            $idFile->move(WRITEPATH . 'uploads/individual', $idFileName);
        }
        $bidFile = $this->request->getFile('id_back');
        if ($bidFile->isValid() && !$bidFile->hasMoved()) {
            $bidFileName = $bidFile->getRandomName();
            $bidFile->move(WRITEPATH . 'uploads/individual', $bidFileName);
        }

        // Step 2: Upload Driving License document
        $licenseFile = $this->request->getFile('driving_license');
        if ($licenseFile->isValid() && !$licenseFile->hasMoved()) {
            $licenseFileName = $licenseFile->getRandomName();
            $licenseFile->move(WRITEPATH . 'uploads/individual', $licenseFileName);
        }
        $blicenseFile = $this->request->getFile('driving_license_back');
        if ($blicenseFile->isValid() && !$blicenseFile->hasMoved()) {
            $blicenseFileName = $blicenseFile->getRandomName();
            $blicenseFile->move(WRITEPATH . 'uploads/individual', $blicenseFileName);
        }

        // Step 3: Upload Registration Certificate document
        $regCertFile = $this->request->getFile('registration_certificate');
        if ($regCertFile->isValid() && !$regCertFile->hasMoved()) {
            $regCertFileName = $regCertFile->getRandomName();
            $regCertFile->move(WRITEPATH . 'uploads/individual', $regCertFileName);
        }
        $bregCertFile = $this->request->getFile('registration_certificate_back');
        if ($bregCertFile->isValid() && !$bregCertFile->hasMoved()) {
            $bregCertFileName = $bregCertFile->getRandomName();
            $bregCertFile->move(WRITEPATH . 'uploads/individual', $bregCertFileName);
        } 

        $parent_id  = $this->request->getPost('parent_id');
        $parent_id = explode('>', $parent_id);
        $parent_id = trim($parent_id[0]);

       $data = [
        // Step 1: ID Information
        'id_number' => $this->request->getPost('id_number'),
        'id_expire_date' => $this->request->getPost('id_expire_date'),
        'id_first_name' => $this->request->getPost('id_first_name'),
        'id_second_name' => $this->request->getPost('id_second_name'),
        'id_third_name' => $this->request->getPost('id_third_name'),
        'id_sur_name' => $this->request->getPost('id_sur_name'),
        'id_date_of_birth' => $this->request->getPost('id_date_of_birth'),
        'id_address' => $this->request->getPost('id_address'),
        'id_document' => $idFileName ?? null,
        'id_back' => $bidFileName ?? null,
        
        // Step 2: Driving License Information
        'license_number' => $this->request->getPost('license_number'),
        'issued_at' => $this->request->getPost('issued_at'),
        'issue_date' => $this->request->getPost('issue_date'),
        'expiry_date' => $this->request->getPost('expiry_date'),
        'driving_license' => $licenseFileName ?? null,
        'driving_license_back' => $blicenseFileName ?? null,
        
        // Step 3: Vehicle Registration Information
        'plate_number' => $this->request->getPost('plate_number'),
        'vehicle_type' => $this->request->getPost('vehicle_type'),
        'color' => $this->request->getPost('color'),
        'origin' => $this->request->getPost('origin'),
        'model_year' => $this->request->getPost('model_year'),
        'weight' => $this->request->getPost('weight'),
        'capacity' => $this->request->getPost('capacity'),
        'chassis_no' => $this->request->getPost('chassis_no'),
        'registration_issue_date' => $this->request->getPost('issue_date'), // Note: Renamed to avoid conflict
        'registration_expiry_date' => $this->request->getPost('expiry_date'), // Note: Renamed to avoid conflict
        'registration_certificate' => $regCertFileName ?? null,
        'registration_certificate_back' => $bregCertFileName ?? null,
        'pid' => session()->get('user_id'),
        'parent_id' => $parent_id
    ];
            
            $iid = $this->IndividualModel->insert($data); 

            // This will return the new user's ID
            if ($iid) 
            {
                return redirect()->to(base_url('home'))->with('success', lang('app.business_registered_successfully'));
            } 
            else 
            {
                $referrer = $this->request->getServer('HTTP_REFERER') ?? base_url('business/individual');
                return redirect()->to($referrer)->withInput()->with('error', lang('app.business_registration_failed'));
            }
        } 
        elseif(has_business())
        {
            return redirect()->to('login');
        }
        else
        {
            $siteInfo = $this->siteInfoModel->first();
            $data['siteInfo'] = $siteInfo;
            $data['records'] = $this->BusinessesModel->select(['id', 'cr_number', 'cr_name_en'])->findAll();
            return view('auth/individual',$data);
        }
    }

    public function updatefield()
    {
        if(!auth('admin'))
        {
            return view('nallowed');
        }
        
        $id = $this->request->getPost('id');
        $field = $this->request->getPost('field');
        $value = $this->request->getPost('value');
        $this->AgreementTempModel->update($id, [$field => $value]);
    }

    public function client_updatefield()
    {
        if(!auth('admin'))
        {
            return view('nallowed');
        }
        
        $id = $this->request->getPost('id');
        $id = dec($id);
        $field = $this->request->getPost('field');
        $value = $this->request->getPost('value');
        $this->AgreementModel->update($id, [$field => $value]);
    }
}