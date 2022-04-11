<?php

namespace App\Controllers;

use App\Models\Custom;
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
     *         description="start",
     *         required=true,
     *         example="Banda Aceh"
     *     ), 
     *     @OA\Parameter(
     *         name="end",
     *         in="query",
     *         description="end",
     *         required=true,
     *         example="Takengon"
     *     ), 
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         description="Y-m-d",
     *         required=true,
     *         example="2022-1-1"
     *     ), 
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function index()
    {
        $custome = new Custom();
        $search = $custome->search($this->request->getVar("start"), $this->request->getVar("end"), $this->request->getVar("date"));
        // $available = $custome->available(4, $this->request->getVar("date"));
        // $data =[
        //    $search,$available
        // ];
        return $this->respond($search);
    }
}
