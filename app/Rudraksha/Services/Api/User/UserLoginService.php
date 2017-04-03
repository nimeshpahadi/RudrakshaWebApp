<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/3/17
 * Time: 1:24 PM
 */

namespace App\Rudraksha\Services\Api\User;


use App\Rudraksha\Repositories\Api\User\UserLoginRepository;

class UserLoginService
{
    /**
     * @var UserLoginRepository
     */
    private $loginRepository;

    /**
     * UserLoginService constructor.
     * @param UserLoginRepository $loginRepository
     */
    public function __construct(UserLoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    /**
     * Returning user confirmed status
     * @param $request
     * @return bool
     */
    public function userDetailsByEmail($request)
    {
        $user = $this->loginRepository->getUserDetailsByEmail($request);

        if (!$user->confirmed) {
            return false;
        }

        return $user;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function serviceUserDetails($id)
    {
        return $this->loginRepository->getUserDetails($id);
    }
}