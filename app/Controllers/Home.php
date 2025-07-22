<?php

namespace App\Controllers;
use App\Models\SiteInfoModel;
use App\Models\HomeInfoModel;
use App\Models\KeyHighlightModel;
use App\Models\HighlightItemModel;
use App\Models\MenuModel;
use App\Models\MenuItemModel;

class Home extends BaseController
{
    protected $siteInfoModel;
    protected $HomeInfoModel;
    protected $KeyHighlightModel;
    protected $HighlightItemModel;
    protected $MenuModel;
    protected $MenuItemModel;

    public function __construct(){
        $this->siteInfoModel = new SiteInfoModel();
        $this->HomeInfoModel = new HomeInfoModel();
        $this->KeyHighlightModel = new KeyHighlightModel();
        $this->HighlightItemModel = new HighlightItemModel();
        $this->MenuModel = new MenuModel();
        $this->MenuItemModel = new MenuItemModel();
        
        helper('app');
    }
    
    public function index(): string {

    $whitelist = ['37.41.58.204','149.54.36.213'];
    $clientIP = $this->request->getIPAddress();
    
        if (!in_array($clientIP, $whitelist)) 
            {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            // or
            // return $this->response->setStatusCode(403)->setBody("Access denied");
        }

        $siteInfo = $this->siteInfoModel->first();
        $result = $this->HomeInfoModel->get();
        $homeInfos = $result->getResultArray();
        $highLights = $this->KeyHighlightModel->first();
        $result = $this->HighlightItemModel->get();
        $highlightItems = $result->getResultArray();
        $legalInfo    = $this->MenuModel->where('title_en', 'Legal Information')->first();
        $services     = $this->MenuModel->where('title_en', 'Services')->first();
        $links        = $this->MenuModel->where('title_en', 'Links')->first();
        $data['legalItems']  = $legalInfo ? 
        $this->MenuItemModel->where('menu_id', $legalInfo['id'])->orderBy('order', 'asc')->findAll() : [];
        $data['serviceItems'] = $services ?
        $this->MenuItemModel->where('menu_id', $services['id'])->orderBy('order', 'asc')->findAll() : [];
        $data['linkItems']   = $links ?
        $this->MenuItemModel->where('menu_id', $links['id'])->orderBy('order', 'asc')->findAll() : [];

        $url = $_SERVER['REQUEST_URI'];
        
        $url = substr($url,1);
        
        return view($url.'/home', [
            'siteInfo' => $siteInfo,
            'homeInfos' => $homeInfos,
            'highLights' => $highLights,
            'highlightItems' => $highlightItems,
            'legalItems' => $data['legalItems'],
            'serviceItems' => $data['serviceItems'],
            'linkItems' => $data['linkItems'],
        ]);
    }


    public function loadimg($sec, $fileName){
        $uploadPath = WRITEPATH . 'uploads/'.$sec.'/';
        $filePath = $uploadPath . $fileName;

        if (file_exists($filePath)){
            $fileData = file_get_contents($filePath);
            $mimeType = mime_content_type($filePath);
            return $this->response->setContentType($mimeType)->setBody($fileData);
        } else {
            $filePath = WRITEPATH . 'placeholder.svg';
            $fileData = file_get_contents($filePath);
            $mimeType = mime_content_type($filePath);
            return $this->response->setContentType($mimeType)->setBody($fileData);
        }
    }


    public function terms(){
        return view('terms/terms');
    }

    public function policy(){
        return view('terms/policy');
    }

    public function refund(){
        return view('terms/refund');
    }

    public function viewFile($filename)
    {
        if(!file_access($filename))
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $filePath = WRITEPATH . 'uploads/documents/' . $filename;
    
        if (!file_exists($filePath)) 
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    
        // Set headers for inline display
        $this->response
            ->setHeader('Content-Type', mime_content_type($filePath))
            ->setHeader('Content-Disposition', 'inline; filename="' . basename($filePath) . '"')
            ->setBody(file_get_contents($filePath));
    
        return $this->response;
    }
}
