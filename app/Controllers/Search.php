<?php

namespace App\Controllers;

use OpenApi\Annotations as OA;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Search extends ResourceController
{
    protected $format    = 'json';
    use ResponseTrait;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    /**
     * @OA\Get(
     *     path="/api/Search",
     *     tags={"Search"},
     *     @OA\Parameter(
     *         name="start",
     *         in="query",
     *         description="start.",
     *         required=true,
     *     ), 
     *     @OA\Parameter(
     *         name="end",
     *         in="query",
     *         description="end.",
     *         required=true,
     *     ), 
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         description="date.",
     *         required=true,
     * 
     *     ), 
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function index()
    {
        $data = ['data' => $this->request->getVar()];
        return $this->respond($data,);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */

    /**
     * @OA\Get(
     *     path="/api/Search/show",
     *     tags={"Search"},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="id.",
     *         required=true,
     *     ), 
     *     @OA\Response(response="200", description="An example resource")
     * )
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

    /**
     * @OA\Get(
     *     path="/api/Search/new",
     *     tags={"Search"},
    
     *     @OA\Response(response="200", description="An example resource")
     * )
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

    /**
     * @OA\Post(
     *   path="/api/Search",
     *   summary="df document",
     *   description="",
     *   tags={"Search"},
    
     * @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         required={"content"},
     *         @OA\Property(
     *           description="Binary content of file",
     *           property="content",
     *           type="string",
     *           format="binary"
     *         ),
     *          @OA\Property(
     *            property="description",
     *            type="string"
     *          ), 
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200, description="Success",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   security={{"token": {}}},
     * )
     */

    public function create()
    {
        $data =
            [
                "getPath" => $this->request->getPath(),
                // "getGet" =>  $this->request->getGet(),
                "getPost" =>  $this->request->getPost(),
                "getVar" =>  $this->request->getVar(),
                "getJSON" =>  $this->request->getJSON(),
                "getServer(host)" =>  $this->request->getServer('HTTP_HOST'),
                "getServer" =>  $this->request->getServer(),
                "getHeader" => $this->request->getServer('REMOTE_ADDR')
            ];
        // $aa  = [];
        // foreach($data as $ke => $v){
        //     $aa[$ke] = $v;
        // }
        return  $this->respond($data);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */

    /**
     * @OA\Get(
     *     path="/api/Search/edit/{id}",
     *     tags={"Search"},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="id.",
     *         required=true,
     *     ), 
     * 
     *     @OA\Response(response="200", description="An example resource")
     * )
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

    /**
     * @OA\PATCH(
     *     path="/api/Search/update",
     *     tags={"Search"},
     * 
     *     @OA\Response(response="200", description="An example resource")
     * )
     */

    /**
     * @OA\PUT(
     *     path="/api/Search/update/{id}",
     *     tags={"Search"},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="id.",
     *         required=true,
     *     ), 
     *     @OA\Response(response="200", description="An example resource")
     * )
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

    /**
     * @OA\Get(
     *     path="/api/Search/delete/{id}",
     *     tags={"Search"},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="id.",
     *         required=true,
     *     ), 
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function delete($id = null)
    {
        //
    }
}
