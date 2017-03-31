<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/15/17
 * Time: 12:14 PM
 */

namespace App\Http\Controllers\Api\User;


use App\Rudraksha\ApiValidation\UserValidation;
use App\Rudraksha\Services\Api\User\UserRegisterService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    /**
     * @var UserRegisterService
     */
    private $registerService;
    /**
     * @var UserValidation
     */
    private $userValidation;

    /**
     * UserRegisterController constructor.
     * @param UserRegisterService $registerService
     * @param UserValidation $userValidation
     */
    public function __construct(UserRegisterService $registerService, UserValidation $userValidation)
    {
        $this->registerService = $registerService;
        $this->userValidation = $userValidation;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        $data = $request->all();

        $t = $this->userValidation->check($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->registerService->createUserService($data);

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userInfoUpdate(Request $request, $id)
    {
        $data = $request->all();

        $t = $this->userValidation->infoValidate($data, $id);

        if ($t!=null) {
            return $t;
        }

        $response = $this->registerService->serviceUserInfoUpdate($data, $id);

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function userImageUpdate(Request $request, $id)
    {
        $data = $request->all();

        $t = $this->userValidation->imageValidate($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->registerService->serviceUserImageUpdate($data, $id);

        return response()->json($response);
    }

    public function getUsers()
    {
        $users = $this->registerService->getUsersService();
        return response()->json($users);
    }
}