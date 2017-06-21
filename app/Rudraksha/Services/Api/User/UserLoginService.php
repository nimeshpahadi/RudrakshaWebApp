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
        if ($user!=null) {
            if (!$user->confirmed) {
                return false;
            }
            return true;
        }
        return "false";
    }

    /**
     * @param $id
     * @return mixed
     */
    public function serviceUserDetails($id)
    {
        $userData =  $this->loginRepository->getUserDetails($id);

        $baseUrl = url('/');

        $image = $baseUrl.'/storage/image/users/'.$userData->image;

        $userDetails = [
            "id" => $userData->id,
            "firstname" => $userData->firstname,
            "lastname" => $userData->lastname,
            "email" => $userData->email,
            "contact" => $userData->contact,
            "alternative_contact" => $userData->alternative_contact,
            "image" => isset($userData->image)?$image:""
        ];
        return $userDetails;
    }
}