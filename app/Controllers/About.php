<?php

namespace App\Controllers;
use App\Models\AboutModel;


class About extends BaseController
{
    protected $aboutModel;

    public function __construct()
    {
        $this->aboutModel = new AboutModel();
        helper('app');
    }
    
    public function index(): string
    {
         $data = [
            'sections' => $this->aboutModel->getAllSections(),
        ];
        return view('about/home',$data);
    }
    
    public function edit($id = null)
    {
        if (auth('about'))
        {
            $data = [
                'section' => $this->aboutModel->getSectionById($id)
            ];

            return view('about/edit', $data);
        }
        return view('nallowed');
    }

    public function update($id)
    {
        if (auth('about'))
        {
            if (!$this->validate($rules)) 
            {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            ];

            if ($this->aboutModel->updateSection($id, $data)) 
            {
                $this->handleImageUpload($id);
                return redirect()->to("/about/edit/$id")->with('message', 'Section updated successfully');
            }
            return redirect()->back()->with('error', 'Failed to update section');
        }
        
    }

    protected function handleImageUpload($sectionId)
    {
        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) 
        {
            $uploadPath = WRITEPATH . 'uploads/about/';
            
            if (!is_dir($uploadPath)) 
            {
                mkdir($uploadPath, 0777, true);
            }

            $newName = $image->getRandomName();
            $image->move($uploadPath, $newName);

            $this->aboutModel->updateSectionImage($sectionId, 'uploads/about/' . $newName);
        }
    }    
}
