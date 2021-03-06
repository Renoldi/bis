<?php

namespace App\Controllers;

use App\Entities\Passenger as EntitiesPassenger;
use App\Libraries\StdobjeToArray;
use App\Libraries\Util as LibrariesUtil;
use App\Models\Passenger as ModelsPassenger;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Util;

class Passenger extends ResourceController
{
    protected $modelName = ModelsPassenger::class;
    protected $format    = 'json';
    use ResponseTrait;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    /**
     * @OA\Get(
     *   path="/api/Passenger",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Passenger"},
     *   @OA\Response(
     *     response=200, description="ok",
     *     @OA\JsonContent(
     *      type="array",
     *       @OA\Items(ref="#/components/schemas/Passenger")
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
    /**
     * @OA\Get(
     *   path="/api/Passenger/{id}",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Passenger"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *   ), 
     *   @OA\Response(
     *     response=200, description="ok",
     *      @OA\JsonContent(ref="#/components/schemas/Passenger")
     *   ), 
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   @OA\Response(
     *     response=404, description="404 not found",
     *     @OA\JsonContent(  
     *      @OA\Property(property="status", type="double",example = 404),
     *      @OA\Property(property="error", type="double", example = 404),
     *        @OA\Property(
     *          property="messages", type="object", 
     *          @OA\Property(property="error", type="string", example = "not found"),
     *       )
     *     )
     *   ),
     *   security={{"token": {}}},
     * )
     */
    public function show($id = null)
    {
        $record = $this->model->find($id);
        if (!$record) {
            return $this->failNotFound(sprintf(
                'trip with id %d not found',
                $id
            ));
        }

        return $this->respond($record);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    /**
     * @OA\Post(
     *   path="/api/Passenger",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Passenger"},
    
     * @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      @OA\Schema(ref="#/components/schemas/Passenger"),
     *     )
     *   ),
     *   @OA\Response(
     *     response=201, description="created",
     *      @OA\JsonContent(ref="#/components/schemas/Passenger")
     *   ), 
     *   @OA\Response(
     *     response=400, description="Request error",
     *     @OA\JsonContent(  
     *      @OA\Property(property="status", type="double",example = 400),
     *      @OA\Property(property="error", type="double", example = 400),
     *        @OA\Property(
     *          property="messages", type="object", 
     *          @OA\Property(property="error", type="string", example = "not found"),
     *       )
     *     )
     *   ),
     *   security={{"token": {}}},
     * )
     */
    public function create()
    {
        $data = $this->request->getVar();
        if ($data == null) {
            return $this->fail("data null");
        }
        $entity = new EntitiesPassenger();
        $util = new LibrariesUtil();
        $array = new StdobjeToArray($data);
        $entity->fill($array->get());
        $entity->idNo = $util->getRandomName();
        if (!$this->model->save($entity)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated($entity, 'post created');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    /**
     * @OA\Put(
     *   path="/api/Passenger/{id}",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Passenger"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *   ), 
     *  @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      @OA\Schema(ref="#/components/schemas/Passenger"),
     *     )
     *   ),
     *   @OA\Response(
     *     response=200, description="updated",
     *      @OA\JsonContent(ref="#/components/schemas/Passenger")
     *   ), 
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   @OA\Response(
     *     response=404, description="404 not found",
     *     @OA\JsonContent(  
     *      @OA\Property(property="status", type="double",example = 404),
     *      @OA\Property(property="error", type="double", example = 404),
     *        @OA\Property(
     *          property="messages", type="object", 
     *          @OA\Property(property="error", type="string", example = "not found"),
     *       )
     *     )
     *   ),
     *   security={{"token": {}}},
     * )
     */
    public function update($id = null)
    {
        $data = $this->request->getVar();
        if ($data == null) {
            return $this->fail("data null");
        }
        $entity = new EntitiesPassenger();
        $array = new StdobjeToArray($data);
        $entity->fill($array->get());
        if (!$this->model->update($id, $entity)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondUpdated($entity, "updated");
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    /**
     * @OA\Delete(
     *   path="/api/Passenger/{id}",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Passenger"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *   ), 
     *   @OA\Response(
     *     response=200, description="ok",
     *     @OA\JsonContent(  
     *      @OA\Property(property="status", type="double",example = 200),
     *      @OA\Property(property="error", type="double", example = null),
     *        @OA\Property(
     *          property="messages", type="object", 
     *          @OA\Property(property="error", type="string", example = "not found"),
     *       )
     *     )
     *   ), 
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   @OA\Response(
     *     response=404, description="404 not found",
     *     @OA\JsonContent(  
     *      @OA\Property(property="status", type="double",example = 404),
     *      @OA\Property(property="error", type="double", example = 404),
     *        @OA\Property(
     *          property="messages", type="object", 
     *          @OA\Property(property="error", type="string", example = "Data Deleted"),
     *       )
     *     )
     *   ),
     *   security={{"token": {}}},
     * )
     */
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            if ($this->model->delete($id)) {
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'Data Deleted ' . $id
                    ]
                ];
                return $this->respondDeleted($response);
            } else
                return $this->fail("fail delete $id");
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }
    /**
     * @OA\Post(
     *   path="/api/Passenger/login",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Passenger"},
   
     *  @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      @OA\Schema(
     *          @OA\Property(
     *              property="email",
     *              type="string",example="admins@admin.com"
     *          ),
     *          @OA\Property(
     *              property="password",
     *              type="string",example="admin"
     *          ),
     *      ),
     *     )
     *   ),
     *   @OA\Response(
     *     response=200, description="ok",
     *      @OA\JsonContent(
     *            @OA\Property(
     *              property="message",
     *              type="string",
     *          ),
     *          @OA\Property(
     *              property="token",
     *              type="string",
     *          ),
     * )
     *   ), 
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   @OA\Response(
     *     response=404, description="404 not found",
     *     @OA\JsonContent(  
     *      @OA\Property(property="status", type="double",example = 404),
     *      @OA\Property(property="error", type="double", example = 404),
     *        @OA\Property(
     *          property="messages", type="object", 
     *          @OA\Property(property="error", type="string", example = "not found"),
     *       )
     *     )
     *   ),
     * )
     */
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $rules = [
            "email" => "required|valid_email",
            "password" => "required|min_length[5]",
        ];
        if (!$this->validate($rules)) {

            $response = [
                'status'   => 200,
                'error'    => true,
                'messages' => $this->validator->getErrors()
            ];

            return $this->respondCreated($response);
        } else {

            $user =  $this->model->where('email', $email)->first();

            if (is_null($user)) {
                return $this->respond(['error' => 'Invalid username '], 401);
            }

            $pwd_verify = password_verify($password, $user->password);

            if (!$pwd_verify) {
                return $this->respond(['error' => 'Invalid password.'], 401);
            }

            $iat = time(); // current timestamp value

            $entity = new EntitiesPassenger();
            $lastLogin = Date('Y-m-d H:i:s', $iat);
            $entity->lastLogin = $lastLogin;
            $entity->ipAddress = $this->request->getServer('REMOTE_ADDR');
            $entity->about = "login";

            if ($this->model->update($user->id, $entity)) {
                $key = $this->getKey();
                $exp = $iat + (3600 * 24 * (365 / 12));
                $payload = array(
                    "iss" => base_url(),
                    "aud" => array(
                        "my-api-Passenger",
                        base_url('api/Passenger/details'),
                        $this->request->getServer('REMOTE_ADDR')
                    ),
                    "sub" => "login " . $user->email . "" . $lastLogin,
                    "iat" => $iat, //Time the JWT issued at
                    "exp" =>  $exp, // Expiration time of token,
                    "user" =>  array(
                        "id" => $user->id,
                        "idNo" => $user->idNo,
                        "firstname" => $user->firstname,
                        "lastname" => $user->lastname,
                        "middleName" => $user->middleName,
                        "phone" => $user->phone,
                        "nid" => $user->nid,
                        "email" => $user->email,
                        "image" => $user->image,
                        "addressLine1" => $user->addressLine1,
                        "addressLine2" => $user->addressLine2,
                        "city" => $user->city,
                        "zipCode" => $user->zipCode,
                        "country" => $user->country,
                        "status" => $user->status,
                        "lastLogin" => $user->lastLogin,
                        "ipAddress" => $user->ipAddress
                    )
                );




                $token = JWT::encode($payload, $key, 'HS256');
                $response = [
                    'message' => 'Login Succesful',
                    "token" => $token,
                ];
                return $this->respond($response);
            }
        }
    }
    private function getKey()
    {
        return getenv('JWT_SECRET');
    }


    /**
     * @OA\Get(
     *   path="/api/Passenger/details",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"Passenger"},
     *   @OA\Response(
     *     response=200, description="ok",
     *      @OA\JsonContent(
     *            @OA\Property(
     *              property="message",
     *              type="string",
     *          ),
     *          @OA\Property(
     *              property="token",
     *              type="string",
     *          ),
     * )
     *   ), 
     *   @OA\Response(
     *     response=400, description="Bad Request"
     *   ),
     *   @OA\Response(
     *     response=404, description="404 not found",
     *     @OA\JsonContent(  
     *      @OA\Property(property="status", type="double",example = 404),
     *      @OA\Property(property="error", type="double", example = 404),
     *        @OA\Property(
     *          property="messages", type="object", 
     *          @OA\Property(property="error", type="string", example = "not found"),
     *       )
     *     )
     *   ),
     *   security={{"token": {}}},
     * )
     */
    public function details()
    {
        $key = getenv('JWT_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        $token = null;

        // extract the token from the header
        if (!empty($header)) {
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                $token = $matches[1];
            }
        }

        // // check if token is null or empty
        if (is_null($token) || empty($token)) {
            return $this->failUnauthorized();
        }
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $response = [
                'message' => 'detail user',
                'decoded' => $decoded,
            ];
            return $this->respond($response);
        } catch (\Exception $ex) {
            return $this->failUnauthorized();
        }
    }
}
