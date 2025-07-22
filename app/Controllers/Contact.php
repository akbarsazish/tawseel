<?php

namespace App\Controllers;
use App\Models\SiteInfoModel;
use CodeIgniter\Email\Email;


class Contact extends BaseController
{
    protected $siteInfoModel;

    public function __construct()
    {
        $this->siteInfoModel = new SiteInfoModel();
        helper('app');
    }
    
    public function index(): string
    {
        $siteInfo = $this->siteInfoModel->first();
        return view('contact/home',['siteInfo' => $siteInfo]);
    }

    public function send()
    {
        $email = new Email();

        // Load email service
        $email = \Config\Services::email();

        // Get form data (assuming POST request)
        $to = 'info@tawseelonline.om';
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('description'). "<br>";
        $message .= "Phone: " . $this->request->getPost('phone');


        // Validate input
        if (empty($to) || empty($subject) || empty($message)) 
        {
            return redirect()->to(base_url('contact'))->with('error', 'All fields are required');
        }

        // Email configuration (can also be set in app/Config/Email.php)
        $config = [
            'protocol' => 'smtp',       // 'mail', 'sendmail', or 'smtp'
            'SMTPHost' => 'mail.tawseelonline.om',
            'SMTPUser' => 'contact@tawseelonline.om',
            'SMTPPass' => 'Ag8l2o(PAJ',
            'SMTPPort' => 587,
            'SMTPCrypto' => 'tls',      // 'ssl' or 'tls'
            'mailType' => 'html',        // 'text' or 'html'
            'charset' => 'utf-8',
            'wordWrap' => true
        ];

        // Initialize with config (or skip if configured in Config/Email.php)
        $email->initialize($config);

        // Set email parameters
        $email->setFrom($this->request->getPost('email'), $this->request->getPost('fullName'));
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);    // If mailType is 'html', use setMessage()

        // Optional: Add CC, BCC, or attachments
        // $email->setCC('cc@example.com');
        // $email->setBCC('bcc@example.com');
        // $email->attach('/path/to/file.pdf');

        // Send email
        if ($email->send()) 
        {
            return redirect()->to(base_url('contact'))->with('success', 'Email sent successfully');
        } 
        else 
        {
            // Debugging information
            // $data = $email->printDebugger(['headers']);
            // print_r($data);
            
            return redirect()->to(base_url('contact'))->with('error', 'Email failed to send: ' . $email->printDebugger(['headers']));
        }
    }
}
