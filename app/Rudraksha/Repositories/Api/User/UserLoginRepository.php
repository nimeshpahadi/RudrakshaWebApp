<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/3/17
 * Time: 1:27 PM
 */

namespace App\Rudraksha\Repositories\Api\User;


use App\User;

class UserLoginRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserLoginRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getUserDetailsByEmail($request)
    {
        return $this->user->select('*')->where('email', $request)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserDetails($id)
    {
        return $this->user->select('*')->where('id', $id)->first();
    }
}