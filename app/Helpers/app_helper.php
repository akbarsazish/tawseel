<?php
use App\Models\BusinessesModel;
use App\Models\IndividualModel;
use App\Models\UserModel;
  $session = session();
  $lang = $session->get('lang');
  
  if(!$lang)
  {    
    $session->set('lang', 'en');
  }

	\Config\Services::language()->setLocale($lang);
    if(!$session->get('page'))
    {
      $session->set('page','home');
    }

if (!function_exists("auth")) 
{
  function auth(string $requiredRole)
  {
      $userId = session()->get('user_id');
      // Load the UserModel (make sure to include the model if needed)
      $userModel = new \App\Models\UserModel();

      // Fetch the user's role from the database
      $user = $userModel->find($userId);

      // Check if user exists and has a role
      if ($user && isset($user['role'])) 
      {
          // Split roles into an array
          $roles = explode(',', $user['role']);

          // Check if the required role exists in the user's roles
          if(in_array($requiredRole, $roles) || in_array('admin', $roles))
          {
            return true;
          }
      }

      return false; // User not found or no role assigned
  }
}

if (!function_exists("enc")) 
{
    function enc(string $string)
    {
      $encrypter = \Config\Services::encrypter();
      $string = bin2hex($encrypter->encrypt($string));

        return $string;
    }
}

if (!function_exists("dec")) 
{
    function dec(string $string)
    {
		  $encrypter = \Config\Services::encrypter();
      $string = $encrypter->decrypt(hex2bin($string));
      return $string;
        
    }
}


if (!function_exists("sess")) 
{
    function sess()
    {
        $sess    = \Config\Services::session();
        return $sess;
    }
}

if (!function_exists("login")) 
{
    function login()
    {
		  if(sess()->get('logged_in'))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
}

if (!function_exists('google_maps_script')) 
{
    function google_maps_script() {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        return '<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script> <script src="https://maps.googleapis.com/maps/api/js?key='.$apiKey.'&libraries=places&callback=initMap" async defer></script>';
    }
}

if (!function_exists('is_location')) 
{
    function is_location() 
    {
      $userId = session()->get('user_id'); 
      $userModel = new UserModel();
      $user = $userModel->find($userId);
      if($user['location'] != '')
      {
        return true;
      }
      return false;
    }
}

if (!function_exists("account_stype")) 
{
  function account_stype()
  {
      $userId = session()->get('user_id');
      $userModel = new \App\Models\UserModel();

      $user = $userModel->find($userId);
      if ($user) 
      {
        return $user['sub_type'];
      }
  }
}

if (!function_exists('has_business'))
{
  function has_business()
  {
    $businessesModel = new BusinessesModel();
    $IndividualModel = new IndividualModel();
    $userId = session()->get('user_id');
    $business = $businessesModel->where('pid',$userId)->find();
    $Individual = $IndividualModel->where('pid',$userId)->find();

    if ($business) 
    {
      return true;
    }
    elseif($Individual)
    {
      return true;
    }

    return false;

  }
}

if (!function_exists("getMy")) 
{
  function getMy(string $string)
  {
      $userId = session()->get('user_id');
      $userModel = new \App\Models\UserModel();

      $user = $userModel->find($userId);
      if ($user) 
      {
        return $user[$string];
      }
  }
}

if (!function_exists("file_access")) 
{
  function file_access(string $string)
  {
    if(auth('admin'))
    {
      return true;
    }
    else
    {
        $userId = session()->get('user_id');
        $userModel = new \App\Models\BusinessesModel();
        $user = $userModel->where('pid',$userId)->find();
        return in_array($string, $user[0]);
    }
  }
}

