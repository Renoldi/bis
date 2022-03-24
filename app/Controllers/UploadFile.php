<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UploadFile extends ResourceController
{
    public function fromBase64()
    {
        $image = $this->request->getVar('image');

        if (empty($image)) {

            return $this->fail("image empty");
        }
        try {
            $mime_content_type =  mime_content_type($image);
            $arrayImage = ["image/jpg", "image/jpeg", "image/gif", "image/png", "image/webp"];
            if (!in_array($mime_content_type, $arrayImage)) {
                return $this->fail("image not allow");
            }
            $size_in_bytes = (int) (strlen(rtrim($image, '=')) * 3 / 4);
            $size_in_kb    = $size_in_bytes / 1024;
            $size_in_mb    = $size_in_kb / 1024;

            if ($size_in_kb > 1024) {
                return $this->fail("image more then 1 mb");
            }
            // $data = [$mime_content_type, $size_in_kb." kb", $size_in_mb." mb"];
        } catch (\Exception $ex) {

            return $this->fail('image error');
        }

        $extension = explode('/',  $mime_content_type)[1];
        $getContent = str_replace("data:$mime_content_type;base64,", '', $image);

        $getContent = str_replace(' ', '+', $getContent);
        $data = base64_decode($getContent);
        $file = "assets/images/" . uniqid() . ".$extension";

        $success = file_put_contents($file, $data);
        $data = [$mime_content_type, base_url($file)];
        return $this->respond($data);

        $data = [$mime_content_type];
        return $this->respond($data);


        // if (! $this->validate($validationRule)) {
        //     $data = ['errors' => $this->validator->getErrors()];

        //     return view('upload_form', $data);
        // }

        // $img = $this->request->getFile('userfile');

        // if (! $img->hasMoved()) {
        //     $newName = $img->getRandomName();
        //     $img->move(WRITEPATH . 'uploads', $newName);

        //     return view('upload_success', $data);
        // } else {
        //     $data = ['errors' => 'The file has already been moved.'];

        //     return view('upload_form', $data);
        // }
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
