<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Auto-login with remember token
        if (!session()->get('logged_in') && isset($_COOKIE['remember_token'])) 
        {
            $model = new UserModel();
            $token = $_COOKIE['remember_token'];
            
            $user = $model->where('remember_token', $token)
                        ->where('remember_expires >', date('Y-m-d H:i:s'))
                        ->first();
            
            if ($user) 
            {
                session()->set([
                    'logged_in' => true,
                    'user_id' => $user['id'],
                    'full_name' => $user['fullname'],
                    'email' => $user['email'],
                    'phone' => $user['phone']
                ]);
                
                // Optional: Refresh the token
                $newToken = bin2hex(random_bytes(32));
                $model->update($user['id'], [
                    'remember_token' => $newToken,
                    'remember_expires' => date('Y-m-d H:i:s', time() + (30 * 24 * 60 * 60))
                ]);
                setcookie('remember_token', $newToken, time() + (30 * 24 * 60 * 60), '/', '', true, true);
            }
        }
    }
}