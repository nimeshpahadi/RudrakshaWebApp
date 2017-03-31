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

    /**
     * @param $userDetails
     * @return array
     */
    public function createUserService($userDetails)
    {
        $details = [
            "firstname" => $userDetails['firstname'],
            "lastname" => $userDetails['lastname'],
            "email" => $userDetails['email'],
            "contact" => $userDetails['contact'],
            "alternative_contact" => $userDetails['alternative_contact'],
            "password" => bcrypt($userDetails['password']),
        ];

        if ($this->registerRepository->createUserRepository($details)) {
            $respo = [
                "status" => "true",
//                "message" => "user created successfully !!!"
                "message" => "Confirmation email has been send. please check your email."
            ];
            return $respo;
        }

        $respo = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];
        return $respo;
    }

    /**
     * @param $request
     * @param $id
     * @return array
     */
    public function serviceUserImageUpdate($request, $id)
    {
        $imageName = $id . '_' . rand(0, 10000) . '.' . $request['image']->getClientOriginalExtension();

        $destinationPath = storage_path('app/public/users');

        $request['image']->move($destinationPath, $imageName);

        $request['image'] = $imageName;

        if ($this->registerRepository->repoUserImageUpdate($request, $id)) {
            $respo = [
                "status" => "true",
                "message" => "image uploaded successfully !!!"
            ];
            return $respo;
        }

        $respo = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];

        return $respo;
    }

    public function serviceUserInfoUpdate($request, $id)
    {
        if ($this->registerRepository->repoUserInfoUpdate($request, $id)) {
            $respo = [
                "status" => "true",
                "message" => "user info updated successfully !!!"
            ];
            return $respo;
        }

        $respo = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];

        return $respo;
    }

    public function getUsersService()
    {
        return $this->registerRepository->getUsersRepo();
    }
}