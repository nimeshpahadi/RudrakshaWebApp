<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/15/17
 * Time: 12:17 PM
 */

namespace App\Rudraksha\Services\Api\User;


use App\Rudraksha\Repositories\Api\User\UserRegisterRepository;

class UserRegisterService
{
    /**
     * @var UserRegisterRepository
     */
    private $registerRepository;

    /**
     * UserRegisterService constructor.
     * @param UserRegisterRepository $registerRepository
     */
    public function __construct(UserRegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function createUserService($userDetails)
    {
        $details = [
            "name"     => $userDetails['name'],
            "email"    => $userDetails['email'],
            "password" => bcrypt($userDetails['password']),
        ];

        if ($this->registerRepository->createUserRepository($details)) {
            $respo = [
                "status"       => "true",
                "token_status" => "true",
                "message"      => "user created successfully !!!"
            ];
            return $respo;
        }

        $respo = [
            "status"       => "false",
            "token_status" => "false",
            "message"      => "oops !!! something went wrong"
        ];
        return $respo;
    }

    public function getUsersService()
    {
        return $this->registerRepository->getUsersRepo();
    }
}