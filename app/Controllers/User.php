<?php

namespace App\Controllers;

use App\Entities\User as EntitiesUser;
use App\Libraries\StdobjeToArray;
use App\Models\User as ModelsUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User extends ResourceController
{
    protected $modelName = ModelsUser::class;
    protected $format    = 'json';
    use ResponseTrait;


    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    /**
     * @OA\Get(
     *   path="/api/user",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"User"},
     *   @OA\Response(
     *     response=200, description="ok",
     *     @OA\JsonContent(
     *      type="array",
     *       @OA\Items(ref="#/components/schemas/User")
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
     *   path="/api/user/{id}",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"User"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *   ), 
     *   @OA\Response(
     *     response=200, description="ok",
     *      @OA\JsonContent(ref="#/components/schemas/User")
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
     *   path="/api/user",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"User"},
    
     * @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      @OA\Schema(ref="#/components/schemas/User"),
     *     )
     *   ),
     *   @OA\Response(
     *     response=201, description="created",
     *      @OA\JsonContent(ref="#/components/schemas/User")
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
        $entity = new EntitiesUser();
        $array = new StdobjeToArray($data);
        $entity->fill($array->get());
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
     *   path="/api/user/{id}",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"User"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *   ), 
     *  @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      @OA\Schema(ref="#/components/schemas/User"),
     *     )
     *   ),
     *   @OA\Response(
     *     response=200, description="updated",
     *      @OA\JsonContent(ref="#/components/schemas/User")
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
        $entity = new EntitiesUser();
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
     *   path="/api/user/{id}",
     *   summary="fleet document",
     *   description="fleet document",
     *   tags={"User"},
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

    private function getKey()
    {
        return getenv('JWT_SECRET');
    }


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
                'messages' => [
                    'error' =>  $this->validator->getErrors()
                ]
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

            $entity = new EntitiesUser();
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
                        "my-api-identifier",
                        base_url('api/user/details'),
                        $this->request->getServer('REMOTE_ADDR')
                    ),
                    "sub" => "login " . $user->email . "" . $lastLogin,
                    "iat" => $iat, //Time the JWT issued at
                    "exp" =>  $exp, // Expiration time of token,
                    "user" => array(
                        "id" => "9",
                        "firstname" => $user->firstname,
                        "lastname" =>  $user->lastname,
                        "about" =>  $user->about,
                        "email" =>  $user->email,
                        "image" =>  $user->image,
                        "status" => $user->status,
                        "lastLogin" => $lastLogin,
                        "lastLogout" => $user->lastLogout,
                        "ipAddress" => $user->ipAddress,
                        "isAdmin" => $user->isAdmin,
                        "companyId" => $user->companyId,
                    ),
                );

                $token = JWT::encode($payload, $key, 'HS256');

                $response = [
                    'message' => 'Login Succesful',
                    "iat" => Date('Y-m-d H:i:s', $iat),   
                ];
                return $this->respond($response);
            }
        }
    }

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

        // check if token is null or empty
        if (is_null($token) || empty($token)) {
            return $this->failUnauthorized();
        }
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $response = [
                'message' => 'detail user',
                'details' => $decoded,
            ];
            return $this->respond($response);
        } catch (Exception $ex) {
            return $this->failUnauthorized();
        }
    }

    public function setPassword($pass = null)
    {
        $data = password_hash($pass, PASSWORD_BCRYPT);
        $response = [
            'password' => $data,
        ];
        return $this->respond($response);
    }
}
