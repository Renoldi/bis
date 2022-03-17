<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use OpenApi\Annotations as OA;
use App\Models\TripModel;

class Trip extends ResourceController
{
    protected $modelName = TripModel::class;
    protected $format    = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    /**
     * @OA\Get(
     *   path="/api/trip",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Trip"},
     *   @OA\Response(
     *     response=200, description="ok",
     *     @OA\JsonContent(
     *      type="array",
     *       @OA\Items(ref="#/components/schemas/Trip")
     *     ),
     *   ),
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   security={{"token": {}}},
     * )
     */
    public function index()
    {
        return $this->respond($this->model->findAll());
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
    /**
     * @OA\Post(
     *   path="/api/fleet",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Trip"},
    
     * @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      @OA\Schema(ref="#/components/schemas/Trip"),
     *     )
     *   ),
     *   @OA\Response(
    *     response=200, description="ok",
     *     @OA\JsonContent(
     *      ref="#/components/schemas/Trip"
     *     )
     *   ), 
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   security={{"token": {}}},
     * )
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
