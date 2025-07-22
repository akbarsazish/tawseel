<?php
namespace App\Controllers\Api;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\UserModel;

class UserApi extends BaseController
{
    use ResponseTrait;
    
    public function index($id)
    {
        // Verify API key
        $providedKey = $this->request->getHeaderLine('X-API-KEY');
        $validKey = getenv('API_SYNC_KEY');
        
        if (empty($providedKey) || $providedKey !== $validKey) 
        {
            return $this->failUnauthorized('Invalid or missing API Key');
        }
        
        // Get all users with basic fields
        $userModel = new UserModel();
        $users = $userModel->find($id);

        unset($users['password']);
        unset($users['email_verified']);
        unset($users['phone_verified']);
        unset($users['state']);
        
        return $this->respond([
            'status' => 'success',
            'data' => $users,
            'timestamp' => time()
        ]);
    }
}