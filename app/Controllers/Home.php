<?php

namespace App\Controllers;
use App\Models\SiteInfoModel;
use App\Models\HomeInfoModel;
use App\Models\KeyHighlightModel;
use App\Models\HighlightItemModel;
use App\Models\MenuModel;
use App\Models\MenuItemModel;

use Dompdf\Dompdf;
use Dompdf\Options;
use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

use Dompdf\Adapter\CPDF;
use Dompdf\FontMetrics;


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

    $whitelist = ['37.41.58.204','149.54.36.213','127.0.0.1'];
    $clientIP = $this->request->getIPAddress();
    
        if (!in_array($clientIP, $whitelist) || 1==1) 
            {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            // or
            return $this->response->setStatusCode(403)->setBody("Access denied");
        }

        $siteInfo = $this->siteInfoModel->first();
        $result = $this->HomeInfoModel->get();
        $homeInfos = $result->getResultArray();
        $highLights = $this->KeyHighlightModel->first();
        $result = $this->HighlightItemModel->get();
        $highlightItems = $result->getResultArray();

         // Fetch menus by title (use 'title_en', or by 'id')
        $legalInfo    = $this->MenuModel->where('title_en', 'Legal Information')->first();
        $services     = $this->MenuModel->where('title_en', 'Services')->first();
        $links        = $this->MenuModel->where('title_en', 'Links')->first();

        // Fetch their menu items
        $data['legalItems']  = $legalInfo ? 
            $this->MenuItemModel->where('menu_id', $legalInfo['id'])->orderBy('order', 'asc')->findAll() : [];
        $data['serviceItems'] = $services ?
            $this->MenuItemModel->where('menu_id', $services['id'])->orderBy('order', 'asc')->findAll() : [];
        $data['linkItems']   = $links ?
            $this->MenuItemModel->where('menu_id', $links['id'])->orderBy('order', 'asc')->findAll() : [];


        return view('home/home', [
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


public function contract() {
    // Get logo as base64 (same as before)
        // return view('contract/pdf_generator');
      
        $logoPath = WRITEPATH . 'uploads/img/logo.png';
        $logoBase64 = '';
        if (file_exists($logoPath)) {
            $logoBase64 = 'data:' . mime_content_type($logoPath) . ';base64,' . base64_encode(file_get_contents($logoPath));
        } else {
            $placeholderPath = WRITEPATH . 'placeholder.svg';
            $logoBase64 = 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($placeholderPath));
        }


    $data = [
        'logo' => $logoBase64,
        'companyName_en' => 'Nasayim Almaerifa Projects SPC',
        'companyName_ar' => 'مشاريع نسائم المعرفة ش ش و',
        'companyName1_en' => 'Tawseel E-Commerce and Logistics LLC',
        'companyName2_ar' => 'توصيل للتجارة الإلكترونية واللوجستيات ش م م',
    ];

    // Configure mPDF
    $mpdf = new Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'default_font' => 'almohanad',
        'directionality' => 'rtl',
        'autoScriptToLang' => true,
        'autoLangToFont' => true,
        'margin_top' => 40,    // Increased for header
        'margin_bottom' => 40, // Increased for footer
        'margin_header' => 5,
        'margin_footer' => 5,
        'autoPageBreak' => true,
        'autoPageBreakMargin' => 20
    ]);

    // Set header and footer
    $header = view('contract/header', $data);
    $footer = view('contract/footer', $data);
    
    $mpdf->SetHTMLHeader($header);
    $mpdf->SetHTMLFooter($footer);

    // Main content WITHOUT repeated headers/footers
    $mainContent = view('contract/pdf_generator', $data);
    $mpdf->WriteHTML($mainContent);

    $mpdf->Output('contract.pdf', 'I');
    exit;
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

    public function viewFile($filename){
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
